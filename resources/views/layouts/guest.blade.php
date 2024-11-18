<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-inter antialiased bg-slate-100 text-slate-600">

    <main class="bg-white">

        <!-- Content -->
        <div class="w-full">

            <div class="min-h-screen h-full">

                <!-- Header -->
                <div>
                    <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                        <!-- Logo -->

                    </div>
                </div>

                <div class="w-full max-w-3xl mx-auto px-4 py-8">
                    {{ $slot }}
                </div>

            </div>

        </div>

        </div>

    </main>
</body>

</html>