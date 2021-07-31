<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- GLOBAL MAINLY STYLES-->
        <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
        <!-- PLUGINS STYLES-->
        <link href="{{ asset('assets/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
        <!-- THEME STYLES-->
        <link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/customs.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendors/sweatalert/sweetalert2.min.css') }}" />

        @livewireStyles

    </head>
    <body class="fixed-navbar">
        <div class="page-wrapper">
            @include('admin.templates.header')
            @include('admin.templates.sidebar')
            <div class="content-wrapper">
                <!-- START PAGE CONTENT-->
                <div class="page-content fade-in-up">
                    {{-- @yield('content') --}}
                    <main>
                        {{ $slot }}
                    </main>
                </div>
                <!-- END PAGE CONTENT-->
                <footer class="page-footer">
                    <div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
                    <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a>
                    <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
                </footer>
            </div>
        </div>

        @stack('modals')
        @livewireScripts
        @stack('scripts')
        <!-- BEGIN PAGA BACKDROPS-->
        <div class="sidenav-backdrop backdrop"></div>
        <div class="preloader-backdrop">
            <div class="page-preloader">Loading</div>
        </div>
        <!-- END PAGA BACKDROPS-->
        <!-- CORE PLUGINS-->
        <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <!-- PAGE LEVEL PLUGINS-->
        <script src="{{ asset('assets/vendors/DataTables/datatables.min.js') }}" type="text/javascript"></script>
        <!-- CORE SCRIPTS-->
        <script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>
        <!-- PAGE LEVEL SCRIPTS-->
        <script src="{{ asset('assets/js/scripts/dashboard_1_demo.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/sweatalert/sweetalert.min.js') }}"></script>
        <script>
            $('#data-table').DataTable();
        </script>
        <script>
           window.addEventListener('swal:modal', event => { 
                swal({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type,
                });
            });
            
            window.addEventListener('swal:confirm', event => { 
                swal({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type,
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.livewire.emit('destroy', event.detail.id);
                    }
                });
            });
        </script>
    </body>
</html>
