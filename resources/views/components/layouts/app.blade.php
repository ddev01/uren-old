@extends('components.layouts.main')
@section('main')
    <x-layouts.header />
    {{-- 56px is height of header --}}
    <main id="app">
        {{ $slot }}
    </main>
    {{-- <footer></footer> --}}
@endsection
