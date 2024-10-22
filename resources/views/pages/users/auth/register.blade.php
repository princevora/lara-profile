@extends('pages.users.auth.layout')
@section('title', 'Register')
@section('styles')
    <style>
        .break-words-custom {
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }
    </style>
@section('content')
    <div class="w-full max-w-lg space-y-8 z-50">

        <!-- Livewire Register Component -->
        <livewire:users.auth.register lazy />

    </div>

@endsection
