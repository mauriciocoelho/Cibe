<html>
    <head>
        <style type="text/css">
            table { vertical-align: top; }
            tr    { vertical-align: top; }
            td    { vertical-align: top; }
            .negrito {
                font-weight: bold;
            }
            .midnight-blue{
                background:#2c3e50;
                padding: 4px 4px 4px;
                color:white;
                font-weight:bold;
                font-size:12px;
            }
            .silver{
                background:white;
                padding: 3px 4px 3px;
            }
            .clouds{
                background:#ecf0f1;
                padding: 3px 4px 3px;
            }
            .border-top{
                border-top: solid 1px #bdc3c7;
                
            }
            .border-left{
                border-left: solid 1px #bdc3c7;
            }
            .border-right{
                border-right: solid 1px #bdc3c7;
            }
            .border-bottom{
                border-bottom: solid 1px #bdc3c7;
            }
            table.page_footer {
                width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;
            }

            .aligncenter {
                display: block;
                margin-left: auto;
                margin-right: auto;
                padding: 3px;
                text-align: center;
                background-color: #ffffff;
                border: 1px solid #dbdbdb;
            }
            .alignleft{
            float: left;
            margin: 1px 4px 0 0;
            padding: 3px;
            background-color: #ffffff;
            border: 1px solid #dbdbdb;
            }
            .alignright{
            float: right;
            margin: 1px 0 0 4px;
            padding: 3px;
            background-color: #ffffff;
            border: 1px solid #dbdbdb;
            }
            .alignnone{
            margin: 1px 4px 0 0;
            padding: 3px;
            background-color: #ffffff;
            border: 1px solid #dbdbdb;
            }

        </style>
    </head>
    <body>
        

        <!--<div style="border:0.1mm solid ; padding:1em; width:  100%; ">
            <div class="rounded text">
                CIBE PORTO NACIONAL - TO
            </div>
            <div class="text"><h3></h3></div>
            <div class="negrito">Período Letivo: </div>
            <div class="negrito">Curso: </div>
            <div class="negrito">Aluno: </div>
            <div class="negrito">Disciplinas: </div>
        </div>-->
        <!-- Cabeçalho -->
        <table cellspacing="0" style="width: 100%;">
            <tr> 
                <!--<div style="border:0.1mm solid ; padding:1em; width:  100%;">         -->                
                    <div class="rounded text" style="text-align:center;">Secrétária : </div>  
                    <div class="rounded text" style="text-align:center;">Lider: Wilma Rodrigues Medrade Dias</div>      
                    <div class="rounded text" style="text-align:center;">Pr° Presidente: Walter Luiz</div>             
                    <div class="rounded text" style="text-align:center;">
                        <b>CIBE PORTO NACIONAL - TO</b>
                    </div>
                    <div> 
                        <img src="images/cibe.png" width="85" height="85" align="left">
                    </div>
                    <!--<p><img src="images/cibe.png" width="85" height="85" align="left"><br>
                        CIBE PORTO NACIONAL - TO<br>
                    </p>-->
                <!--</div>-->
                <br>			
            </tr>
        </table>
            
        <br style="clear: both;"/>
        <div>
            <div>
                <div style="text-align: center;">
                    <strong></strong><br>
                </div>
            </div>
        </div>
                    

        <div style="border: 0.1mm solid black;padding:0.5em; background-color: rgba(211, 211, 211, 1.0); text-align:center;">
            <strong>{{ __('FICHA CADASTRAL') }}</strong>
        </div>

        <div style="border: 0.1mm solid black;padding:0.5em">
            
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    @foreach($registers as $register)
                        <div class="col-sm-12">
                            <div class="panel panel-default">                                
                                <div class="panel-body">                                        
                                    <div class="row">
                                        <div class="form-group col-md-2">                                            
                                            @if($register->avatar == '')
                                                <img src="app-assets/images/uploads/users/user-default.png" width="150" height="150" align="left" class="alignleft" alt=""/>
                                            @else
                                                <img src="{{ public_path('app-assets/images/uploads/pessoas/'.$register->avatar)}}" width="150" height="150" align="left" class="alignleft" alt=""/> 
                                            @endif                                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Nome Completo:') }}</label>
                                            <b>{{$register->name}}</b>                                           
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>{{ __('CPF:') }}</label>
                                            <b>{{$register->cpf}}</b> 
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>{{ __('RG:') }}</label>
                                            <b>{{$register->rg}}</b> 
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>{{ __('Data de Nascimento:') }}</label>
                                            <b>{{ date("d/m/Y", strtotime($register->data_nascimento)) }}</b> 
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>{{ __('Logradouro:') }}</label>
                                            <b>{{$register->logradouro}}</b>
                                        </div>                                        
                                        <div class="form-group col-md-2">
                                            <label>{{ __('Bairro:') }}</label>
                                            <b>{{$register->bairro}}</b>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>{{ __('Cidade:') }}</label>
                                            <b>{{$register->cidade}}</b>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>{{ __('CEP:') }}</label>
                                            <b>{{$register->cep}}</b>
                                        </div>
                                        <br>
                                        <div class="form-group col-md-1">
                                            <label>{{ __('UF:') }}</label>
                                            <b>{{$register->uf}}</b>
                                        </div>
                                    </div>
                
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>{{ __('Fone:') }}</label>
                                            
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>{{ __('Celular:') }}</label>
                                            <b>{{$register->celular}}</b> 
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>{{ __('Email:') }}</label>
                                            
                                        </div>
                                    </div>
                
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>{{ __('Matrícula:') }}</label>
                                            
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>{{ __('Congregação:') }}</label>
                                            <b>{{$register->congregacao->name}}</b>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>{{ __('Situação:') }}</label>
                                            <b>{{$register->situacao}}</b>
                                        </div>
                                    </div>  
                            
                                    
                                </div>

                                
                                                                
                                
                            </div> <!-- panel panel-default -->
                        </div> <!-- col-sm-12 -->
                    @endforeach
                    </div>
                </div>
            </div>    
        </div>
        <br style="clear:both;" />
        <span style="page-break-inside: auto;"></span>

    </body>
</html>