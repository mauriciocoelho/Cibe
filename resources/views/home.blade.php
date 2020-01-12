@extends('layouts.app')

@section('title', 'CibePorto | Home')

@section('content')
    
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->                      
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">{{ __('Seja Bem-vindo !') }}</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">{{ __('Cibe') }}</a></li>
                            <li class="active">{{ __('Início') }}</li>
                        </ol>
                    </div>
                </div>

                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-success"><i class="ion-social-usd"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">15852</span>
                                Total Sales
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Sales <span class="pull-right"></span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-info"><i class="ion-ios7-cart"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">956</span>
                                New Orders
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Orders <span class="pull-right"></span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-purple"><i class="ion-eye"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">20544</span>
                                Unique Visitors
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Visitors <span class="pull-right"></span></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-pink"><i class="ion-android-contacts"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{$totalIrmas}}</span>
                                {{ __('Total') }}
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">{{ __('Irmãs Ativas') }} <span class="pull-right"></span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- End row-->



                <div class="row">
                    <div class="col-lg-8">
                        <div class="portlet"><!-- /portlet heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    Website Stats
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#portlet1"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet1" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="website-stats" style="position: relative;height: 320px;"></div>
                                            <div class="row text-center m-t-30">
                                                <div class="col-sm-4">
                                                    <h4 class="counter">86,956</h4>
                                                    <small class="text-muted"> Weekly Report</small>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h4 class="counter">86,69</h4>
                                                    <small class="text-muted">Monthly Report</small>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h4 class="counter">948,16</h4>
                                                    <small class="text-muted">Yearly Report</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /Portlet -->
                    </div> <!-- end col -->

                    <div class="col-lg-4">
                        <div class="portlet"><!-- /portlet heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    CONGREGAÇÃO
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet2" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="pie-chart">
                                                <div id="pie-chart-container" class="flot-chart" style="height: 320px;">
                                                </div>
                                            </div>

                                            <div class="row text-center m-t-30">
                                                <div class="col-sm-6">
                                                    <h4 class="counter">86,956</h4>
                                                    <small class="text-muted"> Weekly Report</small>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h4 class="counter">86,69</h4>
                                                    <small class="text-muted">Monthly Report</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /Portlet -->
                    </div> <!-- end col -->
                </div> <!-- End row -->

            </div> <!-- container -->
                        
        </div> <!-- content -->

        <footer class="footer text-right">
            2020 © Cibe Porto Nacional.
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
