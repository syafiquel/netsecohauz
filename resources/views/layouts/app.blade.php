<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" crossorigin="anonymous">

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Lib style -->
    @stack('lib_style')

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom CSS Style -->
    <style>
        /* override default bootstrap navbar position */
        .navbar {
            position: absolute;
        }
    </style>

</head>
<body>
    <div id="app">
        <main class="main-wrapper">
            <div class="navbar-bg"></div>

            <!-- Navbar -->
            <x-navbar></x-navbar>
            <!-- End navbar -->

            <!-- Sidenav -->
            <x-sidenav></x-sidenav>
            <!-- End sidenav -->

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                   {{ $header }}

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-header text-right">
                                        @if( isset($card_header) )
                                            {{ $card_header }}
                                        @endif
                                    </div>

                                    <div class="card-body">
                                        {{ $slot }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @if (isset($modal))
                    {{ $modal }}
                @endif
            </div>
            <!-- End Main Content -->

            <!-- Footer -->
            <x-footer></x-footer>
            <!-- End Footer -->
        </main>
        
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>



    <!-- JS Libraies -->
    @stack('lib_script')

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <!-- Livewire Scripts -->
    @livewireScripts

    @stack('page_script')

</body>
</html>
