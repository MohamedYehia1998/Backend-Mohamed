 <!-- Navbar -->
@include('layouts.common.navbar')


<!-- Main Sidebar Container -->
@include('layouts.common.leftbar')

<!-- Content Wrapper. Contains page content -->
@include('layouts.common.wrapperstart')

@yield('title')
@yield('table')
@yield('paginators')


<!-- End Content Wrapper and render footer and control bar -->
@include('layouts.common.footer')
