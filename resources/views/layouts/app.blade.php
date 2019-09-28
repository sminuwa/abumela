<!-- END: Head-->

@guest
    @include('auth.login')
@else

    @include('inc.head')


    <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-menu-nav-dark 2-columns  "
          data-open="click" data-menu="vertical-menu-nav-dark" data-col="2-columns">



    <!-- BEGIN: Header-->
    @include('inc.top-navbar')
    <!-- END: Header-->

    <!-- BEGIN: SideNav-->
    @include('inc.left-sidebar')
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
        @yield('main-section', 'Welcome to ABU Mela <small>Version 1.0</small>')
    </div>
    <!-- END: Page Main-->

    <!-- Theme Customizer -->
    @include('inc.mail-modal')
    <!--/ Theme Customizer -->

    <!-- BEGIN: Footer-->
    @include('inc.footer-note')

    @include('inc.script')



@endguest


