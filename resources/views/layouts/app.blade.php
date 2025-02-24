<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Collab Application')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
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
