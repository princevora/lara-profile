<div class="flex flex-col w-full mt-4 mb-6 bg-transparent rounded-lg">
    @if ($errors->any())
        <div
            class="flex flex-col p-5 m-2 border shadow-sm rounded-xl  dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                Errors Occured
            </h3>
            <ul class="marker:text-red-500 list-disc ps-5 space-y-2 text-sm text-gray-600 dark:text-neutral-400">
                @foreach ($errors->all() as $key => $error)
                    <li wire:key='{{ $key }}'>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="flex flex-row mb-8 space-x-8">
        <div class="flex flex-col max-w-20 break-words">
            <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress" class="mt-1">
                <!-- File Input -->
                <label for="avatar" class="mt-1">
                    <div><input accept="image/*" wire:model="avatar" id="avatar" hidden="" type="file"></div>
                    <p class="text-zinc-400 text-sm mb-1">Avatar</p>
                    <div class="relative bg-gray-900 cursor-pointer transition-all">
                        @if ($avatar || $userAvatar)
                            <div 
                                wire:loading.remove 
                                wire:target="removeAvatar" 
                                wire:click.prevent="removeAvatar" 
                                class="absolute z-10 -top-2 -right-2 hover:opacity-50"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-5 h-5 text-zinc-300">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>

                            {!! badgeSpinner("removeAvatar", "absolute z-50 -top-2 -right-2") !!}

                        @endif
                        @if (!$avatar && !$userAvatar)
                            <div wire:loading.remove wire:target='avatar'
                                class="flex items-center justify-center w-20 h-20 bg-gray-300 rounded dark:bg-gray-700">
                                <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                                </svg>
                            </div>
                        @endif
                        <div 
                            wire:loading 
                            wire:target='avatar'
                            class="animate-pulse rounded bg-gray-300 dark:bg-gray-600 w-20 h-20"
                        >
                        </div>

                        @if ($avatar instanceof Livewire\Features\SupportFileUploads\TemporaryUploadedFile || !is_null($userAvatar))
                            @php
                                $src = 
                                    $avatar instanceof Livewire\Features\SupportFileUploads\TemporaryUploadedFile 
                                        && is_null($userAvatar)
                                        ? $avatar->temporaryUrl() 
                                        : asset($userAvatar);
                            @endphp
                            <img 
                                wire:loading.remove 
                                wire:target='avatar' 
                                src="{{ $src }}"
                                class="object-cover transition-all z-0 rounded w-20 h-20"
                            />
                        @endif
                    </div>
                </label>

                <!-- Progress Bar -->
                <div x-show="isUploading">
                    <div class="flex items-center gap-x-3 whitespace-nowrap mb-5">
                        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
                            role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-teal-500 text-xs text-white text-center whitespace-nowrap transition duration-500"
                                :style="{ width: progress + '%' }">
                            </div>
                        </div>
                        <div class="w-6 text-end">
                            <span class="text-sm text-gray-800 dark:text-white" x-text="progress + '%'"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col max-w-36 break-words">
            <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress" class="mt-1">

                <!-- File Input -->
                <label for="banner" class="mt-1">
                    <div><input accept="image/*" wire:model="banner" id="banner" hidden="" type="file"></div>
                    <p class="text-zinc-400 text-sm mb-1">Background</p>
                    <div class="relative  bg-gray-900 cursor-pointer transition-all">
                        @if ($banner || $userBanner)

                            <div wire:loading.remove wire:target="removeBanner">
                                <div wire:click.prevent="removeBanner" class="absolute z-50 -top-2 -right-2 hover:opacity-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true" class="w-5 h-5 text-zinc-300">
                                        <path fill-rule="evenodd"
                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>

                            {!! badgeSpinner("removeBanner", "absolute z-50 -top-2 -right-2") !!}

                        @endif

                        {{-- @dd($banner , $userBanner, $banner , $userBanner) --}}
                        @if (!$banner && !$userBanner)
                            <div wire:loading.remove wire:target='banner'
                                class="flex items-center justify-center w-36 h-20 bg-gray-300 rounded dark:bg-gray-700">
                                <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                                </svg>
                            </div>
                        @endif
                        <div 
                            wire:loading 
                            wire:target='banner'
                            class="animate-pulse rounded bg-gray-300 dark:bg-gray-600 w-36 h-20"
                        >
                        </div>
                        @if ($banner instanceof Livewire\Features\SupportFileUploads\TemporaryUploadedFile || (!is_null($userBanner) && !empty($userBanner)))
                            @php
                                $src = 
                                    $banner instanceof Livewire\Features\SupportFileUploads\TemporaryUploadedFile  //Condition
                                        && is_null($userBanner) 
                                        ? $banner->temporaryUrl() 
                                        : asset($userBanner);
                            @endphp
                            <img 
                                wire:loading.remove 
                                wire:target='banner' 
                                src="{{ $src }}"
                                class="object-cover transition-all z-0 rounded w-36 h-20"
                            />
                        @endif
                    </div>
                </label>

                <!-- Progress Bar -->
                <div x-show="isUploading">
                    <div class="flex items-center gap-x-3 whitespace-nowrap mb-5">
                        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
                            role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-teal-500 text-xs text-white text-center whitespace-nowrap transition duration-500"
                                :style="{ width: progress + '%' }"></div>
                        </div>
                        <div class="w-6 text-end">
                            <span class="text-sm text-gray-800 dark:text-white" x-text="progress + '%'"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form wire:submit.prevent="save" class="relative">
        <div>
            <div class="flex flex-row items-center justify-between">
                <label class="block text-sm text-left text-zinc-400 undefined" for="input_name">Name</label>
            </div>
            <div class="relative flex mt-1 shadow">
                <input name="name" wire:model="name" autocapitalize="words" type="text"
                    class="block w-full rounded bg-black text-zinc-400 placeholder-zinc-500 border-zinc-700 border focus:ring-0 focus:outline-none"
                    value="{{ $name }}" />
            </div>
            <p class="text-xs text-left m-0 mt-1 text-red-600 mb-4"></p>
        </div>
        <div>
            <div class="flex flex-row items-center justify-between"><label
                    class="block text-sm text-left text-zinc-400 undefined" for="input">URL</label>
            </div>
            <div class="relative flex mt-1 shadow">
                <div
                    class="inline-flex items-center px-2 text-sm border rounded focus-none border-zinc-700 bg-opacity-50 text-zinc-500">
                    {{ config('app.app_base') }}/
                </div>
                <input name="url" autocapitalize="none" disabled type="text"
                    class="block w-full rounded bg-black text-zinc-400 placeholder-zinc-500  dark:bg-black dark:opacity-40 rounded-l-none border-l-0 border-zinc-700 border focus:ring-0 focus:outline-none"
                    value="{{ $user->username }}">
            </div>
            <p class="text-xs text-left m-0 mt-1 text-red-600 mb-4"></p>
        </div>
        <div>
            <div class="flex flex-row items-center justify-between">
                <label class="block text-sm text-left text-zinc-400 undefined" for="input">Bio</label>
            </div>
            <div class="relative flex mt-1 shadow">
                <textarea name="bio" wire:model="bio" inputtype="textarea" autocapitalize="none"
                    class="block w-full rounded bg-black text-zinc-400 placeholder-zinc-500 resize-none overflow-auto border-zinc-700 border focus:ring-0 focus:outline-none">
                {{ $bio }}
                </textarea>
            </div>
            <p class="text-xs text-left m-0 mt-1 text-red-600 mb-4"></p>
        </div>
        <div x-data="palettes">
            <div class="flex gap-2">
                <p class="text-zinc-400 text-sm mt-4 mb-1">Accent Color</p>
                <span class="cursor-pointer group relative w-max" wire:loading.remove>
                    <button @click.prevent="refreshColors(event)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-4 mt-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </button>
                    <span
                        class="pointer-events-none absolute -top-7 bg-gray-600 rounded-md font-normal p-1 text-gray-300 left-0 w-max opacity-0 transition-opacity group-hover:opacity-100">
                        Refresh Palettes
                    </span>
                </span>

                <div wire:loading
                    class="size-4 mt-4 animate-spin inline-block border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-blue-500"
                    role="status" aria-label="loading">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="flex items-center mt-3 mb-1">
                    <label for="hs-xs-switch" class="text-sm text-gray-500 me-3 dark:text-neutral-400">Gradient
                        View</label>
                    <input type="checkbox" {{ $gradientView ? 'checked' : '' }} wire:loading.attr='disabled'
                        wire:click="setVieType()" id="hs-xs-switch"
                        class="relative w-[35px] h-[21px] bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-4 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                </div>
            </div>
            <label for="preview-background" class="relative cursor-pointer">
                @php
                    $linearGradient = "linear-gradient(to right, #f7e0d4, $accentColor)";

                    if ($previewImage) {
                        $url = @$previewImage->temporaryUrl();
                        $previewImageURL = "url($url)";
                    }

                    $previewBackground = $previewImage
                        ? $previewImageURL
                        : ($gradientView
                            ? $linearGradient
                            : $accentColor);

                    $backgroundSelector = !$gradientView ? 'background' : 'background-image';
                @endphp
                <div class="max-w-full flex-wrap h-32 rounded-md p-3 mb-2 flex justify-center items-center"
                    style="{{ $backgroundSelector }} : {{ $previewBackground }}; background-size: cover;"
                    title="Choose Background">

                    <!-- ========== Start Preview Badge ========== -->
                    <span class="flex absolute top-0 end-0 -mt-2 -me-2">
                        <span
                            class="animate-ping absolute inline-flex size-full rounded-full bg-red-400 opacity-75 dark:bg-red-600"></span>
                        <span class="relative inline-flex text-xs bg-red-500 text-white rounded-full py-0.5 px-1.5">
                            Preview
                        </span>
                    </span>
                    <!-- ========== End Preview Badge ========== -->

                    <!-- ========== Hidden File Input ========== -->
                    <input type="file" class="hidden" wire:model='previewImage' id="preview-background"
                        accept="image/*">

                    <!-- ========== Start Main Preview Content ========== -->
                    <div class="flex flex-col items-center">
                        <div
                            class="flex items-center justify-center w-10 h-10 bg-gray-300 rounded-full dark:bg-gray-700">
                            <svg class="w-5 h-5 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path
                                    d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                            </svg>
                        </div>
                        <span class="rounded text-black ">
                            {{ $user->name }}
                        </span>
                        <div class="flex justify-center gap-2">
                            @foreach (['Coder' => '1f4bb', 'Writer' => '1f4dd', 'Entrepreneur' => '1f4bc'] as $name => $code)
                                <div class="mt-2">
                                    <button type="button"
                                        class="flex flex-row px-2 py-1 space-x-1 rounded-full justify-center items-center border-2 border-dotted border-black opacity-100">
                                        <span class="w-3">
                                            <img draggable="false" alt="Preview Badge 1"
                                                src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/72x72/{{ $code }}.png">
                                        </span>
                                        <span class="text-slate-400 text-xs">
                                            {{ $name }}
                                        </span>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- ========== End Main Preview Content ========== -->

                </div>
            </label>
            <div class="w-full flex flex-wrap gap-x-2 mb-6 select-none">

                <!-- ========== Start Primary Color ========== -->
                <div
                    class="relative mb-2 flex flex-col hover:bg-slate-400 transition-transform transform-gpu hover:scale-110 rounded-md duration-700 items-center">
                    <div>
                        <div style="background: {{ $accentColor }}" title="Current Accent Color"
                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 border-2 border-dotted border-red-500 opacity-60 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true" class="absolute z-10  w-7 h-7 text-zinc-300">
                                <!-- Background circle -->
                                <circle cx="12" cy="12" r="10" fill="#000"></circle>
                                <!-- Check mark path -->
                                <path fill-rule="evenodd"
                                    d="M10.28 15.22a.75.75 0 001.06 0l5.25-5.25a.75.75 0 00-1.06-1.06L10.75 13.44 8.47 11.16a.75.75 0 10-1.06 1.06l2.87 2.87z"
                                    clip-rule="evenodd" fill="currentColor"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- ========== End Primary Color ========== -->


                <!-- ========== Start Colors List ========== -->
                <template x-for="color in colors" :key="color">
                    <div :class="color == '{{ $accentColor }}' ? 'cursor-default' : 'cursor-pointer'"
                        class="relative mb-2 flex flex-col hover:bg-slate-400 transition-transform transform-gpu hover:scale-110 rounded-md duration-700 items-center">
                        <div>
                            <div @click.prevent="if (color !== '{{ $accentColor }}') { $wire.setAccentColor(color); }"
                                :title="color" :style="{ background: color }"
                                class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 opacity-60 transition-all"
                            >
                                <div x-show="$wire.accentColor == color">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true"
                                        class="absolute z-10 top-2 right-3.5 w-7 h-7 text-zinc-300">
                                        <!-- Background circle -->
                                        <circle cx="12" cy="12" r="10" fill="#000"></circle>
                                        <!-- Check mark path -->
                                        <path fill-rule="evenodd"
                                            d="M10.28 15.22a.75.75 0 001.06 0l5.25-5.25a.75.75 0 00-1.06-1.06L10.75 13.44 8.47 11.16a.75.75 0 10-1.06 1.06l2.87 2.87z"
                                            clip-rule="evenodd" fill="currentColor">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                <!-- ========== End Colors List ========== -->


                <div class="max-w-xs">
                    <h2 class="text-lg font-bold text-gray-800 dark:text-white">
                        My Badges
                    </h2>

                    <hr class="border-gray-600">

                </div>

                <!-- ========== Start User Badges ========== -->
                <div class="flex justify-center p-0 fade">
                    @livewire('users.auth.register-badges', ['lazy' => true, 'primaryBadges' => $userBadges, 'accentColor' => $accentColor])
                </div>
                <!-- ========== End User Badges ========== -->


            </div>
        </div>
        <hr class="opacity-20 rounded-sm fade">
        <div class="flex justify-center p-4">
            <button type="submit"
                class="flex items-center justify-center px-6 mt-4 text-sm font-medium tracking-wide text-gray-700 capitalize transition-all duration-200 transform border border-gray-300 rounded-lg w-[50%] sm:mt-0 gap-x-2 h-11 dark:text-white hover:border-gray-400 dark:border-gray-700 dark:hover:border-gray-500 focus:ring focus:ring-blue-300 dark:focus:ring-white/10 focus:ring-opacity-80">
                Save Profile
                <div wire:loading wire:target="save, saveUser, getUserBadges"
                    class="size-4 animate-spin inline-block border-[3px] border-current border-t-transparent text-gray-600 rounded-full "
                    role="status" aria-label="loading">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </div>
    </form>
</div>
