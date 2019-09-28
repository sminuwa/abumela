<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark teal">
            <div class="nav-wrapper">
                <div class="header-search-wrapper hide-on-med-and-down"><i class="material-icons">search</i>
                    <form action="{{route('mail.search')}}" method="post">
                        @csrf
                        <input class="header-search-input z-depth-2" type="text" name="msearch" placeholder="Search Mails">
                    </form>
                </div>
                <ul class="navbar-list right">
                    <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
                    <li class="hide-on-large-only"><a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i class="material-icons">search</i></a></li>
                    <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none{{--<small class="notification-badge">5</small>--}}</i></a></li>
                    <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="{{asset('images/avatar/avatar-7.png')}}" alt="avatar"><i></i></span></a></li>
                    {{--<li><a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right"><i class="material-icons">format_indent_increase</i></a></li>--}}
                </ul>

                <!-- notifications-dropdown-->
                <ul class="dropdown-content" id="notifications-dropdown">

                    <li>
                        <h7>Notification is empty</h7>
                    </li>
                    <li class="divider"></li>

                </ul>
                <!-- profile-dropdown-->
                <ul class="dropdown-content" id="profile-dropdown">
                    <li><a class="grey-text text-darken-1" href="{{asset('#')}}"><i class="material-icons">person_outline</i> {{ Auth::user()->fullname }}</a></li>
                    <li><a class="grey-text text-darken-1" href="{{asset('#')}}"><i class="material-icons">help_outline</i> Help</a></li>
                    <li class="divider"></li>
                    <li>
                        <a class="grey-text text-darken-1" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">keyboard_tab</i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <nav class="display-none search-sm">
                <div class="nav-wrapper">
                    <form>
                        <div class="input-field">
                            <input class="search-box-sm" type="search" required="">
                            <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>
                        </div>
                    </form>
                </div>
            </nav>
        </nav>
    </div>
</header>
