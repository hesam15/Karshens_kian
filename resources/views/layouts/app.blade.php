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
            <main class="p-8">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{asset('/js/core/popper.min.js')}}"></script>
    <script src="{{asset('/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('/js/plugins/smooth-scrollbar.min.js')}}"></script>

    <!-- Dropdown Toggle Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const servicesButton = document.getElementById('servicesButton');
        const servicesMenu = document.getElementById('servicesMenu');
        const servicesIcon = document.getElementById('servicesIcon');
        
        // Check if we're on a services page
        const isServicesPage = ['add.options.form', 'show.options'].includes('{{ Route::currentRouteName() }}');
        
        // Set initial state if on services page
        if (isServicesPage) {
            servicesMenu.classList.remove('max-h-0');
            servicesMenu.classList.add('max-h-48');
            servicesIcon.style.transform = 'rotate(180deg)';
        }
        
        servicesButton.addEventListener('click', function() {
            if (servicesMenu.classList.contains('max-h-0')) {
                servicesMenu.classList.remove('max-h-0');
                servicesMenu.classList.add('max-h-48');
                servicesIcon.style.transform = 'rotate(180deg)';
            } else {
                servicesMenu.classList.remove('max-h-48');
                servicesMenu.classList.add('max-h-0');
                servicesIcon.style.transform = 'rotate(0deg)';
            }
        });
    });
  </script>
</body>
</html>