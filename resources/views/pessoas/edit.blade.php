@extends('layouts.app')

@section('title', 'CibePorto | Editar Irmã')

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
                            <h4 class="pull-left page-title">{{ __('Editar Irmã') }}</h4>
                            <ol class="breadcrumb pull-right">
                                <li><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                                <li><a href="{{route('irmas.index')}}">{{ __('Irmãs') }}</a></li>
                                <li class="active">{{ __('Editar Irmã') }}</li>
                            </ol>
                        </div>
                    </div>
                    @foreach($registers as $register)
                        <form action="{{route('irmas.edit', $register->id)}}" method="post" enctype="multipart/form-data">
                            @csrf                         
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">{{ __('Dados Cadastrais') }}</h3></div>
                                    <div class="panel-body">                                        
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label>{{ __('Foto') }}</label>
                                                @if($register->avatar == '')
                                                    <img src="{{asset('app-assets/images/user-default.png')}}" alt="image" class="img-responsive">
                                                @else
                                                    <img src="{{asset('storage/pessoas/'.$register->avatar)}}" alt="image" class="img-responsive">
                                                @endif    
                                                <input type="file" name="avatar">                                 
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>{{ __('Nome Completo') }}</label>
                                                <input type="text" class="form-control" name="name" value="{{$register->name}}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>{{ __('CPF') }}</label>
                                                <input type="text" class="form-control" name="cpf" value="{{$register->cpf}}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>{{ __('RG') }}</label>
                                                <input type="text" class="form-control" name="rg" value="{{$register->rg}}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>{{ __('Data de Nascimento') }}</label>
                                                <input type="date" class="form-control" name="data_nascimento" value="{{$register->data_nascimento}}">
                                            </div>
                                        </div>
        
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>{{ __('Logradouro') }}</label>
                                                <input type="text" class="form-control" name="logradouro" value="{{$register->logradouro}}">
                                            </div>                                        
                                            <div class="form-group col-md-2">
                                                <label>{{ __('Bairro') }}</label>
                                                <input type="text" class="form-control" name="bairro" value="{{$register->bairro}}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>{{ __('Cidade') }}</label>
                                                <input type="text" class="form-control" name="cidade" value="{{$register->cidade}}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>{{ __('CEP') }}</label>
                                                <input type="text" class="form-control" name="cep" value="{{$register->cep}}">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label>{{ __('UF') }}</label>
                                                <select class="form-control select2" name="uf" style="width: 100%;">
                                                    <option>AC</option>
                                                    <option>AL</option>
                                                    <option>AP</option>
                                                    <option>AM</option>
                                                    <option>BA</option>
                                                    <option>CE</option>
                                                    <option>DF</option>
                                                    <option>ES</option>
                                                    <option>GO</option>
                                                    <option>MA</option>
                                                    <option>MT</option>
                                                    <option>MS</option>
                                                    <option>MG</option>
                                                    <option>PA</option>
                                                    <option>PB</option>
                                                    <option>PR</option>
                                                    <option>PE</option>
                                                    <option>PI</option>
                                                    <option>RJ</option>
                                                    <option>RN</option>
                                                    <option>RS</option>
                                                    <option>RO</option>
                                                    <option>RR</option>
                                                    <option>SC</option>
                                                    <option>SP</option>
                                                    <option>SE</option>
                                                    <option selected>TO</option>
                                                </select>
                                            </div>
                                        </div>
                    
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>{{ __('Fone') }}</label>
                                                <input type="text" class="form-control" name="fone" value="{{$register->fone}}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>{{ __('Celular') }}</label>
                                                <input type="text" class="form-control" name="celular" value="{{$register->celular}}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>{{ __('Email') }}</label>
                                                <input type="text" class="form-control" name="email" value="{{$register->email}}">
                                            </div>
                                        </div>
                    
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>{{ __('Matrícula') }}</label>
                                                <input type="text" class="form-control" name="matricula" value="{{$register->matricula}}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>{{ __('Congregação') }}</label>
                                                <select class="form-control" name="congregacao_id">
                                                    
                                                    @foreach($congregacoes as $congregacao)
                                                        <option value="{{ $congregacao->id }}">{{ $congregacao->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>{{ __('Situação') }}</label>
                                                <select class="form-control select2" name="situacao" style="width: 100%;">
                                                    <option value="{{$register->situacao}}">{{$register->situacao}}</option>
                                                    <option value="Membro">Membro</option>
                                                    <option value="Diaconiza">Diaconiza</option>
                                                    <option value="Missionária">Missionária</option>
                                                </select>
                                            </div>
                                        </div>  
                                
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="{{route('irmas.index')}}"><input type="button" value="Voltar" class="btn btn-default"></a>
                                                <button type="submit" class="btn btn-warning" id="add-row">Editar</button>
                                            </div>
                                        </div>
                                    </div>               
                                    
                                </div> <!-- panel panel-default -->
                            </div> <!-- col-sm-12 -->                           
                        </form>
                    @endforeach
                </div> <!-- container -->
                                
            </div> <!-- content -->

            <footer class="footer text-right">
                2020 © Cibe Porto Nacional.
            </footer>

        </div>

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

	</body>
</html>

@endsection