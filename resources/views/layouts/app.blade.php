<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SMS Monitoring') }}</title>

    <!-- Styles -->
    <link rel="shortcut icon" type="image/png" href="/img/icon/logo.png"/>
    <!-- Styles -->
    <link href="/css/font-awesome.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" type="text/css" media="all" href="/css/jquery.dataTables.min.css" /> --}}
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/jquery-ui.min.css" rel="stylesheet">
    <link href="/css/vendor.css" rel="stylesheet">

    <script src="/js/app.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    {{-- <script src="/js/jquery.dataTables.min.js"></script> --}}
    <script src="/js/jquery.priceformat.min.js"></script>
    <script src="/js/spin.min.js"></script>
    <script src="/js/jquery-1.12.4.min.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body id="body">
    @include('includes.header')
    @yield('content')
    @include('includes.footer')

    <script src="/js/vendor.js"></script>

</body>
</html>
