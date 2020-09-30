 <!-- Navbar -->
@include('layouts.dashboard.navbar')


<!-- Main Sidebar Container -->
@include('layouts.dashboard.leftbar')

<!-- Content Wrapper. Contains page content -->
@include('layouts.dashboard.wrapperstart')

@yield('title')
@yield('table')
@yield('paginators')


<!-- End Content Wrapper and render footer and control bar -->
@include('layouts.dashboard.footer')
