@extends('pages.users.dashboard.layouts.layout')
@section('title', $user->username . ' - Dashboard')
@section('content')
    <livewire:users.dashboard.user-profile />
@endsection
