<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Adepamni Adanfo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto px-4 md:px-0">

    <!-- Header -->
    <header class="py-6">
        <h1 class="text-3xl font-semibold text-center text-gray-800">Welcome to Adepamni Adanfo</h1>
    </header>

    <div class="grid md:grid-cols-2 gap-8 items-center mt-12">

        <!-- Left: Information about the app -->
        <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4">What Adepamni Adanfo Does</h2>
            <p class="text-gray-600 mb-4">Adepamni Adanfo is a free app tailored for Seamstress and Tailors. It simplifies the process of adding customer's information, their measurements, and allows for the upload of unique designs.</p>

            <h2 class="text-xl font-semibold text-gray-700 mt-6 mb-4">How to Use Adepamni Adanfo</h2>
            <p class="text-gray-600">Get started by registering an account. Once registered, you can add customer details, measurements, and upload designs with ease.</p>
        </div>

        <!-- Right: Sign In Box -->
        <div class="bg-white p-8 rounded shadow-md">
            <h2 class="text-xl font-semibold text-gray-700 mb-6">Sign In</h2>

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 p-2 w-full border rounded-md">
                </div>
                
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Login</button>
                </div>

                <div class="text-center">
                    <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:text-gray-800">Forgot your password?</a><br>
                    <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-gray-800 mt-2">New here? Register now!</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-16 text-center text-gray-600">
        Developed by TEAM JARSS - University of Ghana
    </footer>

</div>

</body>
</html>
