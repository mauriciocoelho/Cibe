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
                    <div class="rounded text" style="text-align:center;">Pr° Presidente: Walter</div>             
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
            <strong>RELATÓRIO DE Á PAGAR</strong>
        </div>

        <div style="border: 0.1mm solid black;padding:0.5em">
            
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if ($apagars->count())
                            <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
                                <thead>
                                    <tr>
                                        <th width="30">{{ __('#') }}</th>
                                        <th width="300">{{ __('NOME COMPLETO') }}</th>
                                        <th width="80" style="text-align:center">{{ __('TIPO') }}</th>
                                        <th width="100" style="text-align:center">{{ __('STATUS') }}</th>
                                    </tr>
                                </thead>
                                @foreach ($apagars as $apagar)
                                    <tbody>   
                                        <tr>
                                            <td class="alt" width="30" >{{$apagar->id}}</td>
                                            <td class="alt" width="300" >{{$apagar->pessoa->name}}</td>
                                            <td class="alt" width="80" style="text-align:center">{{$apagar->tipo}}</td>
                                            <td class="alt" width="100" style="text-align:center">{{$apagar->status_evento}}</td>
                                        </tr>  
                                    </tbody>                                  
                                @endforeach
                                <tr>
                                    <td colspan="3" style="widtd: 100%; text-align: right;"><strong>Total de Irmãs.:</strong></td>
                                    <td ><strong>{{$countApagars}}</strong></td>
                                </tr>
                            </table>                                
                        @else
                            <h4><center>Não encontramos nenhum registro</center></h4><br><br><br>                                        
                        @endif
                    </div>
                </div>
            </div>    
        </div>
        <br style="clear:both;" />
        <span style="page-break-inside: auto;"></span>

    </body>
</html>