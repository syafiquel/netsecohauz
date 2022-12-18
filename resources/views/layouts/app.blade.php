<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->
        <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Theme Styles -->
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- top nav bar -->
            @include('components.navbar')

            <!-- strat wrapper -->
            <div class="h-screen flex flex-row flex-wrap">
                @include('components.sidenav')

                <!-- strat content -->
                <div class="bg-gray-100 flex-1 p-6 md:mt-16"> 
                    <!-- Page Content -->
                    {{ $slot }}
                </div>
                <!-- end content -->

            <!-- end wrapper --> 
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        <!-- script -->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <!-- end script -->
    </body>
</html>
