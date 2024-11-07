<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $profile->name }}'s Embed Profile</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="relative min-h-screen flex flex-col bg-gray-100 text-gray-600 dark:text-gray-400 dark:bg-gray-900">

    <div class="flex-1 select-none flex flex-col justify-center items-center overflow-auto">

        <x-render-user-profile :profile="$profile" :badges="$badges" />

        <!-- GitHub Profile Branding -->
        <div class="text-center mt-8">
            <!-- GitHub Profile Link -->
            <div class="relative mx-auto overflow-hidden rounded-full h-max w-max mt-4">
                <div class="absolute inset-0 w-4 h-16 animate-slide">
                    <div aria-hidden="true"
                        class="absolute inset-0 rotate-[-20deg] scale-y-125 bg-gradient-to-r from-transparent via-white/30 dark:via-white/10">
                    </div>
                </div>
                <div
                    class="border relative border-blue-200 inline-flex items-center p-0.5 pb-0.5 pl-2.5 rounded-full gap-x-2 border-white/40 dark:border-white/30 bg-gray-950/20 dark:bg-white/10 before:scale-y-110 before:absolute before:inset-x-4 before:-bottom-px before:bg-gradient-to-r before:from-transparent before:via-yellow-50 before:to-transparent before:h-px before:w-3/5">
                    <a href="https://github.com/princevora/lara-profile" target="_blank">
                        <span class="text-sm tracking-wide text-white">LARA - PROFILE &nbsp;</span>
                        <span
                            class="px-2 py-0.5 text-white text-xs font-semibold leading-5 uppercase tracking-wide bg-gray-950/20 dark:bg-white/20 border border-white/30 rounded-full">
                            @princevora
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Powered by Lara Profile (At the bottom) -->
    <div class="mt-auto text-center text-xs text-gray-500 dark:text-gray-400 py-2">
        Powered by <a href="https://yourwebsite.com" class="text-blue-500 hover:underline dark:text-blue-400">
            Lara Profile
        </a>
    </div>


    @stack('scripts')
</body>

</html>
