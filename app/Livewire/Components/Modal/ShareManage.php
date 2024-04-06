<?php

namespace App\Livewire\Components\Modal;

use App\Mail\Estimate\Shared;
use App\Models\Estimate;
use App\Models\EstimateShare;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class ShareManage extends Component
{
    use WireToast;

    public string $email = '';

    public Estimate $estimate;

    public bool $sendMail = false;

    /**
     * @var array<string>
     */
    public array $sharedUsers = [];

    /**
     * Validation rules for the component.
     *
     * @var array<string, string>
     */
    protected array $rules = [
        'email' => 'required|email',
    ];

    public function mount(Estimate $estimate): void
    {
        $this->estimate = $estimate;
        $this->getSharedEmails();
    }

    public function getSharedEmails(): void
    {
        $this->sharedUsers = EstimateShare::where('estimate_id', $this->estimate->id)
            ->pluck('user_email')
            ->toArray();
    }

    public function submit(): void
    {
        $this->validate();

        if ($this->shareExists()) {
            toast()
                ->danger('This estimate has already been shared with this email', 'Estimate')
                ->push();

            return;
        }

        $this->createShare();
        $this->sendShareMail();
        $this->resetInput();
        $this->getSharedEmails();

        toast()
            ->success('User added to estimate successfully', 'Estimate')
            ->push();
        session()->flash('message', 'User added to estimate successfully');
    }

    public function deleteSharedUser(string $userEmail): void
    {
        try {
            EstimateShare::where('estimate_id', $this->estimate->id)
                ->where('user_email', $userEmail)
                ->delete();

            toast()
                ->success('User removed from estimate successfully', 'Estimate')
                ->push();
            $this->getSharedEmails();
        } catch (Exception $e) {
            toast()
                ->danger('Something went wrong removing the user', 'Estimate')
                ->push();
        }
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.components.modal.share-manage');
    }

    protected function shareExists(): bool
    {
        return EstimateShare::where('estimate_id', $this->estimate->id)
            ->where('user_email', $this->email)
            ->exists();
    }

    protected function createShare(): void
    {
        EstimateShare::create([
            'estimate_id' => $this->estimate->id,
            'user_email' => $this->email,
        ]);
    }

    protected function sendShareMail(): void
    {
        if (! $this->sendMail) {
            return;
        }

        $data = [
            'inviteeName' => User::where('email', $this->email)->first()?->name ?? null,
            'inviteeMail' => $this->email,
            'inviterName' => auth()->user()->name,
            'inviterMail' => auth()->user()->email,
            'estimateName' => $this->estimate->name,
            'estimateLink' => route('estimate.edit', $this->estimate->id),
        ];

        Mail::to($this->email)->send(new Shared($data));
    }

    protected function resetInput(): void
    {
        $this->email = '';
    }
}
