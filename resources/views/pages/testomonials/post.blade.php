<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonial Form</title>

    <!-- Import Tailwind -->
    @vite('resources/css/app.css')
    <style>
        body {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            background-size: 400% 400%;
            animation: gradient-animation 10s infinite ease-in-out;
        }

        @keyframes gradient-animation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .form-container {
            animation: fadeInUp 1s ease-in-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center text-white">
    <div class="form-container bg-gray-900 bg-opacity-90 rounded-lg shadow-lg p-8 w-full max-w-md">
        <h1 class="text-3xl font-extrabold text-center text-blue-400 mb-6 m-2">Submit a Testimonial</h1>
        <p class="text-center text-gray-400 mb-8">
            Share your feedback or experience by filling out the form below.
        </p>

        <form method="POST" class="space-y-6 p-5">
            @csrf
            <!-- Client Name -->
            <div>
                <label for="client_name" class="block text-sm font-medium text-gray-300 mb-2">Client Name</label>
                <input type="text" id="client_name" name="client_name" placeholder="Enter your name"
                    class="w-full bg-gray-800 text-white border border-gray-700 rounded-lg py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300"
                    required />
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                <textarea id="description" name="description" rows="4"
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
</body>

</html>
