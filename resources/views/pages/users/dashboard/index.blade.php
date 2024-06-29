@extends('pages.users.dashboard.layouts.layout')
@section('title', 'Register')
@section('content')
    <section class="w-full relative before:scale-y-110 before:mx-auto duration-1000 before:inset-x-0 before:-bottom-px before:bg-gradient-to-r before:from-transparent before:via-gray-950/10 dark:before:via-white/20 before:to-transparent before:h-px min-h-screen">
        <div class="relative overflow-hidden pt-28 sm:pt-32 bg-gray-50 dark:bg-black min-h-screen">
            <div aria-hidden="true" class="absolute inset-x-0 bottom-0 z-10 h-20 bg-gradient-to-b from-transparent to-gray-50 dark:to-gray-950"></div>
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
                        <a class="text-zinc-600 text-sm" href="/manage">Dashboard</a>
                        <p class="mx-2 cursor-default select-none text-zinc-800">/</p>
                        <a class="text-zinc-500 text-sm" href="/manage">princevora</a>
                    </div>
                    <div class="flex flex-col w-full mt-4 mb-6 bg-transparent rounded-lg">
                        <div class="flex flex-row mb-8 space-x-8">
                            <div class="flex flex-col">
                                <input accept="image/*" id="avi-image" hidden="" type="file">
                                <p class="text-zinc-400 text-sm mb-1">Avatar</p>
                                <div class="relative flex items-center mt-1 cursor-pointer transition-all">
                                    <div class="absolute z-10 top-0 right-0 hover:opacity-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            aria-hidden="true" class="w-5 h-5 text-zinc-300">
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <img src="https://cdn.ayo.so/final/ffa01453-4050-4703-a5ee-1e9f7de98d17.webp"
                                        class="object-cover transition-all z-0 rounded-md border-t-2 border-white border-b-[0.01px] w-20 h-20">
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <div><input accept="image/*" id="bg-img" hidden="" type="file"></div>
                                <p class="text-zinc-400 text-sm mb-1">Background</p>
                                <div class="relative mt-1 cursor-pointer transition-all">
                                    <div class="absolute z-10 -top-2 -right-2 hover:opacity-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            aria-hidden="true" class="w-5 h-5 text-zinc-300">
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <img src="https://cdn.ayo.so/final/6f332fe4-0fad-4169-9587-48e140c6a6b8.webp"
                                        class="object-cover transition-all z-0 rounded border-t-2 border-white border-b-2 w-36 h-20">
                                </div>
                            </div>
                        </div>
                        <form>
                            <div>
                                <div class="flex flex-row items-center justify-between">
                                    <label class="block text-sm text-left text-zinc-400 undefined"
                                        for="input">Name</label>
                                    <div class="text-zinc-600 text-xs select-none">10/75</div>
                                </div>
                                <div class="relative flex mt-1 shadow"><input name="name" autocapitalize="words"
                                        type="text"
                                        class="block w-full rounded bg-black text-zinc-400 placeholder-zinc-500 border-zinc-700 border focus:ring-0 focus:outline-none">
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
                                        ayo.so/
                                    </div>
                                    <input name="url" autocapitalize="none" disabled="" type="text"
                                        class="block w-full rounded bg-black text-zinc-400 placeholder-zinc-500 bg-gray-200 dark:bg-black dark:opacity-40 rounded-l-none border-l-0 border-zinc-700 border focus:ring-0 focus:outline-none">
                                </div>
                                <p class="text-xs text-left m-0 mt-1 text-red-600 mb-4"></p>
                            </div>
                            <div>
                                <div class="flex flex-row items-center justify-between">
                                    <label class="block text-sm text-left text-zinc-400 undefined"
                                        for="input">Bio</label>
                                    <div class="text-zinc-600 text-xs select-none">0/200</div>
                                </div>
                                <div class="relative flex mt-1 shadow">
                                    <textarea name="bio" inputtype="textarea" autocapitalize="none"
                                        class="block w-full rounded bg-black text-zinc-400 placeholder-zinc-500 resize-none overflow-auto border-zinc-700 border focus:ring-0 focus:outline-none"></textarea>
                                </div>
                                <p class="text-xs text-left m-0 mt-1 text-red-600 mb-4"></p>
                            </div>
                            <div>
                                <p class="text-zinc-400 text-sm mt-4 mb-1">Accent Color</p>
                                <div class="w-full flex flex-wrap gap-x-2 mb-6 select-none">
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-slate-500 transition-all">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" aria-hidden="true" class="text-zinc-200 w-6 h-6">
                                                    <path fill-rule="evenodd"
                                                        d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <span class="text-xs mt-0.5 text-slate-300">Slate</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-gray-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-gray-300">Gray</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-zinc-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-zinc-300">Zinc</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-neutral-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-neutral-300">Neutral</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-stone-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-stone-300">Stone</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-red-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-red-300">Red</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-orange-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-orange-300">Orange</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-amber-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-amber-300">Amber</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-yellow-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-yellow-300">Yellow</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-lime-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-lime-300">Lime</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-green-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-green-300">Green</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-emerald-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-emerald-300">Emerald</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-teal-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-teal-300">Teal</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-cyan-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-cyan-300">Cyan</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-sky-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-sky-300">Sky</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-blue-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-blue-300">Blue</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-indigo-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-indigo-300">Indigo</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-violet-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-violet-300">Violet</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-purple-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-purple-300">Purple</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-fuchsia-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-fuchsia-300">Fuchsia</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-pink-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-pink-300">Pink</span>
                                    </div>
                                    <div class="cursor-pointer mb-2 flex flex-col items-center">
                                        <div
                                            class="flex rounded justify-center items-center w-16 h-14 sm:w-14 sm:h-12 bg-rose-500 transition-all">
                                        </div>
                                        <span class="text-xs mt-0.5 text-rose-300">Rose</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 select-none min-w-[60px] flex items-start">
                                <span class="cursor-pointer flex items-center space-x-2">
                                    <input class="bg-black rounded" type="checkbox" checked="">
                                    <p class="text-zinc-400 text-sm">Show my Badges</p>
                                </span>
                            </div>
                            <div class="flex flex-col w-full mt-4 mb-6 bg-transparent rounded-lg">
                                <div
                                    class="bg-zinc-900 select-none cursor-pointer p-4 mt-2 rounded text-zinc-400 flex items-center">
                                    <input type="checkbox" class="mr-3 checked:bg-indigo-600 rounded" checked="">
                                    <p class="text-sm">Permit us to use your page for marketing purposes</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true" class="text-gray-500 h-5 w-5 ml-1">
                                        <path fill-rule="evenodd"
                                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 01-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 01-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 01-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584zM12 18a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <button type="submit"
                                class="mt-4 mb-1 cursor-pointer transition-all text-md font-sans text-center w-full mx-auto px-6 py-3 font-medium rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white">Save
                                Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
