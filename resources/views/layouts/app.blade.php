<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')

    <body class="hold-transition skin-green-light sidebar-mini fixed">
        @stack('body_start')

        <!-- Site wrapper -->
        <div class="main-wrapper">
            
            <div class="page-wrapper full-page">

                <div class="page-content">
                    @yield('content')
                </div>

                @include('layouts.footer')

            </div>

        </div>

        <!-- Core Javascript -->
        <script src="{{ asset('libs/core/core.js') }}"></script>

        <!-- Plugins Javascript -->
        <script src="{{ asset('libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('libs/loading-overlay/loadingoverlay.min.js')}}"></script>
        <script src="{{ asset('libs/datatables.net/jquery.dataTables.js')}}"></script>
        <script src="{{ asset('libs/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
        <script src="{{ asset('libs/jquery-ui/jquery-ui.min.js') }}"></script>

        @include('layouts.scripts')

        @stack('js')

        @stack('scripts')

        @stack('body_end')

    </body>

</html>