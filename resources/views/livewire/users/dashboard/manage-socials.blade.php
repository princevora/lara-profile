<div class="bg-gray-950 h-auto w-full rounded-xl bg-opacity-25 p-5 pt-10 flex flex-col">
    <div>
        <h1 class="text-xl text-gray-200 relative font-bold leading-6 flex gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20" class="mt-1 pl-0">
                <path fill="currentColor" fill-rule="evenodd"
                    d="M6.267 3.455a3.066 3.066 0 0 0 1.745-.723a3.066 3.066 0 0 1 3.976 0a3.066 3.066 0 0 0 1.745.723a3.066 3.066 0 0 1 2.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 0 1 0 3.976a3.066 3.066 0 0 0-.723 1.745a3.066 3.066 0 0 1-2.812 2.812a3.066 3.066 0 0 0-1.745.723a3.066 3.066 0 0 1-3.976 0a3.066 3.066 0 0 0-1.745-.723a3.066 3.066 0 0 1-2.812-2.812a3.066 3.066 0 0 0-.723-1.745a3.066 3.066 0 0 1 0-3.976a3.066 3.066 0 0 0 .723-1.745a3.066 3.066 0 0 1 2.812-2.812m7.44 5.252a1 1 0 0 0-1.414-1.414L9 10.586L7.707 9.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0z"
                    clip-rule="evenodd" />
            </svg>
            {{ $user->name }}
        </h1>
        <h1 class="pt-3 text-xl text-gray-200 relative font-bold leading-6 flex gap-1">
            Available Networks
        </h1>
        <div class="p-4">
            @foreach ($networks as $network)
                <div class="flex gap-2 mt-2">
                    <div class="flex items-center border justify-center w-10 h-10 bg-gray-300 rounded-full dark:bg-gray-700">
                        <svg class="w-5 h-5 text-gray-200 dark:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                        </svg>
                    </div>
                    <h6 class="p-1 text-gray-200 relative  font-semibold">
                        {{ Str::ucfirst($network) }}
                    </h6>
                </div>
            @endforeach

        </div>
    </div>
</div>
