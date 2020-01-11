<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Moltran - Responsive Admin Dashboard Template</title>

        <!-- Base Css Files -->
        <link href="{{asset('app-assets/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{asset('app-assets/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('app-assets/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('app-assets/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{asset('app-assets/css/animate.css')}}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{asset('app-assets/css/waves-effect.css')}}" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{asset('app-assets/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('app-assets/css/style.css')}}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{asset('app-assets/js/modernizr.min.js')}}"></script>
        
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> {{ __('Login') }} <strong>{{ __('Cibe') }}</strong> </h3>
                </div> 


                <div class="panel-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control input-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>
                    </div>                    

                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control input-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>                    

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-success">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox-signup">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-success btn-lg w-lg waves-effect waves-light" type="submit">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-7">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"><i class="fa fa-lock m-r-5"></i> 
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="col-sm-5 text-right">
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>

        
    	<script>
            var resizefunc = [];
        </script>
    	<script src="{{asset('app-assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('app-assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('app-assets/js/waves.js')}}"></script>
        <script src="{{asset('app-assets/js/wow.min.js')}}"></script>
        <script src="{{asset('app-assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('app-assets/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('assets/jquery-detectmobile/detect.js')}}"></script>
        <script src="{{asset('assets/fastclick/fastclick.js')}}"></script>
        <script src="{{asset('assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('assets/jquery-blockui/jquery.blockUI.js')}}"></script>


        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>
	
	</body>
</html>