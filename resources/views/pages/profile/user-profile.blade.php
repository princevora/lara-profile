<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $profile->name }} 's Profile </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="relative">
    <div
        class="select-none relative flex h-screen w-full flex-col justify-center overflow-auto bg-gray-100 text-gray-600 dark:text-gray-400 dark:bg-gray-900">
        
        <x-render-user-profile :profile="$profile" :badges="$badges" />

        <button onclick="copyIframe()" id="btn"
            class="inline-flex text-xs bg-red-500 text-white rounded-full p-2 w-auto mx-auto mt-4">
            Copy The Profile's HTML Code
        </button>
    </div>

    @stack('scripts')
</body>

</html>
