<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{asset("/img/favicon.png")}}">
    <title>@yield('title')</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{asset('/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{asset('/css/persian-datepicker.min.css')}}">
    <script src="{{asset('/js/persian-date.min.js')}}"></script>
    <script src="{{asset('/js/persian-datepicker.min.js')}}"></script>
    
    
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
	        font-family: 'Vazirmatn';
        }
    </style>
</head>
    <body class="@if(Route::currentRouteName() !== "register" || Route::currentRouteName() !== "login")
        g-sidenav-show
        @endif
        bg-gray-200 rtl row">
        @include('layouts.aside' , ['status'=>'compelete'])
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg col-10 container-fluid px-4">
            @include('layouts.navigation')
            <div class="py-4">
                @yield("content")
            </div>
        </main>

    <!-- JS -->
    <script src="{{asset('/js/core/popper.min.js')}}"></script>
    <script src="{{asset('/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="
    @if(Route::currentRouteName() !== "register" || Route::currentRouteName() !== "login")
    {{asset('/js/dashboard.js')}}
    @else
    {{asset('/js/logAregister.js')}}
    @endif
    ">  
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->

    <script src="{{asset('/js/style.js')}}"></script>
    </body>
</html>
