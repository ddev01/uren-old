<x-mail::message>
	# @if ($data['inviteeName'])
		Hello {{ $data['inviteeName'] }},
	@else
		Hello,
	@endif

	<a href="mailto:{{ $data['inviterMail'] }}">{{ $data['inviterName'] }}</a> has invited you to view their estimate, {{ $data['estimateName'] }}. You can only view this estimate if you are logged in to your account. If you do not have an account, you can create one for free at <a href="{{ route('register') }}">this link</a>.

	You can view the estimate by clicking the button below:

	<x-mail::button :url="$data['estimateLink']">
		View estimate
	</x-mail::button>

	Thanks,<br>
	{{ config('app.name') }}
</x-mail::message>
