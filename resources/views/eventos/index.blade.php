@extends('layouts.app')

@section('title', 'CibePorto | Eventos')

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
                        <h4 class="pull-left page-title">{{ __('Eventos') }}</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                            <li class="active">{{ __('Eventos') }}</li>
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
                                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalAdd">
                                    <i class="fa fa-plus white"></i> {{ __('Novo') }}
                                </a>   
                                <!--<span class="dropdown">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-warning dropdown-toggle dropdown-menu-right btn-sm">
                                        <i class="fa fa-cloud-download white"></i>
                                    </button>
                                    <ul aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-left">
                                        <li><a href="#" class="dropdown-item"><i class="fa fa-file-excel-o"></i> {{ __('Excel') }}</a></li>
                                        <li><a href="#" class="dropdown-item"><i class="fa fa-file-pdf-o"></i> {{ __('PDF') }}</a></li>
                                    </ul>
                                </span>-->
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        @if ($registers->count())
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('#') }}</th>
                                                        <th>{{ __('Evento') }}</th>
                                                        <th>{{ __('Local') }}</th>
                                                        <th>{{ __('Data') }}</th>
                                                        <th>{{ __('Ação') }}</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                @foreach ($registers as $register)                                                    
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$register->id}}</td>
                                                            <td>{{$register->name}}</td>
                                                            <td>{{$register->local}}</td>
                                                            <td>{{ date("d/m/Y", strtotime($register->data_evento)) }}</td>
                                                            <td>
                                                                <a data-tt="tooltip" data-placement="top" title="" href="#" data-original-title="Editar" class="table-action-btn" data-toggle="modal" data-original-title="Editar" data-target="#ModalEdit"
                                                                    data-whateverid="{{$register->id}}"
                                                                    data-whatevername="{{$register->name}}"
                                                                    data-whateverlocal="{{$register->local}}"
                                                                    data-whateverdata_evento="{{$register->data_evento}}"><i class="ion-edit"></i>
                                                                </a>
                                                                <a data-tt="tooltip" data-placement="top" title="" href="#" data-original-title="Excluir" class="table-action-btn" data-toggle="modal" title="Excluir" data-target="#ModalDelete"
                                                                    data-whateverid="{{$register->id}}"
                                                                    data-whateverbank="{{$register->name}}"><i class="ion-trash-a" style="color: #ED3237"></i>
                                                                </a>                                                              
                                                            </td>
                                                            <td>
                                                                <a data-tt="tooltip" data-placement="top" title="" href="{{route('eventos.show', $register->id)}}" data-original-title="Visualizar" class="table-action-btn"><i class="ion-eye" style="color: gray"></i></a>                                                           
                                                            </td>
                                                            @include('eventos.modal.edit')
                                                            @include('eventos.modal.inativar')
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
            2015 © Moltran.
        </footer>

    </div> <!-- content-page -->

    @include ('eventos.modal.create');

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

    <!-- SCRIPT MODAL EDIT -->
    <script type="text/javascript">
        $('#ModalEdit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id= button.data('whateverid')
            var name = button.data('whatevername')
            var local = button.data('whateverlocal')
            var data_evento = button.data('whateverdata_evento')
            var modal = $(this)
            modal.find('#id-input').val(id)
            modal.find('#name-input').val(name)
            modal.find('#local-input').val(local)
            modal.find('#data_evento-input').val(data_evento)
        })
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