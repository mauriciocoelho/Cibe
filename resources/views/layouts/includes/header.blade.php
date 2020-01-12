    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="" class="logo"><i class="md md-terrain"></i> <span>{{ __('Cibe') }} </span></a>
            </div>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="">
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left">
                            <i class="fa fa-bars"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>
                    <!--<form class="navbar-form pull-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control search-bar" name="search" placeholder="Buscar por Início, Irmãs ou Eventos...">
                        </div>
                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                    </form>-->

                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="dropdown hidden-xs">
                            <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg">
                                <li class="text-center notifi-title">{{ __('Notificações') }}</li>
                                <li class="list-group">
                                    <!-- list item-->
                                    @foreach ($aniversarios as $aniversario)
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left">
                                            <em class="fa fa-birthday-cake fa-1x text-danger"></em>
                                            </div>
                                            <div class="media-body clearfix">
                                            <div class="media-heading">{{ __('Aniversário') }}</div>                                            
                                                <p class="m-0">
                                                    <small><b>{{$aniversario->name}}</b> faz aniversário esse mês</small>
                                                </p>                                            
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                    <!-- list item-->                                                                          
                                    @foreach ($logs as $log)      
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left">
                                                <em class="fa fa-bell-o fa-1x text-warning"></em>
                                                </div>
                                                <div class="media-body clearfix">
                                                <div class="media-heading">{{$log->acao}}</div>
                                                <p class="m-0">
                                                    <small>{{$log->usuario->name}}
                                                        {{$log->descricao}}
                                                    </small>
                                                </p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                    <!-- last list item -->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <small>{{ __('Ver todas as notificações') }}</small>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="hidden-xs">
                            <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                                @if (Auth::user()->avatar  == '')
                                    <img src="{{asset('storage/users/user-default.png')}}" alt="user-img" class="img-circle">
                                @else
                                    <img src="{{asset('storage/users/'.Auth::user()->avatar )}}" alt="user-img" class="img-circle">
                                @endif
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('profile.index')}}"><i class="md md-face-unlock"></i> {{ __('Perfil') }}</a></li>
                                <!--<li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>-->
                                <li><a href="" data-toggle="modal" data-target="#ModalSair"><i class="md md-settings-power"></i> {{ __('Sair') }}</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End --> 
    @include('layouts.modal.sair')