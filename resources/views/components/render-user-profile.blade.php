<div class="max-w-full w-[800px] mx-auto z-10 px-3">
    <!-- Profile Banner and Avatar -->
    <div class="relative bg-black h-32 rounded-lg"
        style="background: url({{ asset($profile->banner_path) }}); background-size: cover">
        <img src="{{ asset($profile->avatar_path) }}" alt="Profile"
            class="absolute -bottom-10 left-4 h-20 w-20 bg-white rounded-full">
    </div>
</div>

<div class="max-w-full w-[800px] mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
    <!-- Profile Info and Bio Card -->
    <div class="flex justify-center items-center pl-4 flex-wrap break-words">
        <div class="relative bg-gray-950 h-auto w-full rounded-xl bg-opacity-25 p-5 pt-10 flex flex-col">
            <span class="flex absolute top-0 right-0 z-10">
                <span
                    class="animate-ping absolute inline-flex size-6 right-0 top-0 rounded-full bg-red-400 opacity-75 dark:bg-red-600">
                </span>
                <span class="relative inline-flex text-xs bg-red-500 text-white rounded-full py-0.5 px-1.5">
                    Member Since &nbsp;<code>
                        {{ $profile->created_at->longAbsoluteDiffForHumans() }}
                    </code>
                </span>
            </span>
            <div>
                <h1 class="text-xl text-gray-200 relative font-bold leading-6 flex gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20"
                        class="mt-1 pl-0">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M6.267 3.455a3.066 3.066 0 0 0 1.745-.723a3.066 3.066 0 0 1 3.976 0a3.066 3.066 0 0 0 1.745.723a3.066 3.066 0 0 1 2.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 0 1 0 3.976a3.066 3.066 0 0 0-.723 1.745a3.066 3.066 0 0 1-2.812 2.812a3.066 3.066 0 0 0-1.745.723a3.066 3.066 0 0 1-3.976 0a3.066 3.066 0 0 0-1.745-.723a3.066 3.066 0 0 1-2.812-2.812a3.066 3.066 0 0 0-.723-1.745a3.066 3.066 0 0 1 0-3.976a3.066 3.066 0 0 0 .723-1.745a3.066 3.066 0 0 1 2.812-2.812m7.44 5.252a1 1 0 0 0-1.414-1.414L9 10.586L7.707 9.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    {{ $profile->name }}
                </h1>
                {{ $profile->username }}
                <h1 class="pt-3 text-xl text-gray-200 relative font-bold leading-6 flex gap-1">
                    Bio
                </h1>
                <p>{{ $profile->bio }}</p>
            </div>
        </div>
    </div>

    <!-- Badges Card -->
    <div class="py-5 flex justify-center items-center relative flex-wrap break-words pr-4">
        <div class="relative bg-gray-950 h-auto w-full rounded-lg bg-opacity-25 p-5 pt-10 flex flex-col transform transition-all duration-700">
            <h1 class="text-xl text-gray-200 relative font-bold leading-6 flex gap-1">
                Badges
            </h1>
            @if ($profile->badges)
                <div class="flex flex-wrap gap-1 mt-3">
                    @php
                        $userBadges = json_decode($profile->badges, 1);
                    @endphp
                    @if (count($userBadges) > 0)
                        @foreach ($userBadges as $userBadge)
                            @if ($badges[$userBadge])
                                @php
                                    $badge = $badges[$userBadge];
                                @endphp

                                <button
                                    class="flex flex-row px-2 py-1 space-x-1 rounded-full justify-center items-center border"
                                    style="border-color: {{ $profile->accent_color }}">
                                    <span class="w-3">
                                        <img draggable="false" alt="{{ $badge['code'] }}"
                                            src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/72x72/{{ $badge['code'] }}.png">
                                    </span>
                                    <span class="text-slate-400 text-xs">
                                        {{ $badge['name'] }}
                                    </span>
                                </button>
                            @endif
                        @endforeach
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
