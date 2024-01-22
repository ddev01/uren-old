<{{ $elementType }} class="{{ $attributes->get('class') }} {{ $base }} {{ $color }} {{ $size }}" {{ $attributes }} {!! $href ? 'href="' . $href . '"' : '' !!}>
    {{ $slot }}
</{{ $elementType }}>
