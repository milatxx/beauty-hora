
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
    @auth
        @if(Auth::user()->is_admin)
            <a href="/admin/faq-categories" class="text-blue-600 px-4 hover:underline">FAQ Categories</a>
            <a href="/admin/faqs" class="text-blue-600 px-4 hover:underline">FAQ</a>
            <a href="/admin/services" class="text-blue-600 px-4 hover:underline">Diensten</a>
            <a href="/admin/bookings" class="text-blue-600 px-4 hover:underline">Admin</a>
        @endif
    @endauth
</div>

                </div>
            </header>

        @endisset

        <main class="max-w-5xl mx-auto p-6">
            {{ $slot }}
        </main>
    </div>
</body>
<footer class="bg-white border-t mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col sm:flex-row items-center justify-between text-gray-600 text-sm">
        <div class="mb-4 sm:mb-0">
            &copy; {{ date('Y') }} Beauty Hora. All rights reserved.
        </div>
        <div class="flex space-x-6">
            <a href="{{ route('faq.index') }}" class="hover:text-blue-600 transition">FAQ</a>
            <a href="{{ route('contact.create') }}" class="hover:text-blue-600 transition">Contact</a>
            <a href="{{ route('news.index') }}" class="hover:text-blue-600 transition">Nieuws</a>
        </div>
    </div>
</footer>

</html>
