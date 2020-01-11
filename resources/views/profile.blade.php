@extends('layouts.app')

@section('title', 'CibePorto | Perfil')

@section('content')


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->                      
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="app-content container center-layout mt-2">
                <div class="content-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                @if (Auth::user()->avatar  == '')
                                    <img src="{{asset('storage/users/user-default.png')}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                                @else
                                    <img src="{{asset('storage/users/'.Auth::user()->avatar )}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                                @endif
                                <h2>{{Auth::user()->name}}'s Profile</h2>
                                <form enctype="multipart/form-data" action="{{route('profile.update')}}" method="POST">
                                    <label>Atualizar imagem do perfil</label>
                                    <input type="file" name="avatar">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="pull-right btn btn-sm btn-success">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        
        </div> <!-- content -->

        <footer class="footer text-right">
            2015 © Moltran.
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
    
    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{asset('app-assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('app-assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('app-assets/js/waves.js')}}"></script>
    <script src="{{asset('app-assets/js/wow.min.js')}}"></script>
    <script src="{{asset('app-assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('app-assets/assets/chat/moment-2.2.1.js')}}"></script>
    <script src="{{asset('app-assets/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('app-assets/assets/jquery-detectmobile/detect.js')}}"></script>
    <script src="{{asset('app-assets/assets/fastclick/fastclick.js')}}"></script>
    <script src="{{asset('app-assets/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('app-assets/assets/jquery-blockui/jquery.blockUI.js')}}"></script>

    <!-- sweet alerts -->
    <script src="{{asset('app-assets/assets/sweet-alert/sweet-alert.min.js')}}"></script>
    <script src="{{asset('app-assets/assets/sweet-alert/sweet-alert.init.js')}}"></script>

    <!-- flot Chart -->
    <script src="{{asset('app-assets/assets/flot-chart/jquery.flot.js')}}"></script>
    <script src="{{asset('app-assets/assets/flot-chart/jquery.flot.time.js')}}"></script>
    <script src="{{asset('app-assets/assets/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('app-assets/assets/flot-chart/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('app-assets/assets/flot-chart/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('app-assets/assets/flot-chart/jquery.flot.selection.js')}}"></script>
    <script src="{{asset('app-assets/assets/flot-chart/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('app-assets/assets/flot-chart/jquery.flot.crosshair.js')}}"></script>

    <!-- Counter-up -->
    <script src="{{asset('app-assets/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
    
    <!-- CUSTOM JS -->
    <script src="{{asset('app-assets/js/jquery.app.js')}}"></script>

    <!-- Dashboard -->
    <script src="{{asset('app-assets/js/jquery.dashboard.js')}}"></script>

    <!-- Chat -->
    <script src="{{asset('app-assets/js/jquery.chat.js')}}"></script>

    <!-- Todo -->
    <script src="{{asset('app-assets/js/jquery.todo.js')}}"></script>

    <script type="text/javascript">
        /* ==============================================
        Counter Up
        =============================================== */
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
        });
    </script>

@endsection