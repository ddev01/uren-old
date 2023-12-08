@extends('components.layouts.main')
@section('main')
    <x-layouts.header />
    <main id="app">
        {{ $slot }}
    </main>
    {{-- <footer></footer> --}}
@endsection
