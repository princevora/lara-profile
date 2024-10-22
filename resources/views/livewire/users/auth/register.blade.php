<div class="bg-gray-950 text-white px-4 py-5 sm:rounded-lg bg-opacity-10 bg-blend-color-burn">
    @if (@count($globalErrors) > 0)
        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white text-center">Some Error(s) Occured</h2>
        <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400 mb-10">
            @foreach ($globalErrors as $key => $error)
                <li wire:key="{{ $key }}" class="flex justify-center items-start mt-4">
                    <svg class="w-5 h-5 mr-2 text-red-400 dark:text-red-700 flex-shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 1.5a8.5 8.5 0 1 0 8.5 8.5A8.51 8.51 0 0 0 10 1.5Zm2.828 11.828a1 1 0 0 1-1.414 0L10 10.914 8.586 13.328a1 1 0 1 1-1.414-1.414L8.586 9.5 7.172 8.086a1 1 0 1 1 1.414-1.414L10 8.086 11.414 6.672a1 1 0 1 1 1.414 1.414L11.414 9.5l1.414 1.414a1 1 0 0 1 0 1.414Z">
                        </path>
                    </svg>
                    <p class="break-words break-words-custom w-full">
                        {!! $error !!}
                    </p>
                </li>
            @endforeach
        </ul>
    @endif

    @switch($stage)
        @case($stage == 1)
            <div>
                <p class="text-2xl text-center font-medium text-zinc-500">
                    Enter Details
                </p>

                <form class="mt-6 space-y-6" wire:submit.prevent="saveEmailAndPassword">
                    <div class="-space-y-px rounded-md shadow-sm">
                        <div class="relative mb-4">
                            <label for="name" class="sr-only">Name</label>
                            <input id="name" name="text" type="text" wire:model="name" autocomplete="name"
                                required
                                class="relative block w-full appearance-none rounded-none rounded-t-md {{ $errors->has('email') ? 'border-2 border-red-500' : 'border border-gray-700' }}  bg-gray-900 text-gray-300 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm p-2.5"
                                placeholder="Name">
                            @if ($errors->has('email'))
                                <span
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none leading-none text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                    </svg>
                                </span>
                            @endif
                        </div>
                        <div class="relative">
                            <label for="email-address" class="sr-only">Email address</label>
                            <input id="email-address" name="email" type="email" wire:model="email" autocomplete="email"
                                required
                                class="relative block w-full appearance-none rounded-none rounded-t-md {{ $errors->has('email') ? 'border-2 border-red-500' : 'border border-gray-700' }}  bg-gray-900 text-gray-300 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm p-2.5"
                                placeholder="Email address">
                            @if ($errors->has('email'))
                                <span
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none leading-none text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                    </svg>
                                </span>
                            @endif
                        </div>
                        <div class="relative">
                            <label for="password" class="sr-only">Password</label>
                            <input id="password" name="password" type="password" wire:model="password"
                                autocomplete="current-password" required
                                class="relative block w-full appearance-none rounded-none rounded-b-md {{ $errors->has('password') ? 'border-2 border-red-500' : 'border border-gray-700' }} bg-gray-900 text-gray-300 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm p-2.5"
                                placeholder="Password">
                            @if ($errors->has('password'))
                                <span
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none leading-none text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                    </svg>
                                </span>
                            @endif
                        </div>
                        @if ($errors->any())
                            <div class="py-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-500 text-sm mt-1">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="shadow-2xl">
                        <button type="submit" wire:loading.attr="disabled"
                            class="border-0  group relative flex w-full justify-center gap-3 rounded-md !bg-gray-900 py-2 px-4 text-sm font-medium text-white transition duration-700 hover:!bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Register
                            <svg wire:loading wire:target="saveEmailAndPassword"
                                class="animate-spin -ml-1 mt-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </button>
                    </div>

                    <p class="mt-3 text-center text-sm text-gray-400">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-medium text-indigo-400 hover:text-indigo-300" wire:navigate>
                            Login </a>
                    </p>
                </form>
            </div>
        @break

        @case ($stage == 2)
            <livewire:users.auth.register-username lazy />
        @break

        @case ($stage === 3)
            <livewire:users.auth.register-badges 
                lazy 
                showTitle
                isForm
            />
        @break

        @case($stage == 4)
            <div class="flex justify-center gap-2">
                @if (@count($globalErrors) > 0)
                    <div class="border-b bottom-0 border-blue-400 border-opacity-65 flex justify-center gap-2 ">
                        <svg width="23" height="23" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_2592_7101)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10 1.5a8.5 8.5 0 1 0 8.5 8.5A8.51 8.51 0 0 0 10 1.5Zm2.828 11.828a1 1 0 0 1-1.414 0L10 10.914 8.586 13.328a1 1 0 1 1-1.414-1.414L8.586 9.5 7.172 8.086a1 1 0 1 1 1.414-1.414L10 8.086 11.414 6.672a1 1 0 1 1 1.414 1.414L11.414 9.5l1.414 1.414a1 1 0 0 1 0 1.414Z"
                                    fill="#ef4444 " />
                            </g>
                            <defs>
                                <clipPath id="clip0_2592_7101">
                                    <rect width="20" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                        <a href="" wire:navigate>
                            <code>Unable to Save, Please Refresh ...</code>
                        </a>
                    </div>
                @else
                    <div class="flex justify-center gap-2">
                        <div class="p-0">
                            <svg class="animate-spin" width="23" height="23" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_2592_7101)">
                                    <path opacity="0.33" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.6066 0.345176L12.1759 1.95287C11.9417 1.88993 11.7052 1.83929 11.4632 1.79612C11.2212 1.75296 10.9818 1.71873 10.7403 1.6968L10.892 0.0393588C11.1794 0.065229 11.4687 0.104137 11.7559 0.15535C12.043 0.206563 12.3279 0.270083 12.6066 0.345176Z"
                                        fill="#3758F9" />
                                    <path opacity="0.38" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.0182 1.34671L14.1811 2.78881C13.7674 2.54571 13.3299 2.34072 12.8687 2.17381L13.44 0.60813C13.9926 0.808271 14.5193 1.05881 15.0182 1.34671Z"
                                        fill="#3758F9" />
                                    <path opacity="0.42" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.0867 2.94304L15.904 4.1161C15.5633 3.77177 15.1915 3.45996 14.7933 3.17731L15.7554 1.81679C16.2325 2.15582 16.6776 2.53148 17.0867 2.94304Z"
                                        fill="#3758F9" />
                                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M18.6682 5.01543L17.225 5.84575C16.9824 5.4258 16.7068 5.02535 16.3966 4.65259L17.6747 3.58543C18.0477 4.03288 18.3814 4.51141 18.6682 5.01543Z"
                                        fill="#3758F9" />
                                    <path opacity="0.55" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M19.6684 7.42856L18.0557 7.85621C17.9323 7.38556 17.7642 6.92809 17.5622 6.49423L19.0718 5.79002C19.3166 6.31617 19.5152 6.86372 19.6684 7.42856Z"
                                        fill="#3758F9" />
                                    <path opacity="0.6" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M20.002 10.019L18.3354 10.0138C18.3382 9.52335 18.293 9.04126 18.2128 8.56561L19.8546 8.28284C19.953 8.84638 20.0053 9.43131 20.002 10.019Z"
                                        fill="#3758F9" />
                                    <path opacity="0.65" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M19.8447 11.7559C19.7934 12.043 19.7299 12.328 19.6548 12.6066L18.0438 12.1711C18.106 11.941 18.1607 11.7053 18.2039 11.4633C18.247 11.2212 18.2779 10.977 18.2991 10.7396L19.9606 10.892C19.9355 11.1753 19.8966 11.4647 19.8447 11.7559Z"
                                        fill="#3758F9" />
                                    <path opacity="0.7" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M19.3926 13.436C19.1917 13.9927 18.9412 14.5194 18.6533 15.0182L17.2112 14.1812C17.4502 13.7667 17.66 13.3259 17.8269 12.8647L19.3926 13.436Z"
                                        fill="#3758F9" />
                                    <path opacity="0.75" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M18.184 15.7514C17.8442 16.2325 17.4685 16.6776 17.0577 17.0826L15.8839 15.904C16.2241 15.5626 16.54 15.1915 16.8186 14.7926L18.184 15.7514Z"
                                        fill="#3758F9" />
                                    <path opacity="0.8" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.4112 17.6699C15.9678 18.0437 15.4893 18.3774 14.9846 18.6682L14.1543 17.225C14.5742 16.9825 14.9713 16.702 15.344 16.3918L16.4112 17.6699Z"
                                        fill="#3758F9" />
                                    <path opacity="0.95" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.21 19.0718C13.6838 19.3166 13.1363 19.5152 12.5721 19.6643L12.1397 18.055C12.6111 17.9275 13.0678 17.7635 13.5065 17.5581L14.21 19.0718Z"
                                        fill="#3758F9" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.7179 19.8505C11.1495 19.9523 10.5694 20.0012 9.98093 20.0021L9.98616 18.3354C10.4773 18.3341 10.9587 18.293 11.4303 18.2121L11.7179 19.8505Z"
                                        fill="#3758F9" />
                                    <path opacity="0.05" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.10799 19.9606C8.82057 19.9347 8.53124 19.8958 8.24411 19.8446C7.95697 19.7934 7.67203 19.7299 7.39339 19.6548L7.82477 18.043C8.05902 18.1059 8.29474 18.1607 8.53675 18.2039C8.77877 18.247 9.01887 18.2771 9.26044 18.2991L9.10799 19.9606Z"
                                        fill="#3758F9" />
                                    <path opacity="0.07" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.1312 17.8262L6.55991 19.3919C6.00803 19.1876 5.48061 18.9412 4.98248 18.6492L5.8188 17.2112C6.23328 17.4502 6.67074 17.6552 7.1312 17.8262Z"
                                        fill="#3758F9" />
                                    <path opacity="0.09" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.20739 16.8186L4.24522 18.1791C3.76744 17.8442 3.32232 17.4685 2.91323 17.057L4.09664 15.8798C4.43731 16.2241 4.80917 16.5359 5.20739 16.8186Z"
                                        fill="#3758F9" />
                                    <path opacity="0.11" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.60406 15.3433L2.32599 16.4105C1.95293 15.963 1.61927 15.4845 1.33248 14.9805L2.7757 14.1501C3.01823 14.5701 3.29386 14.9705 3.60406 15.3433Z"
                                        fill="#3758F9" />
                                    <path opacity="0.13" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.43772 13.5058L0.928848 14.2059C0.683367 13.6838 0.484757 13.1363 0.332289 12.5673L1.94493 12.1397C2.06838 12.6103 2.2365 13.0678 2.43772 13.5058Z"
                                        fill="#3758F9" />
                                    <path opacity="0.15" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.78797 11.4303L0.145415 11.7171C0.0477348 11.1495 -0.00526797 10.5687 -0.0012875 9.97685L1.66536 9.98208C1.66253 10.4725 1.70701 10.9587 1.78797 11.4303Z"
                                        fill="#3758F9" />
                                    <path opacity="0.17" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.79609 8.53676C1.75293 8.77878 1.7228 9.01888 1.70161 9.25635L0.0393276 9.108C0.0651979 8.82058 0.104105 8.53125 0.155319 8.24411C0.206532 7.95698 0.270783 7.66794 0.345145 7.39339L1.95694 7.82478C1.89473 8.05493 1.83926 8.29475 1.79609 8.53676Z"
                                        fill="#3758F9" />
                                    <path opacity="0.19" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.78952 5.81474C2.5498 6.23332 2.3407 6.67005 2.17379 7.13124L0.608112 6.55995C0.808254 6.00734 1.05953 5.47655 1.3467 4.98179L2.78952 5.81474Z"
                                        fill="#3758F9" />
                                    <path opacity="0.21" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.11613 4.09597C3.77663 4.43326 3.46072 4.80439 3.18218 5.20335L1.81682 4.24454C2.15585 3.7675 2.53151 3.32237 2.94307 2.91328L4.11613 4.09597Z"
                                        fill="#3758F9" />
                                    <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.84654 2.77086C5.4266 3.01339 5.02952 3.29386 4.65676 3.60406L3.58959 2.32599C4.03295 1.9522 4.51147 1.61853 5.01622 1.32764L5.84654 2.77086Z"
                                        fill="#3758F9" />
                                    <path opacity="0.28" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.86098 1.94089C7.3896 2.06844 6.93287 2.23246 6.49417 2.43778L5.78996 0.928178C6.31611 0.683428 6.86366 0.484819 7.4285 0.331619L7.86098 1.94089Z"
                                        fill="#3758F9" />
                                    <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.0138 1.66458C9.52332 1.66175 9.04195 1.70287 8.56968 1.78793L8.2828 0.145371C8.85044 0.0476906 9.43127 -0.00531221 10.019 -0.00206337L10.0138 1.66458Z"
                                        fill="#3758F9" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_2592_7101">
                                        <rect width="20" height="20" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>

                        <code>Saving Your Data ...</code>
                    </div>
                @endif
            </div>
        @break

        @default
            <div class="text-lg text-gray-300 flex justify-center gap-2">
                <code>unknown form</code>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                </svg>
            </div>
    @endswitch
</div>
