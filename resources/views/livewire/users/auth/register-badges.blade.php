<div >
    @if ($showTitle)
        <p class="text-2xl text-center font-medium text-zinc-300">
            {{ $pageTitle }}
        </p>
    @endif

    <form class="mt-6 space-y-6" wire:submit.prevent="save">
        <div class="flex flex-wrap items-center justify-center mx-auto gap-1">

            @foreach ($badges as $badge)
                <div  wire:key="{{ $badge->id }}">
                    @php
                        $id = $badge->id;
                        $isAlreadySelected = strictCheckValue($id, $selectedBadges);
                        $function = $isAlreadySelected ? 'removeBadge' : 'addBadge';
                    @endphp

                    <button 
                            wire:click.prevent="{{ $function }}({{ $id }})" 
                            wire:loading.attr="disabled"
                            wire:target="{{ $function }}({{ $id }})" type="button"
                            class="flex flex-row px-2 py-1 space-x-1 rounded-full justify-center items-center border {{ !$isAlreadySelected ? 'opacity-40' : 'opacity-100' }}"
                            style="border-color: {{ $accentColor }}"
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
                </div>
            @endforeach
        </div>

        {{-- This will be used to prevent Showing submition button --}}
        @if ($isForm)
            <div class="shadow-2xl">
                <button type="submit" wire:loading.attr="disabled"
                    class="border-0 group relative flex w-full justify-center gap-3 rounded-md !bg-gray-900 py-2 px-4 text-sm font-medium text-white transition duration-700 hover:!bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Continue
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
        @endif

    </form>
</div>
