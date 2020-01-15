@extends('layouts.app')

@section('title', 'CibePorto | Lançamento Eventos')

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
                        <h4 class="pull-left page-title">{{ __('Lançamento Evento') }}</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                            <li><a href="{{route('eventos.index')}}">{{ __('Eventos') }}</a></li>
                            <li class="active">{{ __('Lançamento Evento') }}</li>
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
                                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalAdd" data-whateverid="{{$evento_id}}">
                                    <i class="fa fa-plus white"></i> {{ __('Novo') }}
                                </a>   
                                <span class="dropdown">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-warning dropdown-toggle dropdown-menu-right btn-sm">
                                        <i class="fa fa-cloud-download white"></i>
                                    </button>
                                    <ul aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-left">
                                        <li><a href="{{ route('evento.export') }}" class="dropdown-item"><i class="fa fa-file-excel-o"></i> {{ __('Excel') }}</a></li>
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
                                                        <th>{{ __('Irmã') }}</th>
                                                        <th>{{ __('Tipo') }}</th>
                                                        <th>{{ __('Status') }}</th>
                                                        <th>{{ __('Ação') }}</th>
                                                    </tr>
                                                </thead>
                                                @foreach ($registers as $register)                                                    
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$register->id}}</td>
                                                            
                                                            <td>{{$register->pessoa->name}}</td>
                                                            <td>{{ $register->tipo}}</td>
                                                            <td>{{ $register->status_evento}}</td>
                                                            <td>
                                                                @if($register->status_evento == 'á Pagar')
                                                                    <a data-tt="tooltip" data-placement="top" title="" href="#" data-original-title="Pagar" class="table-action-btn" data-toggle="modal" data-original-title="Pagar" data-target="#ModalPagar"
                                                                        data-whateverid="{{$register->id}}"
                                                                        data-whateverstatus_evento="{{$register->status_evento}}"><i class="ion-cash" style="color: green"></i>
                                                                    </a>
                                                                @endif
                                                                <a data-tt="tooltip" data-placement="top" title="" href="#" data-original-title="Excluir" class="table-action-btn" data-toggle="modal" title="Excluir" data-target="#ModalDelete"
                                                                    data-whateverid="{{$register->id}}"
                                                                    data-whateverbank="{{$register->name}}"><i class="ion-trash-a" style="color: #ED3237"></i>
                                                                </a>                                                              
                                                            </td>
                                                            @include('eventos.modal.pagar')
                                                            @include('eventos.modal.inativarLance')
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

    @include ('eventos.modal.createLance')
    @include ('eventos.modal.imprimir')

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

    <!-- SCRIPT MODAL PAGAR -->
    <script type="text/javascript">
        $('#ModalPagar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('whateverid')
            var status_evento = button.data('whateverstatus_evento')
            var modal = $(this)
            modal.find('#id-input').val(id)
            modal.find('#status_evento-input').val(status_evento)
        })
    </script>

    <!-- SCRIPT MODAL ADD -->
    <script type="text/javascript">
        $('#ModalAdd').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('whateverid')
            var modal = $(this)
            modal.find('#id-input').val(id)
        })
    </script>

    <!-- SCRIPT MODAL DELETE -->
    <script type="text/javascript">
        $('#ModalDelete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('whateverid')
            var modal = $(this)
            modal.find('#id-input').val(id)
        })
    </script>

	</body>
</html>

@endsection