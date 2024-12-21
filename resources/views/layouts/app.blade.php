<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{asset("js/style.js")}}"></script>

    <!-- jQuery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Date Picker -->
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@latest/dist/css/persian-datepicker.css">
    <script src="https://unpkg.com/persian-date@latest/dist/persian-date.js"></script>
    <script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.js"></script>
</head>
<body class="font-sans antialiased">
    <div class="flex min-h-screen bg-gray">
        <!-- Sidebar -->
        <div class="w-52 fixed top-0 right-0 h-screen bg-white border-l border-gray-200 shadow-sm">
            @include('layouts.aside')
        </div>

        <!-- Main Content -->
        <div class="flex-1 mr-52">
            <!-- Top Navigation -->
            <nav class="sticky top-0 z-40 bg-white shadow-sm">
                @include('layouts.navigation')
            </nav>
            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </div>
    
    <script src="{{asset("js/datepicker.js")}}"></script>
</body>
</html>