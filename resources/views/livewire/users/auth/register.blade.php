<div class="bg-gray-950 text-white px-4 py-5 sm:rounded-lg bg-opacity-20 bg-blend-color-burn">
    <!-- Stage 1 FORM -->
    @if ($stage === 1)

        <p class="text-2xl text-center font-medium text-zinc-500">
            Enter Details
        </p>

        <form class="mt-6 space-y-6" wire:submit.prevent="save">
            <div class="-space-y-px rounded-md shadow-sm">
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
                    <svg wire:loading wire:target="save" class="animate-spin -ml-1 mt-1 mr-3 h-4 w-4 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
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
                <a href="#" class="font-medium text-indigo-400 hover:text-indigo-300"> Login </a>
            </p>
        </form>
    @elseif ($stage === 2)
        <p class="text-2xl text-center font-medium text-zinc-300">
            Choose Username
        </p>
        <form class="mt-6 space-y-6" wire:submit.prevent="save">
            <div class="-space-y-px rounded-md shadow-sm">
                <div class="relative flex items-center">
                    <p
                        class="py-2 px-3 text-gray-500 bg-gray-100 dark:bg-gray-800 dark:border-gray-700 border border-r-0 rounded-l-lg">
                        {{ config('app.app_base') }}/
                    </p>
                    <label for="username" class="sr-only">Email address</label>
                    <input id="username" name="email" type="text" wire:model="username" required
                        class="relative block w-full appearance-none rounded-none rounded-t-sm {{ $errors->has('email') ? 'border-2 border-red-500' : 'border border-gray-700' }}  bg-gray-800 text-gray-300 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm p-2.5"
                        placeholder="username">
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
                    <svg wire:loading wire:target="save" class="animate-spin -ml-1 mt-1 mr-3 h-4 w-4 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </button>
            </div>
        </form>
    @elseif ($stage === 3)
        <div>
            <p class="text-2xl text-center font-medium text-zinc-300">
                Add Badges
            </p>

            <form class="mt-6 space-y-6" wire:submit.prevent="click">
                <div class="flex flex-wrap items-center justify-center mx-auto gap-1">
                    @foreach ($badges as $badge)
                        @php
                            $id = $badge->id;
                            $isAlreadySelected = strictCheckValue($id, $selectedBadges);
                            $function = $isAlreadySelected ? 'removeBadge' : 'addBadge';
                        @endphp

                        <button wire:click.prevent="{{ $function }}({{ $id }})"
                            wire:loading.attr="disabled" wire:target="{{ $function }}({{ $id }})"
                            type="button"
                            class="flex flex-row px-2 py-1 space-x-1 rounded-full justify-center items-center border border-slate-400 {{ !$isAlreadySelected ? 'opacity-40' : 'opacity-100' }}"
                        >
                            <span class="w-3">
                                <img draggable="false" alt="{{ $badge->name }}"
                                    src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/72x72/{{ $badge->code }}.png">
                            </span>
                            <span class="text-slate-400 text-xs">
                                {{ $badge->name }}
                            </span>
                            @if ($isAlreadySelected)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            @endif

                            @php
                                $loader = badgeSpinner($function . "($id)");
                            @endphp

                            @if ($function == 'addBadge')
                                {!! $loader !!}
                            @endif
                            @if ($function == 'removeBadge')
                                {!! $loader !!}
                            @endif

                        </button>
                    @endforeach
                </div>

                <div class="shadow-2xl">
                    <button type="submit" wire:loading.attr="disabled"
                        class="border-0 group relative flex w-full justify-center gap-3 rounded-md !bg-gray-900 py-2 px-4 text-sm font-medium text-white transition duration-700 hover:!bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Continue
                        <svg wire:loading wire:target="click" class="animate-spin -ml-1 mt-1 mr-3 h-4 w-4 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
