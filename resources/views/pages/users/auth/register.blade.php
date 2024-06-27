@extends('pages.users.auth.layout')
@section('title', 'Register')
@section('content')
    <div class="w-full max-w-sm space-y-8 z-50">

        <!-- Livewire Register Component -->
        <livewire:users.auth.register lazy/>

    </div>
@endsection