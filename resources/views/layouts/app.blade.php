<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App ui kit.">
  <meta name="keyword"
    content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">
  <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
  <title>@yield('title', 'Dashboard')</title>

  @include('partials.styles')
</head>

<body class="layout-1" data-luno="theme-blue" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

  @include('partials.sidebar')


  <div class="wrapper">

    @include('partials.header')

    @include('partials.toolbar')

    <!-- Page Content -->
    @yield('content')


    @include('partials.footer')

  </div>

  @include('partials.modals')

  @include('partials.scripts')


  <!-- General Modal  -->
  <div id="globalModal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="modalContent">
        <!-- Modal Content -->
      </div>
    </div>
  </div>

</body>

</html>