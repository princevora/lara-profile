<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home • Lara - Profile</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
    @livewireStyles

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
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 min-h-screen flex flex-col overflow-hidden">
    <div class="flex flex-col flex-1">
        <section
            class="relative before:scale-y-110 before:absolute before:mx-auto before:inset-x-0 before:-bottom-px before:bg-gradient-to-r before:from-transparent before:via-gray-950/10 dark:before:via-white/20 before:to-transparent before:h-px min-h-screen">
            <div class="relative overflow-hidden pt-28 sm:pt-32 bg-gray-50 dark:bg-gray-950 min-h-screen">
                <div aria-hidden="true"
                    class="absolute inset-x-0 bottom-0 z-10 h-20 bg-gradient-to-b from-transparent to-gray-50 dark:to-gray-950">
                </div>
                <div class="absolute inset-x-0 -top-20"><svg
                        class="min-w-[80rem] -translate-x-60 md:translate-x-0 mx-auto w-full -scale-y-100 contrast-150 opacity-50 dark:opacity-25"
                        viewBox="0 0 1440 900" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1739_2)">
                            <g filter="url(#filter0_f_1739_2)">
                                <ellipse cx="987.203" cy="967.25" rx="581" ry="356.5"
                                    transform="rotate(8.47676 987.203 967.25)" fill="#9641C1"></ellipse>
                            </g>
                            <g filter="url(#filter1_f_1739_2)">
                                <ellipse cx="991.907" cy="1000.77" rx="454.5" ry="280.5"
                                    transform="rotate(11.69 991.907 1000.77)" fill="#FF94C8"></ellipse>
                            </g>
                            <g filter="url(#filter2_f_1739_2)">
                                <ellipse cx="405" cy="1050" rx="448" ry="332" fill="#007FEC">
                                </ellipse>
                            </g>
                            <g filter="url(#filter3_f_1739_2)">
                                <ellipse cx="779" cy="985.5" rx="259" ry="204.5" fill="#FFE8AE">
                                </ellipse>
                            </g>
                        </g>
                        <defs>
                            <filter id="filter0_f_1739_2" x="110.117" y="304.308" width="1754.18" height="1325.88"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape">
                                </feBlend>
                                <feGaussianBlur stdDeviation="150" result="effect1_foregroundBlur_1739_2">
                                </feGaussianBlur>
                            </filter>
                            <filter id="filter1_f_1739_2" x="343.172" y="510.984" width="1297.47" height="979.573"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape">
                                </feBlend>
                                <feGaussianBlur stdDeviation="100" result="effect1_foregroundBlur_1739_2">
                                </feGaussianBlur>
                            </filter>
                            <filter id="filter2_f_1739_2" x="-343" y="418" width="1496" height="1264"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape">
                                </feBlend>
                                <feGaussianBlur stdDeviation="150" result="effect1_foregroundBlur_1739_2">
                                </feGaussianBlur>
                            </filter>
                            <filter id="filter3_f_1739_2" x="320" y="581" width="918" height="809"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape">
                                </feBlend>
                                <feGaussianBlur stdDeviation="100" result="effect1_foregroundBlur_1739_2">
                                </feGaussianBlur>
                            </filter>
                            <clipPath id="clip0_1739_2">
                                <rect width="1440" height="900" fill="white"></rect>
                            </clipPath>
                        </defs>
                    </svg></div>
                <div class="relative px-6 mx-auto max-w-7xl max-h-screen">
                    <div class="relative z-10 mx-auto text-center sm:pb-8 sm:w-4/5 lg:w-8/12 lg:pb-20 min-h-screen">
                        <div class="relative mx-auto overflow-hidden rounded-full h-max w-max">
                            <div class="absolute inset-0 w-4 h-16 animate-slide">
                                <div aria-hidden="true"
                                    class="absolute inset-0 rotate-[-20deg] scale-y-125 bg-gradient-to-r from-transparent via-white/30 dark:via-white/10">
                                </div>
                            </div>
                            <div
                                class="border relative border-blue-200 border-whit/50 inline-flex items-center p-0.5 pb-0.5 pl-2.5 rounded-full gap-x-2 border-white/40 dark:border-white/30 bg-gray-950/20 dark:bg-white/10 before:scale-y-110 before:absolute before:inset-x-4 before:-bottom-px before:bg-gradient-to-r before:from-transparent before:via-yellow-50 before:to-transparent before:h-px before:w-3/5">
                                <a href="https://github.com/princevora/lara-profile" target="_blank">
                                    <span class="text-sm tracking-wide text-white">LARA - PROFILE &nbsp;</span><span
                                        class="px-2 py-0.5 text-white text-xs font-semibold leading-5 uppercase tracking-wide bg-gray-950/20 dark:bg-white/20 border border-white/30 rounded-full">
                                        @princevora
                                    </span>
                                </a>
                            </div>
                        </div>
                        <h1
                            class="mt-8 text-3xl font-bold sm:text-4xl text-blue-950 dark:text-white lg:text-5xl xl:text-6xl">
                            Create Landing Page <br> for Your Bio <br> Add your socials.</h1>
                        <p class="mt-5 text-gray-700 lg:mt-8 sm:text-lg dark:text-gray-200">
                            Lara - profile helps you to make your profile - bio page to introduce your slef to others
                            within just few steps. Create your customizable landing page now.
                        </p>
                        <div class="items-center mt-6 gap-x-4 lg:gap-x-6 sm:flex sm: sm:justify-center lg:mt-8">
                            <a href="{{ route("auth.register") }}"
                                class="relative  inline-block w-full p-px rounded-lg sm:w-auto group h-11 bg-gradient-to-r from-purple-600 to-sky-500 dark:from-purple-600 dark:to-blue-400 before:absolute before:inset-0 before:bg-gradient-to-r before:from-purple-400 before:to-sky-400 dark:before:from-purple-600 dark:before:to-sky-500 before:scale-75 before:opacity-50 before:rounded-md before:blur-lg before:transition before:duration-300 active:before:scale-90 focus:before:scale-90 focus:before:opacity-75 hover:before:scale-100 hover:before:opacity-100"
                            >
                                <p
                                    class="relative flex justify-center h-full text-sm font-medium items-center text-white tracking-wide bg-gray-950 px-[calc(1.5rem-1px)] rounded-[calc(0.5rem-1px)] group-hover:bg-gray-900 transition duration-300">
                                    Create your BIO

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="p-1 mx-0 size-10">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                    </svg>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @livewireScripts
    </div>
</body>

</html>
