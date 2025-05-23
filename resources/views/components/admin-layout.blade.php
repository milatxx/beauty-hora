
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-black">
    <div class="min-h-screen">

        @include('layouts.navigation')


        @isset($header)
            <header class="bg-gray-100 border-b">
                <div class="max-w-7xl mx-auto py-4 px-6 flex justify-between items-center">
                    <div>
                        {{ $header }}
                    </div>

                    <div class="flex space-x-6">
                        <a href="/admin/faq-categories" class="text-blue-600 px-4 hover:underline">FAQ Categories</a>
                        <a href="/admin/faqs" class="text-blue-600 px-4 hover:underline">FAQ</a>
                        <a href="/services" class="text-blue-600 px-4 hover:underline">Diensten</a>
                        <a href="/bookings/create" class="text-blue-600 px-4 hover:underline">Boek nu</a>
                        <a href="/admin/bookings" class="text-blue-600 px-4 hover:underline">Admin</a>
                    </div>
                </div>
            </header>

        @endisset

        <main class="max-w-5xl mx-auto p-6">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
