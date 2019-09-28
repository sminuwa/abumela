<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light navbar-full steal">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="{{ url('/') }}">
                <img src="{{asset('images/logo/materialize-logo.png')}}" alt="materialize logo"/>
                <span class="logo-text hide-on-med-and-down">@yield('app-title', "ABU Mela")</span>
            </a>
            <a class="navbar-toggler" href="#">
                <i class="material-icons">radio_button_checked</i>
            </a>
        </h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">

        <li class="bold">
            <a class="waves-effect waves-cyan " href="{{url('today-mail')}}">
                <i class="material-icons">settings_input_svideo</i>
                <span class="menu-title" data-i18n="">Today</span>
            </a>
        </li>
        <li class="bold">
            <a class="waves-effect waves-cyan " href="{{url('month-mail')}}">
                <i class="material-icons">mail</i>
                <span class="menu-title" data-i18n="">{{ date('F, Y') }}</span>
            </a>
        </li>


        <li class="active bold">
            <a class="collapsible-header waves-effect waves-cyan " href="#">
                <i class="material-icons">mail_outline</i>
                <span class="menu-title" data-i18n="">Mail</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a class="collapsible-body" href="{{route("mail.create")}}" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Create New</span></a>
                    </li>
                    <li><a class="collapsible-body" href="{{route('mail.in')}}" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Incoming</span></a>
                    </li>
                    <li><a class="collapsible-body" href="{{route('mail.out')}}" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Outgoing</span></a>
                    </li>
                    <li><a class="collapsible-body" href="{{route('mail.index')}}" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>All mails</span></a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="bold">
            <a class="waves-effect waves-cyan " href="{{ route('mail.print') }}">
                <i class="material-icons">chrome_reader_mode</i>
                <span class="menu-title" data-i18n="">Print Mails</span>
            </a>
        </li>

        {{--<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">pie_chart_outlined</i><span class="menu-title" data-i18n="">Reports</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a class="collapsible-body" href="charts-chartjs.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Incoming</span></a>
                    </li>
                    <li><a class="collapsible-body" href="charts-chartist.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Outgoing</span></a>
                    </li>
                    <li><a class="collapsible-body" href="charts-sparklines.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>General</span></a>
                    </li>
                </ul>
            </div>
        </li>--}}
        <li class="bold"><a class="waves-effect waves-cyan " href="javascript:;"><i class="material-icons">help_outline</i><span class="menu-title" data-i18n="">Help</span></a>
        </li>
    </ul>
    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
