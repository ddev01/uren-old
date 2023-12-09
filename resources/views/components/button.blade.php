@php
    $elementType = $attributes->has('href') ? 'a' : 'button';
@endphp
<{{ $elementType }} 
    {{ $attributes->merge(['class' => $attributes->get('class') . ' px-4 py-2 bg-green-700 rounded-sm'])}} 
    {{ $attributes }}
>
    {{ $slot }}
</{{ $elementType }}>
