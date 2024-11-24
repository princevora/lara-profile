<div class="form-container bg-gray-900 bg-opacity-90 rounded-lg shadow-lg p-8 w-full max-w-md">
    <h1 class="text-3xl font-extrabold text-center text-blue-400 mb-6 m-2">Submit a Testimonial</h1>
    <p class="text-center text-gray-400 mb-8">
        Share your feedback or experience with <b>{{ $user->name }}</b> by filling out the form below.
    </p>

    <form method="POST" class="space-y-6 px-6 py-3">
        @csrf
        <!-- Client Name -->
        <div>
            <label for="client_name" class="block text-sm font-medium text-gray-300 mb-2">Client Name</label>
            <input wire:model='name' type="text" id="client_name" name="client_name" placeholder="Enter your name"
                class="w-full bg-gray-800 text-white border border-gray-700 rounded-lg py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300"
                required />
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description</label>
            <textarea wire:model='description' id="description" name="description" rows="4"
                placeholder="Write your feedback or experience here..."
                class="w-full bg-gray-800 text-white border border-gray-700 rounded-lg py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300"
                required></textarea>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg shadow-md transition-transform duration-300 transform hover:scale-105">
                Submit Testimonial
            </button>
        </div>
    </form>
</div>