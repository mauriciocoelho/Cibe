    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <div class="user-details">
                <div class="pull-left">
                    @if (Auth::user()->avatar  == '')
                        <img src="{{asset('app-assets/images/uploads/users/user-default.png')}}" alt="" class="thumb-md img-circle">
                    @else
                        <img src="{{asset('app-assets/images/uploads/users/'.Auth::user()->avatar )}}" alt="" class="thumb-md img-circle">
                    @endif
                </div>
                <div class="user-info">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }} 
                            <!--<span class="caret"></span>-->
                        </a>
                        <!--<ul class="dropdown-menu">
                            <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                            <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                            <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                            <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                        </ul>-->
                    </div>
                    
                    <p class="text-muted m-0">Administrator</p>
                </div>
            </div>
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{route('home')}}" class="waves-effect"><i class="md md-home"></i><span> {{ __('Start') }} </span></a>
                    </li>

                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="md md-content-paste"></i><span> {{ __('Entries') }} </span><span class="pull-right"><i class="md md-add"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{route('congregacoes.index')}}">{{ __('Congregations') }}</a></li>
                            <li><a href="{{route('irmas.index')}}">{{ __('Sisters') }}</a></li>
                            <!--<li><a href="{{route('usuarios.index')}}">{{ __('Users') }}</a></li>-->
                        </ul>
                    </li>

                    <li>
                        <a href="{{route('eventos.index')}}" class="waves-effect"><i class="md md-event"></i><span> {{ __('Events') }} </span></a>
                    </li>

                    <!--<li>
                        <a href="" class="waves-effect"><i class="md md-event"></i><span> {{ __('Calendário') }} </span></a>
                    </li>-->

                    <!--<li class="has_sub">
                        <a href="#" class="waves-effect"><i class="md md-description"></i> <span> {{ __('Relatórios') }} </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="panels.html">Panels</a></li>
                            <li><a href="checkbox-radio.html">Checkboxs-Radios</a></li>
                            <li><a href="tabs-accordions.html">Tabs &amp; Accordions</a></li>
                            <li><a href="modals.html">Modals</a></li>
                            <li><a href="bootstrap-ui.html">BS Elements</a></li>
                            <li><a href="progressbars.html">Progress Bars</a></li>
                            <li><a href="notification.html">Notification</a></li>
                            <li><a href="sweet-alert.html">Sweet-Alert</a></li>
                        </ul>
                    </li> -->

                    <!--<li>
                        <a href="" class="waves-effect"><i class="md md-settings"></i><span> {{ __('Settings') }} </span></a>
                    </li>-->

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Left Sidebar End --> 