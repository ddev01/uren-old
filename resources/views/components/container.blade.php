@props(['mobile' => false])
@if ($mobile)
    <div {{ $attributes->merge(['class' => 'w-full md:max-w-[1140px] md:mx-auto']) }}>
        {{ $slot }}
    </div>
@else
    <div {{ $attributes->merge(['class' => 'mx-auto max-w-[1140px] px-[20px]']) }}>
        {{ $slot }}
    </div>
@endif
