
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
        <x-navbar />

        @isset($header)
            <header class="bg-gray-100 border-b">
                <div class="max-w-7xl mx-auto py-4 px-6">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="max-w-5xl mx-auto p-6">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
