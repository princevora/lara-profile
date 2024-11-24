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

    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data("palettes", () => ({
                colors: paletteGenerator(39),
                refreshColors: function(event) {
                    event.preventDefault();

                    this.colors = paletteGenerator(39);
                }
            }));
        });
    </script>
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
    @livewireStyles
</head>

<body class="h-full bg-black text-white relative flex">
    <!-- Main content -->
    @include('pages.users.dashboard.layouts.sidebar')

    <section
        class="w-full relative before:scale-y-110 before:mx-auto duration-1000 before:inset-x-0 before:-bottom-px before:bg-gradient-to-r before:from-transparent before:via-gray-950/10 dark:before:via-white/20 before:to-transparent before:h-px min-h-screen">
        <div class="relative overflow-hidden pt-28 sm:pt-32 bg-gray-50 dark:bg-black min-h-screen">
            <div aria-hidden="true"
                class="absolute inset-x-0 bottom-0 z-10 h-20 bg-gradient-to-b from-transparent to-gray-50 dark:to-gray-950">
            </div>
            <div class="absolute inset-x-0 -top-20"><svg
                    class="min-w-[80rem] -translate-x-60 md:translate-x-0 mx-auto w-full -scale-y-100 contrast-150 opacity-50 dark:opacity-25"
                    viewBox="0 0 1440 900" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1739_2)">
                        <g filter="url(#filter0_f_1739_2)">
                            <ellipse cx="987.203" cy="967.25" rx="581" ry="356.5"
                                transform="rotate(8.47676 987.203 967.25)" fill="#0D0D0D"></ellipse>
                        </g>
                        <g filter="url(#filter1_f_1739_2)">
                            <ellipse cx="991.907" cy="1000.77" rx="454.5" ry="280.5"
                                transform="rotate(11.69 991.907 1000.77)" fill="#344e41"></ellipse>
                        </g>
                        <g filter="url(#filter2_f_1739_2)">
                            <ellipse cx="405" cy="1050" rx="448" ry="332" fill="#edf2f4">
                            </ellipse>
                        </g>
                        <g filter="url(#filter3_f_1739_2)">
                            <ellipse cx="779" cy="985.5" rx="259" ry="204.5" fill="#6f1d1b">
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
            <div class="relative mx-auto space-y-8 z-50">
                <div class="flex flex-col items-center justify-center m-auto w-12/12 max-w-lg">
                    <div class="flex items-center w-full">
                        <a class="text-zinc-600 text-sm" href="{{ route('user.dashboard') }}">Dashboard</a>
                        <p class="mx-2 cursor-default select-none text-zinc-800">/</p>
                        <a class="text-zinc-500 text-sm" href="javascript:void(0)">{{ $user->username }}</a>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    @yield('scripts-body')
    @livewireScripts
</body>

</html>
