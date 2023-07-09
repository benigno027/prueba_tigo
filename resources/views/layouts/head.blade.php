<head>
    @stack('head_start')
    <meta charset="UTF-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Benigno Moreno Ortega</title>
    
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('libs/core/core.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('libs/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/datatables.net-bs4/dataTables.bootstrap4.css') }}">

    
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/font-awesome/css/font-awesome.min.css') }}" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Solway&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Solway', serif;
        }
        .page-wrapper.full-page .page-content {
            min-height: 95vh;
            max-width: 100%;
        }
    </style>

    @stack('css')

    @stack('head_end')
</head>
