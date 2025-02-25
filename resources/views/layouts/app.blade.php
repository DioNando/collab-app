<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Collab Application')</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @yield('styles')

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800;
        }
    </style>
    {{-- blade-formatter-enable --}}
</head>

<body>
    <main class="container mx-auto max-w-lg p-4">
        <h1 class="text-blue-500 text-4xl font-bold mb-6">
            @yield('title')
        </h1>
        @yield('content')
    </main>
</body>

</html>
