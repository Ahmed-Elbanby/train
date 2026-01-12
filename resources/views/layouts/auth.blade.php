<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App ui kit.">
    <meta name="keyword"
        content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
    <title>@yield('title', 'Auth')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/luno-style.css') }}">
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
</head>

<body id="layout-1" data-luno="theme-blue">

    @yield('content')
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="./assets/js/theme.js"></script>
    
    
    
</body>

</html>