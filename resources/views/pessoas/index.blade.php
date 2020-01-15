@extends('layouts.app')

@section('title', 'CibePorto | Irmãs')

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
                            <h4 class="pull-left page-title">{{ __('Sisters') }}</h4>
                            <ol class="breadcrumb pull-right">
                                <li><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                                <li class="active">{{ __('Sisters') }}</li>
                            </ol>
                        </div>
                    </div>

                    @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}  
                        </div><br />
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <form action="/irmas" method="get" role="search">
                                        <div class="col-md-8">                                       
                                            <input class="form-control" placeholder="Buscar por Nome..." name="search" style="width: 100%">
                                        </div>
                                    </form>
                                    <a href="{{route('irmas.create')}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-plus white"></i> {{ __('New') }}
                                    </a>
                                    <span class="dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-warning dropdown-toggle dropdown-menu-right btn-sm">
                                            <i class="fa fa-cloud-download white"></i>
                                        </button>
                                        <ul aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-left">
                                            <li><a href="{{ route('irmas.export') }}" class="dropdown-item"><i class="fa fa-file-excel-o"></i> {{ __('Excel') }}</a></li>
                                            <li><a href="#" class="table-action-btn" data-toggle="modal" title="Imprimir" data-target="#ModalPrint"><i class="fa fa-file-pdf-o"> {{ __('PDF') }}</i></a>                       
                                        </ul>
                                    </span>                                    
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            @if ($registers->count())
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('#') }}</th>
                                                            <th>{{ __('Name Complete') }}</th>
                                                            <th>{{ __('Mobile') }}</th>
                                                            <th>{{ __('Congregation') }}</th>
                                                            <th>{{ __('Action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($registers as $register)                                                    
                                                        <tbody>
                                                            <tr>
                                                                <td>{{$register->id}}</td>
                                                                <td>{{$register->name}}</td>
                                                                <td>{{$register->celular}}</td>
                                                                <td>{{$register->congregacao->name}}</td>
                                                                <td>
                                                                    <a data-tt="tooltip" data-placement="top" title="" href="{{route('irmas.editar', $register->id)}}" data-original-title="Editar" class="table-action-btn"><i class="ion-edit"></i></a>
                                                                    <a data-tt="tooltip" data-placement="top" title="" href="#" data-original-title="Excluir" class="table-action-btn" data-toggle="modal" title="Excluir" data-target="#ModalDelete"
                                                                        data-whateverid="{{$register->id}}"
                                                                        data-whatevername="{{$register->name}}"><i class="ion-trash-a" style="color: #ED3237"></i>
                                                                    </a>      
                                                                    <a data-tt="tooltip" data-placement="top" title="" href="{{route('cadastroirmas.pdf', $register->id)}}" data-original-title="Imprimir" class="table-action-btn"><i class="ion-android-printer" style="color: gray"></i></a>                                                          
                                                                </td>
                                                                @include('pessoas.modal.delete')
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
                                                </table>
                                                <div class="table-pagination pull-right">
                                                    <div class="col-md-12">
                                                        {{ $registers->links('layouts.includes.pagination', ['pagination' => $registers]) }}
                                                    </div>
                                                </div>
                                            @else
                                                <h4><center>Não encontramos nenhum registro</center></h4><br><br><br>                                        
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div> <!-- End Row -->


                </div> <!-- container -->
                                
            </div> <!-- content -->

            <footer class="footer text-right">
                2020 © Cibe Porto Nacional.
            </footer>

        </div>

        @include ('pessoas.modal.print')

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
        <script src="{{asset('app-assets/assets/jquery-detectmobile/detect.js')}}"></script>
        <script src="{{asset('app-assets/assets/fastclick/fastclick.js')}}"></script>
        <script src="{{asset('app-assets/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('app-assets/assets/jquery-blockui/jquery.blockUI.js')}}"></script>


        <!-- CUSTOM JS -->
        <script src="{{asset('app-assets/js/jquery.app.js')}}"></script>

        <script src="{{asset('app-assets/assets/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('app-assets/assets/datatables/dataTables.bootstrap.js')}}"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>

        <!-- SCRIPT TITLE -->
        <script>
            $("[data-tt=tooltip]").tooltip();
        </script>

        <!-- SCRIPT MODAL DELETE -->
        <script type="text/javascript">
            $('#ModalDelete').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var id = button.data('whateverid')
                var name = button.data('whatevername')
                var modal = $(this)
                modal.find('#id-input').val(id)
                modal.find('#name-input').val(name)
            })
        </script>

	</body>
</html>

@endsection