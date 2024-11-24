@extends('pages.users.dashboard.layouts.layout')
@section('title', $user->username . ' - Testimonials Link')
@section('content')
    <div class="max-w-md mt-5 mx-auto bg-gray-950 text-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4 text-center">Your Testimonials Link</h1>
        <p class="text-sm text-gray-400 mb-6 text-center">
            Share your unique link below to collect testimonials. Click the button to copy it!
        </p>

        <div class="relative">
            <input type="text"
                class="w-full bg-gray-700 text-white border border-gray-600 rounded-lg py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                value="{{ route('testomonials.submit', $user->username) }}" disabled />
            <button onclick="copyLink()"
                class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow-md flex items-center space-x-2 transition-all">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 16v2a2 2 0 002 2h4a2 2 0 002-2v-2m4-4h-4m-4 0H8m0 0V8a2 2 0 012-2h4a2 2 0 012 2v4m4 0h-4m-4 0H8m0 0V8a2 2 0 012-2h4a2 2 0 012 2v4m4 0h-4m-4 0H8" />
                </svg>
                <span>Copy</span>
            </button>
        </div>

        <div id="copiedMessage" class="text-sm text-green-500 mt-4 hidden">
            Link copied to clipboard!
        </div>
    </div>

    <script>
        function copyLink() {
            const input = document.querySelector('input[type="text"]');
            navigator.clipboard.writeText(input.value).then(() => {
                const message = document.getElementById('copiedMessage');
                message.classList.remove('hidden');
                setTimeout(() => message.classList.add('hidden'), 3000);
            });
        }
    </script>
@endsection
