<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Import Tailwind -->
    @vite('resources/css/app.css')

    <!-- Page title -->
    <title>
        @yield('title') • Lara - Profile
    </title>

    <!-- Head Scripts -->
    @yield('scripts-head')

    <!-- Custom stylings -->
    <style>
        .animate-slide {
            animation: slide 3s infinite alternate;
        }

        @keyframes slide {
            0% {
                transform: translateX(-20rem);
            }

            25% {
                transform: translate(-10rem);
            }

            100% {
                transform: translate(15rem);
            }
        }
    </style>

    <!-- Notify CSS -->
    @notifyCss
</head>

<body class="h-full bg-black text-white relative flex">
    @include('notify::components.notify')
    {{-- <div class="absolute inset-x-0 -top-20 z-0">
        
    </div> --}}

    <!-- Main content -->
    @include('pages.users.dashboard.layouts.sidebar')

    @yield('content')

    <!-- Toastr Component -->
    <x-notify::notify />

    <!-- Notify JS -->
    @notifyJs

    <!-- Scripts -->
    @yield('scripts-body')
</body>

</html>
