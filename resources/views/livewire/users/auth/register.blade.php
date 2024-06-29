<div class="bg-gray-950 text-white px-4 py-5 sm:rounded-lg bg-opacity-10 bg-blend-color-burn">
    <!-- Stage 1 FORM -->
    @if ($stage === 1)

        <p class="text-2xl text-center font-medium text-zinc-500">
            Enter Details
        </p>

        <form class="mt-6 space-y-6" wire:submit.prevent="saveEmailAndPassword">
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
                <a href="#" class="font-medium text-indigo-400 hover:text-indigo-300"> Login </a>
            </p>
        </form>
    @elseif ($stage === 2)
        <livewire:users.auth.register-username lazy />
    @elseif ($stage === 3)
        <livewire:users.auth.register-badges lazy />
    @endif
</div>
