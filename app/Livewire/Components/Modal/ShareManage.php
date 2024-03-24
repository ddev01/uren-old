<?php

namespace App\Livewire\Components\Modal;

use App\Mail\Estimate\Shared;
use App\Models\EstimateShare;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class ShareManage extends Component
{
    use WireToast;

    public $email;

    public $estimate;

    public $sharedUsers;

    public $sendMail;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function getSharedEmails()
    {
        $this->sharedUsers = EstimateShare::where('estimate_id', $this->estimate->id)->pluck('user_email');
    }

    public function mount($estimate)
    {
        $this->estimate = $estimate;
        $this->getSharedEmails();
    }

    public function submit()
    {
        $this->validate();

        try {
            EstimateShare::create([
                'estimate_id' => $this->estimate->id,
                'user_email' => $this->email,
            ]);
            if ($this->sendMail) {
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
            toast()
                ->success('User added to estimate successfully', 'Estimate')
                ->push();
            session()->flash('message', 'User added to estimate successfully');
            $this->getSharedEmails();
            $this->email = '';
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                // Handle the unique constraint violation
                toast()
                    ->danger('This estimate has already been shared with this email', 'Estimate')
                    ->push();
            } else {
                // Handle other database errors
                toast()
                    ->danger('Something went wrong adding the user to the estimate', 'Estimate')
                    ->push();
            }
        }
    }

    public function deleteSharedUser($user)
    {
        try {
            EstimateShare::where('estimate_id', $this->estimate->id)
                ->where('user_email', $user)
                ->delete();
            toast()
                ->success('User removed from estimate successfully', 'Estimate')
                ->push();
            $this->getSharedEmails();
        } catch (\Exception $e) {
            toast()
                ->danger('Something went wrong removing the user', 'Estimate')
                ->push();
        }
    }

    public function render()
    {
        return view('livewire.components.modal.share-manage');
    }
}
