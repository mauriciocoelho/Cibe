@extends('layouts.app')

@section('title', 'CibePorto | Configurações')

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
                            <h4 class="pull-left page-title">{{ __('Settings') }}</h4>
                            <ol class="breadcrumb pull-right">
                                <li><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                                <li class="active">{{ __('Settings') }}</li>
                            </ol>
                        </div>
                    </div>

                    @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}  
                        </div><br />
                    @endif

                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="geral" aria-expanded="true" title="Geral">
                                        <span class="visible-xs"><i class="fa fa-home"></i></span>
                                        <span class="hidden-xs">{{ __('General') }}</span>
                                    </a>
                                </li>
                                <!--<li class="">
                                    <a href="estrategias" aria-expanded="false" title="Estratégias">
                                        <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                                        <span class="hidden-xs">Estratégias</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="competicoes" aria-expanded="false" title="Competições">
                                        <span class="visible-xs"><i class="fa fa-trophy"></i></span>
                                        <span class="hidden-xs">Competições</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="bankrolls" aria-expanded="false" title="Competições">
                                        <span class="visible-xs"><i class="fa fa-trophy"></i></span>
                                        <span class="hidden-xs">Bancas</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="conta" aria-expanded="false" title="Conta">
                                        <span class="visible-xs"><i class="fa fa-user"></i></span>
                                        <span class="hidden-xs">Conta</span>
                                    </a>
                                </li>-->
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="geral">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h3 class="panel-title">{{ __('Definições de Cargo') }} <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="" data-content="Preencha os campos abaixo para definir valores padrão que serão preenchidos automaticamente sempre que você estiver inserindo novas apostas." class="fa fa-question-circle hidden-xs" data-original-title="Definições do Cargo"></a></h3>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <form method="POST" action="" accept-charset="UTF-8">
                                                <input name="_token" type="hidden">
                                                @foreach($registers as $register)
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">{{ __('Pr. Presidente') }}</label>                                                           
                                                                <input type="text" class="form-control" name="" value="{{$register->name}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">{{ __('Lider de Senhoras') }}</label>                                                           
                                                                <input type="text" class="form-control" name="" value="{{$register->lider_senhoras}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">{{ __('1° Secretária') }}</label>                                                           
                                                                <input type="text" class="form-control" name="" value="{{$register->primeira_secretaria}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">{{ __('1° Tesoureira') }}</label>                                                           
                                                                <input type="text" class="form-control" name="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <input class="btn btn-warning" type="submit" value="Editar">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="estrategias">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
                                            <h3 class="panel-title">Estratégias</h3>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 text-right">
                                            <button class="btn btn-success" data-toggle="modal" data-target="#strat_modal">Criar Nova</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <label for="sport_strat" class="control-label">Esporte:</label>
                                            <select class="form-control" id="sport_strat" name="sport_strat"><option value="1">Futebol</option><option value="2">Ténis</option><option value="4">Futebol Americano</option><option value="5">Corridas de cavalos</option><option value="6">Basquetebol</option><option value="7">Andebol</option><option value="8">Golfe</option><option value="9">Críquete</option><option value="10">Rugby Union</option><option value="11">Boxe</option><option value="12">Desportos Motorizados</option><option value="13">Hóquei no Gelo</option><option value="14">Apostas Especiais</option><option value="15">Desportos de Inverno</option><option value="16">Ciclismo</option><option value="17">Xadrez</option><option value="18">Rugby League</option><option value="19">E-Sports</option><option value="20">Corridas de galgos</option><option value="21">Política</option><option value="22">Mercados Financeiros</option><option value="23">Voleibol</option><option value="24">Bowls</option><option value="25">Regras Internacionais</option><option value="26">Mixed Martial Arts</option><option value="27">Dardos</option><option value="28">Bilhar</option><option value="29">Jogos Gaélicos</option><option value="30">Snooker</option><option value="31">Current Affairs</option><option value="32">Póquer</option><option value="33">Beisebol</option><option value="34">Olimpíadas 2016</option><option value="39">Futsal</option><option value="40">Badmington</option><option value="44">Futebol de Areia</option></select>
                                            <hr>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-xs-12 col-md-4">
                                            <center id="strat_loading" style="display: none">
                                                <img src="/assets/dashboard/img/loading.gif" alt="">
                                            </center>
                                            <div id="list_strat" class="list-group">
                                                                                        <a class="list-group-item" data-id="377444">
                                                        Estratégia exemplo - Futebol
                                                    </a>
                                                                                        <a class="list-group-item" data-id="381366">
                                                        Ove 0.5
                                                    </a>
                                                                                        <a class="list-group-item" data-id="448324">
                                                        1X
                                                    </a>
                                                                                        <a class="list-group-item" data-id="463933">
                                                        X2
                                                    </a>
                                                                                        <a class="list-group-item" data-id="472042">
                                                        Ambas Marcam
                                                    </a>
                                                                                        <a class="list-group-item" data-id="475295">
                                                        Baliza Inviolada
                                                    </a>
                                                                                        <a class="list-group-item" data-id="619199">
                                                        Próximo Gol
                                                    </a>
                                                                                        <a class="list-group-item" data-id="623333">
                                                        Varias
                                                    </a>
                                                                                        <a class="list-group-item" data-id="625340">
                                                        Tripla
                                                    </a>
                                                                                        <a class="list-group-item" data-id="625341">
                                                        Dupla
                                                    </a>
                                                                                        <a class="list-group-item" data-id="1355845">
                                                        DNB
                                                    </a>
                                                                                        <a class="list-group-item" data-id="1355846">
                                                        DNB
                                                    </a>
                                                                                </div> <!-- list-group -->
                                        </div> <!-- col -->
                                        <div class="col-xs-12 col-md-8">
                                            <div class="tab-content">
                                                <div id="strat_form_div">
                                                    <form method="POST" action="https://www.staketoys.com/pt/dashboard/configs" accept-charset="UTF-8" id="form_strat"><input name="_token" type="hidden" value="Is9heWaOGnVH7D4Gm1k3RqFSPSshBXPlqmFZjbyP">
                                                        <input name="id" type="hidden">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="name" class="control-label">Nome</label>
                                                                    <input type="text" class="form-control" name="name" required="required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="sport" class="control-label">Esporte</label>
                                                                    <select class="form-control" required="required" id="sport" name="sport"><option value="1">Futebol</option><option value="2">Ténis</option><option value="4">Futebol Americano</option><option value="5">Corridas de cavalos</option><option value="6">Basquetebol</option><option value="7">Andebol</option><option value="8">Golfe</option><option value="9">Críquete</option><option value="10">Rugby Union</option><option value="11">Boxe</option><option value="12">Desportos Motorizados</option><option value="13">Hóquei no Gelo</option><option value="14">Apostas Especiais</option><option value="15">Desportos de Inverno</option><option value="16">Ciclismo</option><option value="17">Xadrez</option><option value="18">Rugby League</option><option value="19">E-Sports</option><option value="20">Corridas de galgos</option><option value="21">Política</option><option value="22">Mercados Financeiros</option><option value="23">Voleibol</option><option value="24">Bowls</option><option value="25">Regras Internacionais</option><option value="26">Mixed Martial Arts</option><option value="27">Dardos</option><option value="28">Bilhar</option><option value="29">Jogos Gaélicos</option><option value="30">Snooker</option><option value="31">Current Affairs</option><option value="32">Póquer</option><option value="33">Beisebol</option><option value="34">Olimpíadas 2016</option><option value="39">Futsal</option><option value="40">Badmington</option><option value="44">Futebol de Areia</option></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description" class="control-label">Descrição</label>
                                                            <textarea name="description" id="description" placeholder="Descrição da estratégoa" rows="3" class="form-control" required="required"></textarea>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <input class="btn btn-primary" type="submit" value="Salvar">
                                                                <a class="btn btn-link text-danger pull-right" id="remove_strat" href="#">Excluir essa estratégia</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="competicoes">

                                    
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
                                            <h3 class="panel-title">Competições</h3>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 text-right">
                                            <button class="btn btn-success" data-toggle="modal" data-target="#comp_modal">Criar Nova</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <label for="sport_comp" class="control-label">Esporte:</label>
                                            <select class="form-control" id="sport_comp" name="sport_comp"><option value="1">Futebol</option><option value="2">Ténis</option><option value="4">Futebol Americano</option><option value="5">Corridas de cavalos</option><option value="6">Basquetebol</option><option value="7">Andebol</option><option value="8">Golfe</option><option value="9">Críquete</option><option value="10">Rugby Union</option><option value="11">Boxe</option><option value="12">Desportos Motorizados</option><option value="13">Hóquei no Gelo</option><option value="14">Apostas Especiais</option><option value="15">Desportos de Inverno</option><option value="16">Ciclismo</option><option value="17">Xadrez</option><option value="18">Rugby League</option><option value="19">E-Sports</option><option value="20">Corridas de galgos</option><option value="21">Política</option><option value="22">Mercados Financeiros</option><option value="23">Voleibol</option><option value="24">Bowls</option><option value="25">Regras Internacionais</option><option value="26">Mixed Martial Arts</option><option value="27">Dardos</option><option value="28">Bilhar</option><option value="29">Jogos Gaélicos</option><option value="30">Snooker</option><option value="31">Current Affairs</option><option value="32">Póquer</option><option value="33">Beisebol</option><option value="34">Olimpíadas 2016</option><option value="39">Futsal</option><option value="40">Badmington</option><option value="44">Futebol de Areia</option></select>
                                            <hr>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-xs-12 col-md-4">
                                            <center id="comp_loading" style="display: none">
                                                <img src="/assets/dashboard/img/loading.gif" alt="">
                                            </center>
                                            <div id="list_comp" class="list-group">
                                                                                        <a class="list-group-item" data-id="125264">
                                                        Bundesliga
                                                    </a>
                                                                                        <a class="list-group-item" data-id="125267">
                                                        Campeonato Brasileiro
                                                    </a>
                                                                                        <a class="list-group-item" data-id="155665">
                                                        Campeonato Paulista
                                                    </a>
                                                                                        <a class="list-group-item" data-id="125269">
                                                        Champions League
                                                    </a>
                                                                                        <a class="list-group-item" data-id="125297">
                                                        Copa do Brasil
                                                    </a>
                                                                                        <a class="list-group-item" data-id="152124">
                                                        Copa do Rey
                                                    </a>
                                                                                        <a class="list-group-item" data-id="202050">
                                                        Copa Libertadores da América
                                                    </a>
                                                                                        <a class="list-group-item" data-id="152123">
                                                        Copa São Paulo Futebol Junior
                                                    </a>
                                                                                        <a class="list-group-item" data-id="125294">
                                                        Copa Sul-Americana
                                                    </a>
                                                                                        <a class="list-group-item" data-id="155662">
                                                        Eerste Divisie
                                                    </a>
                                                                                        <a class="list-group-item" data-id="125270">
                                                        Europa League
                                                    </a>
                                                                                        <a class="list-group-item" data-id="466778">
                                                        K League 2
                                                    </a>
                                                                                        <a class="list-group-item" data-id="125266">
                                                        La Liga
                                                    </a>
                                                                                        <a class="list-group-item" data-id="467008">
                                                        La Liga2
                                                    </a>
                                                                                        <a class="list-group-item" data-id="126749">
                                                        Liga NOS
                                                    </a>
                                                                                        <a class="list-group-item" data-id="125268">
                                                        Ligue 1
                                                    </a>
                                                                                        <a class="list-group-item" data-id="141866">
                                                        NFL
                                                    </a>
                                                                                        <a class="list-group-item" data-id="125265">
                                                        Premier League
                                                    </a>
                                                                                        <a class="list-group-item" data-id="468054">
                                                        Premier League - Dinamarca
                                                    </a>
                                                                                        <a class="list-group-item" data-id="145703">
                                                        Seria A 
                                                    </a>
                                                                                        <a class="list-group-item" data-id="427824">
                                                        Serie B
                                                    </a>
                                                                                        <a class="list-group-item" data-id="427826">
                                                        Serie B
                                                    </a>
                                                                                        <a class="list-group-item" data-id="467629">
                                                        Superliga Kosovo
                                                    </a>
                                                                                        <a class="list-group-item" data-id="203942">
                                                        Variadas
                                                    </a>
                                                                                </div>
                                        </div>
                                        <div class="col-xs-12 col-md-8">
                                            <div class="tab-content">
                                                <div id="comp_form_div">
                                                    <form method="POST" action="https://www.staketoys.com/pt/dashboard/configs" accept-charset="UTF-8" id="form_comp"><input name="_token" type="hidden" value="Is9heWaOGnVH7D4Gm1k3RqFSPSshBXPlqmFZjbyP">
                                                        <input name="id" type="hidden">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="name" class="control-label">Nome</label>
                                                                    <input type="text" class="form-control" name="name" value="" required="required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="fk_sport" class="control-label">Esporte</label>
                                                                    <select class="form-control" required="required" id="fk_sport" name="fk_sport"><option value="1">Futebol</option><option value="2">Ténis</option><option value="4">Futebol Americano</option><option value="5">Corridas de cavalos</option><option value="6">Basquetebol</option><option value="7">Andebol</option><option value="8">Golfe</option><option value="9">Críquete</option><option value="10">Rugby Union</option><option value="11">Boxe</option><option value="12">Desportos Motorizados</option><option value="13">Hóquei no Gelo</option><option value="14">Apostas Especiais</option><option value="15">Desportos de Inverno</option><option value="16">Ciclismo</option><option value="17">Xadrez</option><option value="18">Rugby League</option><option value="19">E-Sports</option><option value="20">Corridas de galgos</option><option value="21">Política</option><option value="22">Mercados Financeiros</option><option value="23">Voleibol</option><option value="24">Bowls</option><option value="25">Regras Internacionais</option><option value="26">Mixed Martial Arts</option><option value="27">Dardos</option><option value="28">Bilhar</option><option value="29">Jogos Gaélicos</option><option value="30">Snooker</option><option value="31">Current Affairs</option><option value="32">Póquer</option><option value="33">Beisebol</option><option value="34">Olimpíadas 2016</option><option value="39">Futsal</option><option value="40">Badmington</option><option value="44">Futebol de Areia</option></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-md-6">
                                                                <input class="btn btn-primary" type="submit" value="Salvar">
                                                                <a class="btn btn-link text-danger pull-right" id="remove_comp" href="#">Excluir essa competição</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6">
                                                            <hr>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#transf_comp_modal" id="transf_comp_btn">Transfer Competition</button>
                                                            </div>
                                                            <div id="transf_comp_modal" class="modal fade">
                                                                <div class="modal-dialog modal-sm">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                            <h4 class="modal-title">Transfer Competition</h4>
                                                                        </div>
                                                                        <form method="POST" action="https://www.staketoys.com/pt/dashboard/meuperfil/migrate-user-competition" accept-charset="UTF-8"><input name="_token" type="hidden" value="Is9heWaOGnVH7D4Gm1k3RqFSPSshBXPlqmFZjbyP">
                                                                            <input type="hidden" class="form-control" name="fk_user_competition" value="" required="required" id="fk_user_competition">
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label for="fk_competition" class="control-label">Select Competition</label>
                                                                                    <select class="form-control" required="required" id="fk_competition" name="fk_competition"><option value="102">1. Deild</option><option value="951">1. Deild Women</option><option value="93">1. Division</option><option value="90">1. HNL</option><option value="207">1. Lig</option><option value="861">1. Lig U21</option><option value="159">1. Liga</option><option value="144">1. Lyga</option><option value="191">1. SNL</option><option value="748">1.Liga Classic</option><option value="749">1.Liga Promotion</option><option value="626">1st Division</option><option value="888">1st Division</option><option value="915">1st Division Play-offs</option><option value="816">1st National Women</option><option value="37">2. Bundesliga</option><option value="64">2. Bundesliga Play-offs</option><option value="125">2. Deild</option><option value="863">2. Divisioin - Play-offs</option><option value="301">2. Division</option><option value="94">2. Division</option><option value="490">2. Division</option><option value="435">2. Division Group 1</option><option value="436">2. Division Group 2</option><option value="437">2. Division Group 3</option><option value="438">2. Division Group East</option><option value="439">2. Division Group West</option><option value="497">2. Division: Centro</option><option value="491">2. Division: Group 2</option><option value="492">2. Division: Group 3</option><option value="493">2. Division: Group 4</option><option value="500">2. Division: Group A</option><option value="501">2. Division: Group B</option><option value="502">2. Division: Group C</option><option value="503">2. Division: Group D</option><option value="504">2. Division: Group E</option><option value="505">2. Division: Group F</option><option value="506">2. Division: Group G</option><option value="507">2. Division: Group H</option><option value="498">2. Division: Norte</option><option value="499">2. Division: Sul</option><option value="91">2. HNL</option><option value="553">2. Lig: Beyaz</option><option value="554">2. Lig: Kirmizi</option><option value="555">2. Lig: Playoff</option><option value="187">2. Liga</option><option value="494">2. Liga East</option><option value="97">2. Liga FNL</option><option value="495">2. Liga West</option><option value="189">2. Liga: East</option><option value="188">2. Liga: West</option><option value="192">2. SNL</option><option value="627">2nd Division</option><option value="934">3. Deild</option><option value="806">3. Division</option><option value="427">3. Division</option><option value="422">3. HNL - East</option><option value="424">3. HNL - Sjever</option><option value="423">3. HNL - South</option><option value="425">3. HNL - Sredite</option><option value="426">3. HNL - West</option><option value="418">3. League Northeast</option><option value="419">3. League Northwest</option><option value="420">3. League Southeast</option><option value="421">3. League Southwest</option><option value="920">3. Lig Play-offs</option><option value="556">3. Lig: Group 1</option><option value="557">3. Lig: Group 2</option><option value="558">3. Lig: Group 3</option><option value="38">3. Liga</option><option value="519">3. Liga - Bratislava</option><option value="520">3. Liga - Center</option><option value="521">3. Liga - East</option><option value="522">3. Liga - West</option><option value="428">3. Liga CFL</option><option value="429">3. Liga MSFL</option><option value="514">3. Liga; Series 6</option><option value="509">3. Liga: Series 1</option><option value="510">3. Liga: Series 2</option><option value="511">3. Liga: Series 3</option><option value="512">3. Liga: Series 4</option><option value="513">3. Liga: Series 5</option><option value="817">3f Ligaen Women</option><option value="933">4. Deild</option><option value="430">4. Liga Division A</option><option value="431">4. Liga Division B</option><option value="432">4. Liga Division C</option><option value="434">4. Liga Division D</option><option value="433">4. Liga Division E</option><option value="613">A Division</option><option value="143">A Lyga</option><option value="624">A-League</option><option value="559">Acreano</option><option value="374">AFC Challenge Cup</option><option value="363">AFC Champions League</option><option value="697">Afc Championship U19</option><option value="661">Afc Championship U23</option><option value="364">AFC Cup</option><option value="987">AFC U19 Women's Championship</option><option value="791">Aff Championship U19</option><option value="376">AFF Suzuki Cup</option><option value="389">Africa Cup of Nations</option><option value="390">Africa Cup of Nations Qualifications</option><option value="765">Africa Cup Of Nations U20</option><option value="992">Africa U23 Cup of Nations</option><option value="814">African Championship Women</option><option value="375">African Nations Championship</option><option value="560">Alagoano</option><option value="629">Albanian Cup</option><option value="746">Algarve Cup Women</option><option value="641">Algeria Cup</option><option value="840">Algeria Youth League</option><option value="197">Allsvenskan</option><option value="989">Allsvenskan Play-offs</option><option value="595">Amapaense</option><option value="561">Amazonense</option><option value="797">Arab Club Championship</option><option value="323">Arabian Gulf Cup</option><option value="848">Arena Cup</option><option value="368">Armenian Cup</option><option value="377">Asian Cup</option><option value="378">Asian Cup Qualification</option><option value="856">Asian Cup Women</option><option value="803">Asian Games</option><option value="692">Atlantic Cup</option><option value="663">Audi Cup</option><option value="71">Austrian Cup</option><option value="302">Azadegan League</option><option value="304">Azadegan League: Group A</option><option value="305">Azadegan League: Group B</option><option value="73">Azerbaidjan Cup</option><option value="87">B PFG</option><option value="846">Bahrain Cup</option><option value="562">Baiano 1</option><option value="563">Baiano 2</option><option value="781">Baltic Cup</option><option value="780">Baltic Cup U21</option><option value="807">Bangabandhu Gold Cup</option><option value="783">Belarusian Cup</option><option value="80">Belgian Cup</option><option value="81">Belgium Playoffs</option><option value="401">Belgium Playoffs 2/3</option><option value="74">Birinci Dasta</option><option value="83">Bosnia Cup</option><option value="290">Botola 2</option><option value="289">Botola Pro</option><option value="652">Brasileiro U20</option><option value="873">Brasileiro Women</option><option value="564">Brasiliense</option><option value="648">Brisbane Premier League</option><option value="937">Brisbane Reserves Premier League</option><option value="89">Bulgarian Cup</option><option value="36">Bundesliga</option><option value="63">Bundesliga Play-offs</option><option value="977">Bundesliga Women</option><option value="608">C-League</option><option value="379">CAF Champions League</option><option value="380">CAF Confederations Cup</option><option value="743">Caf Super Cup</option><option value="678">Calcutta Premier Division A</option><option value="615">Campionato</option><option value="329">Canadian Soccer League</option><option value="649">Capital Territory</option><option value="566">Capixaba</option><option value="11">Carabao Cup</option><option value="381">Caribean Cup</option><option value="567">Carioca 1</option><option value="568">Carioca 1 - Taca Rio</option><option value="569">Carioca 2</option><option value="872">Carioca U20</option><option value="859">Carolina Challenge Cup</option><option value="570">Catarinense 1</option><option value="927">Catarinense 2</option><option value="571">Cearense 1</option><option value="572">Cearense 2</option><option value="955">CECAFA Club Cup</option><option value="382">CECAFA Senior Challenge Cup</option><option value="660">Cee Cup</option><option value="794">Central American &amp; Caribbean Games</option><option value="702">Central Youth League</option><option value="449">CFA Group A</option><option value="450">CFA Group B</option><option value="451">CFA Group C</option><option value="452">CFA Group D</option><option value="730">Cfu Club Championship</option><option value="181">Challenge Cup</option><option value="204">Challenge League</option><option value="961">Champion of Champions</option><option value="787">Championnat National</option><option value="327">Championnat National</option><option value="1">Champions League</option><option value="681">Champions League Women</option><option value="4">Championship</option><option value="647">Championship</option><option value="154">Championship</option><option value="175">Championship</option><option value="182">Championship Play-Offs</option><option value="941">Championship Women</option><option value="280">Champoinnat D1</option><option value="229">Chilean Cup</option><option value="758">China Cup</option><option value="373">Club Friendlies</option><option value="943">Club Friendlies Women</option><option value="9">Community Shield</option><option value="383">CONCACAF Champions League</option><option value="733">Concacaf Championship U17</option><option value="734">Concacaf Championship U20</option><option value="732">Concacaf Championship Women U20</option><option value="384">CONCACAF Gold Cup</option><option value="731">Concacaf League</option><option value="978">CONCACAF Nations League</option><option value="979">CONCACAF Nations League Qualification</option><option value="385">Confederations Cup</option><option value="386">Copa America</option><option value="855">Copa America Women</option><option value="220">Copa Argentina</option><option value="947">Copa Bicentenario</option><option value="387">Copa Centroamericana</option><option value="233">Copa Colombia</option><option value="898">Copa de la Superliga</option><option value="909">Copa de la Superliga Reserves</option><option value="196">Copa Del Rey</option><option value="224">Copa do Brasil</option><option value="763">Copa Do Brasil U20</option><option value="565">Copa do Nordeste</option><option value="754">Copa Federacion</option><option value="394">Copa Libertadores</option><option value="738">Copa Libertadores U20</option><option value="252">Copa MX</option><option value="963">Copa Paraguay</option><option value="982">Copa Paulista</option><option value="938">Copa Rio</option><option value="388">Copa Sudamericana</option><option value="799">Copa Venezuela</option><option value="653">Copa Verde</option><option value="138">Coppa Italia</option><option value="706">Coppa Italia Serie C</option><option value="980">Coppa Italia Serie D</option><option value="864">Coppa Italia Women</option><option value="646">Cosafa Cup</option><option value="834">COSAFA U20 Championship</option><option value="665">Cotif Tournament</option><option value="111">Coupe de France</option><option value="112">Coupe de la Ligue</option><option value="688">Coupe Du Trone</option><option value="92">Croatia Cup</option><option value="319">Crown Prince Cup</option><option value="115">Crystalbet Erovnuli Liga</option><option value="361">Cup</option><option value="216">Cymru Alliance</option><option value="95">Cyprus Cup</option><option value="98">Czech Cup</option><option value="701">Czech Cup Women</option><option value="96">Czech Liga</option><option value="957">Czech-Slovak Super Cup</option><option value="198">Damallsvenskan</option><option value="829">David Kipiani Cup</option><option value="440">Denmark Series Group 1</option><option value="441">Denmark Series Group 2</option><option value="442">Denmark Series Group 3</option><option value="443">Denmark Series Group 4</option><option value="370">Derde Divisie: Zaterdag</option><option value="369">Derde Divisie: Zondag</option><option value="45">DFB Pokal</option><option value="820">Dfb Pokal Women</option><option value="311">Division 1</option><option value="317">Division 1</option><option value="322">Division 1</option><option value="255">Division 1</option><option value="819">Division 1 Women</option><option value="256">Division 1: Clausura</option><option value="201">Division 1: North</option><option value="202">Division 1: South</option><option value="547">Division 2: Norra Gotaland</option><option value="548">Division 2: Norra Svealand</option><option value="549">Division 2: Norrland</option><option value="550">Division 2: Ostra Gotaland</option><option value="875">Division 2: Play-offs</option><option value="551">Division 2: Sodra Svealand</option><option value="552">Division 2: Vastra Gotaland</option><option value="402">Division 3: ACFF</option><option value="403">Division 3: Group A</option><option value="404">Division 3: Group B</option><option value="866">Division 3: Play-offs</option><option value="150">Division A</option><option value="283">Division d'Honneur</option><option value="604">Division de Honor</option><option value="257">Division Intermedia</option><option value="391">EAFF East Asian Cup</option><option value="31">Eerste Divisie</option><option value="16">EFL Trophy</option><option value="674">Egypt Cup</option><option value="158">Ekstraklasa</option><option value="693">Ekstraliga Women</option><option value="690">Elite League U20</option><option value="275">Elite One</option><option value="155">Eliteserien</option><option value="996">Eliteserien Play-offs</option><option value="796">Elitettan Women</option><option value="662">Emirates Cup</option><option value="344">Emperor Cup</option><option value="30">Eredivisie</option><option value="621">Eredivisie Playoffs</option><option value="34">Eredivisie Women</option><option value="114">Erovnuli Liga 2</option><option value="70">Erste Liga</option><option value="105">Esiliiga</option><option value="642">Estonian Cup</option><option value="596">Euro Qualification</option><option value="622">Euro U17</option><option value="808">Euro U17 Women</option><option value="623">Euro U19</option><option value="684">Euro U19 Women</option><option value="677">Euro U19 Women - 5th-6th Places</option><option value="673">Euro U19 Women Play Offs</option><option value="598">Euro U21</option><option value="656">Euro Women</option><option value="2">Europa League</option><option value="597">European Championship</option><option value="770">FA Cup</option><option value="777">FA Cup</option><option value="10">FA Cup</option><option value="333">FA Cup</option><option value="349">FA Cup</option><option value="358">FA Cup</option><option value="757">FA Cup Women</option><option value="12">Fa Trophy</option><option value="694">Fa Trophy</option><option value="130">FAI Cup</option><option value="788">Faroe Islands Cup</option><option value="975">FAW Championship</option><option value="664">Ffa Cup</option><option value="108">Finland Cup</option><option value="680">First Amateur Division</option><option value="76">First Division</option><option value="336">First Division</option><option value="100">First Division</option><option value="129">First Division</option><option value="140">First Division</option><option value="148">First Division</option><option value="79">First Division B</option><option value="68">First League</option><option value="145">First League</option><option value="151">First League</option><option value="700">First League Women</option><option value="84">First League: FBiH</option><option value="86">First League: RS</option><option value="142">First Liga</option><option value="843">Florida Cup</option><option value="170">FNL</option><option value="736">FNL Cup</option><option value="795">Football League</option><option value="117">Football League</option><option value="186">Fortuna Liga</option><option value="907">Fortuna Liga Play-offs</option><option value="724">Fotbolti.Net Cup Cup A</option><option value="845">Fotbolti.Net Cup Cup B</option><option value="362">Friendly International</option><option value="810">Friendly International U18</option><option value="809">Friendly International U19</option><option value="890">Friendly International U20</option><option value="826">Friendly International U21</option><option value="891">Friendly International U22</option><option value="892">Friendly International U23</option><option value="631">Friendly International Women</option><option value="871">Gamma Ethnik: Play-offs</option><option value="461">Gamma Ethniki Group 1</option><option value="464">Gamma Ethniki Group 2</option><option value="463">Gamma Ethniki Group 3</option><option value="462">Gamma Ethniki Group 4</option><option value="465">Gamma Ethniki Group 5</option><option value="869">Gamma Ethniki Group 6</option><option value="466">Gamma Ethniki Group 7</option><option value="870">Gamma Ethniki Group 8</option><option value="573">Gaucho 1</option><option value="574">Gaucho 2</option><option value="884">GFA League</option><option value="775">Gibraltar Cup</option><option value="274">Girabola</option><option value="707">Gladafrica Championship</option><option value="575">Goiano 1</option><option value="118">Greek Cup</option><option value="392">Gulf Cup of Nations</option><option value="687">Hazfi Cup</option><option value="756">Hero Super Cup</option><option value="120">Hungarian Cup</option><option value="338">I-League</option><option value="126">Iceland Cup</option><option value="337">Indian Super League</option><option value="124">Inkasso-Deildin</option><option value="948">Intercontinental Cup</option><option value="393">International Champions Cup</option><option value="745">International Tournament (Cyprus) Women</option><option value="306">Iraqi League</option><option value="307">Iraqi League: North</option><option value="308">Iraqi League: South</option><option value="698">Irish League Cup</option><option value="953">Izhevsk Pre-Season Tournament</option><option value="324">J-League</option><option value="635">J.League Cup / Copa Sudamericana Championship</option><option value="342">J2-League</option><option value="343">J3-League</option><option value="959">Japan Football League</option><option value="721">Jihocesky Kp</option><option value="714">Jihomoravsky Kp</option><option value="981">Junior U19</option><option value="682">Junioren Bundesliga</option><option value="630">K League 2</option><option value="346">K-League Classic</option><option value="348">K3 League Advanced</option><option value="444">Kakkonen</option><option value="445">Kakkonen-LohkoB</option><option value="446">Kakkonen-LohkoC</option><option value="447">Kakkonen-LohkoD</option><option value="759">Kazakhstan Cup</option><option value="930">King's Cup</option><option value="318">Kings Cup</option><option value="33">KNVB Beker</option><option value="966">Kolmonen</option><option value="741">Kosovar Cup</option><option value="717">Kralovehradecky Kp</option><option value="194">La Liga</option><option value="195">La Liga 2</option><option value="935">Landesliga</option><option value="101">Landspokal Cup</option><option value="655">Latvian Cup</option><option value="628">League 2 Group B</option><option value="350">League Cup</option><option value="127">League Cup</option><option value="131">League Cup</option><option value="903">League Cup</option><option value="164">League Cup</option><option value="177">League Cup</option><option value="696">League Cup</option><option value="836">League Cup Women</option><option value="5">League One</option><option value="332">League One</option><option value="179">League One</option><option value="183">League One Play-Offs</option><option value="6">League Two</option><option value="180">League Two</option><option value="478">Lega Pro 2: Girone A</option><option value="479">Lega Pro 2: Girone B</option><option value="480">Lega Pro 2: Girone C</option><option value="887">Leinster Senior Cup</option><option value="718">Liberecky Kp</option><option value="841">Lig Bet</option><option value="341">Liga 1</option><option value="165">Liga 1</option><option value="985">Liga 1 Women</option><option value="340">Liga 2</option><option value="876">Liga 2</option><option value="167">Liga 2: Seria 2</option><option value="166">Liga 2: Serie 1</option><option value="828">Liga 3</option><option value="253">Liga Ascenso</option><option value="235">Liga de Ascenso</option><option value="371">Liga De Futbol Prof</option><option value="133">Liga Leumit</option><option value="610">Liga Mayor</option><option value="251">Liga MX</option><option value="823">Liga Mx Women</option><option value="239">Liga Nacional</option><option value="249">Liga Nacional</option><option value="236">Liga Pro</option><option value="842">Liga Revelacao U23</option><option value="132">Ligat ha'Al</option><option value="297">Ligi kuu Bara</option><option value="272">Ligue 1</option><option value="278">Ligue 1</option><option value="792">Ligue 1</option><option value="284">Ligue 1</option><option value="294">Ligue 1</option><option value="320">Ligue 1</option><option value="109">Ligue 1</option><option value="913">Ligue 1 Play-offs</option><option value="273">Ligue 2</option><option value="110">Ligue 2</option><option value="914">Ligue 2 Play-offs</option><option value="612">Ligue Haïtienne</option><option value="802">Liiga Women</option><option value="789">Lithuanian Cup</option><option value="614">LPF</option><option value="729">Lpf</option><option value="751">Macedonian Cup</option><option value="263">Major League Soccer</option><option value="659">Malaysia Cup</option><option value="771">Male League</option><option value="576">Maranhense</option><option value="577">Matogrossense</option><option value="772">Mauritian League</option><option value="784">Mediterranean Games</option><option value="103">Meistaradeildin</option><option value="104">Meistriliiga</option><option value="122">Merkantil Bank Liga</option><option value="578">Mineiro 1</option><option value="579">Mineiro 2</option><option value="925">Mineiro U20</option><option value="728">Mobile Mini Sun Cup</option><option value="801">Mocambola</option><option value="956">Moldovan Cup</option><option value="712">Moravskoslezsky Kp</option><option value="675">Mtn 8 Cup</option><option value="911">Nadeshiko League 1</option><option value="960">Nadeshiko League 2</option><option value="265">NASL</option><option value="658">Nation Link Telecom Championship</option><option value="113">National</option><option value="453">National 3: Group A</option><option value="454">National 3: Group B</option><option value="455">National 3: Group C</option><option value="456">National 3: Group D</option><option value="457">National 3: Group E</option><option value="458">National 3: Group F</option><option value="459">National 3: Group G</option><option value="460">National 3: Group H</option><option value="877">National 3: Group I</option><option value="878">National 3: Group J</option><option value="879">National 3: Group K</option><option value="880">National 3: Group L</option><option value="881">National 3: Group M</option><option value="149">National Division</option><option value="755">National Division</option><option value="917">National Division Play-offs</option><option value="611">National Football League</option><option value="347">National League</option><option value="974">National League</option><option value="824">National League Women</option><option value="293">National Soccer League</option><option value="703">National Youth League</option><option value="813">Nationalliga A Women</option><option value="119">NB 1</option><option value="121">NB 2: East</option><option value="467">NB 3: Alfold</option><option value="468">NB 3: Bakony</option><option value="469">NB 3: Drava</option><option value="470">NB 3: Duna</option><option value="471">NB 3: Matra</option><option value="472">NB 3: Nyugati</option><option value="473">NB 3: Tisza</option><option value="821">Nb I Women</option><option value="645">Nedbank Cup</option><option value="650">New South Wales</option><option value="157">NM Cup</option><option value="22">Non League Div One: Isthmian North</option><option value="25">Non League Div One: Isthmian South</option><option value="24">Non League Div One: Northern North</option><option value="26">Non League Div One: Northern South</option><option value="865">Non League Div One: Play-offs</option><option value="23">Non League Div One: Southern Central</option><option value="27">Non League Div One: Southern S &amp; W</option><option value="21">Non League Premier: Isthmian</option><option value="28">Non League Premier: Northern</option><option value="29">Non League Premier: Southern</option><option value="668">Nordic Tournament U17</option><option value="764">Northern Nsw</option><option value="896">Northern NSW FFA Cup Preliminary</option><option value="897">Northern Territory FFA Cup Preliminary</option><option value="727">Npfl</option><option value="672">Npl Queensland</option><option value="737">Npl South Australian</option><option value="671">Npl Tasmania</option><option value="742">Npl Victoria</option><option value="670">Npl Western Australia</option><option value="923">Oberliga Play-offs</option><option value="46">Oberliga: Baden-Wurttemberg</option><option value="49">Oberliga: Bayern</option><option value="47">Oberliga: Bayern Nord</option><option value="48">Oberliga: Bayern Süd</option><option value="50">Oberliga: Bremen</option><option value="51">Oberliga: Hamburg</option><option value="52">Oberliga: Hessen</option><option value="53">Oberliga: Mittelrhein</option><option value="54">Oberliga: Niederrhein</option><option value="55">Oberliga: Niedersachsen</option><option value="56">Oberliga: Nordost-Nord</option><option value="57">Oberliga: Nordost-Süd</option><option value="58">Oberliga: NRW</option><option value="59">Oberliga: Rheinland-Pfalz/Saar</option><option value="60">Oberliga: Schleswig-Holstein</option><option value="61">Oberliga: Sudwest</option><option value="62">Oberliga: Westfalen</option><option value="156">Obos-Ligaen</option><option value="997">Obos-Ligaen Play-offs</option><option value="395">OFC Champions League</option><option value="396">OFC Nations Cup</option><option value="713">Olomoucky Kp</option><option value="397">Olympic Games</option><option value="398">Olympic Games Women</option><option value="954">Pacific Games</option><option value="969">Pan American Games</option><option value="580">Paraense</option><option value="581">Paraibano</option><option value="582">Paranaense 1</option><option value="583">Paranaense 2</option><option value="928">Paranaense U19</option><option value="716">Pardubicky Kp</option><option value="85">Parva Liga</option><option value="922">Parva Liga - Play-offs</option><option value="584">Paulista A1</option><option value="585">Paulista A2</option><option value="586">Paulista A3</option><option value="893">Paulista Série B</option><option value="924">Paulista U20</option><option value="926">Paulista Women</option><option value="330">PCSL</option><option value="268">PDL</option><option value="123">Pepsideild</option><option value="587">Pernambucano 1</option><option value="210">Persha Liga</option><option value="303">Persian Gulf Pro League</option><option value="774">Pfl</option><option value="958">Piala Indonesia</option><option value="588">Piauiense</option><option value="902">Play-offs 1/2</option><option value="720">Plzensky Kp</option><option value="160">Polish Cup</option><option value="589">Potiguar</option><option value="723">Prazsky Prebor</option><option value="282">Premier Division</option><option value="889">Premier Division</option><option value="128">Premier Division</option><option value="949">Premier Division</option><option value="768">Premier League</option><option value="769">Premier League</option><option value="3">Premier League</option><option value="271">Premier League</option><option value="276">Premier League</option><option value="279">Premier League</option><option value="281">Premier League</option><option value="285">Premier League</option><option value="286">Premier League</option><option value="291">Premier League</option><option value="292">Premier League</option><option value="296">Premier League</option><option value="309">Premier League</option><option value="310">Premier League</option><option value="312">Premier League</option><option value="314">Premier League</option><option value="67">Premier League</option><option value="325">Premier League</option><option value="326">Premier League</option><option value="72">Premier League</option><option value="328">Premier League</option><option value="75">Premier League</option><option value="334">Premier League</option><option value="335">Premier League</option><option value="605">Premier League</option><option value="606">Premier League</option><option value="351">Premier League</option><option value="354">Premier League</option><option value="139">Premier League</option><option value="147">Premier League</option><option value="919">Premier League</option><option value="929">Premier League</option><option value="169">Premier League</option><option value="683">Premier League</option><option value="209">Premier League</option><option value="214">Premier League</option><option value="983">Premier League</option><option value="250">Premier League</option><option value="766">Premier League</option><option value="931">Premier League - Playoffs</option><option value="805">Premier League 2 Division One</option><option value="620">Premier League 2 Divison Two</option><option value="634">Premier League Asia Trophy</option><option value="13">Premier League Cup</option><option value="15">Premier League International Cup</option><option value="906">Premier League Play-offs</option><option value="172">Premier League Play-offs</option><option value="17">Premier League U18</option><option value="14">Premier League U21</option><option value="912">Premier League Women</option><option value="950">Premier League Women</option><option value="82">Premier Liga</option><option value="298">Premier Soccer League</option><option value="288">Premiere Division</option><option value="353">Premiership</option><option value="153">Premiership</option><option value="174">Premiership</option><option value="852">Premiership Development League</option><option value="178">Premiership Play-Offs</option><option value="940">Premiership Women</option><option value="726">President Cup</option><option value="710">Presidents Cup</option><option value="685">PrimaVera 1</option><option value="695">Primavera 2</option><option value="837">Primavera Cup</option><option value="944">Primeira Division</option><option value="372">Primeira Liga</option><option value="161">Primeira Liga</option><option value="230">Primera A</option><option value="231">Primera A: Clausura</option><option value="228">Primera B</option><option value="237">Primera B</option><option value="601">Primera B Metropolitana</option><option value="221">Primera B Nacional</option><option value="366">Primera C</option><option value="367">Primera D Metropolitana</option><option value="258">Primera Division</option><option value="260">Primera Division</option><option value="269">Primera Division</option><option value="300">Primera División</option><option value="858">Primera Division</option><option value="227">Primera Division</option><option value="234">Primera Division</option><option value="238">Primera Division</option><option value="240">Primera Division</option><option value="254">Primera Division</option><option value="812">Primera Division Women</option><option value="261">Primera Division: Clausura</option><option value="316">Pro League</option><option value="78">Pro League</option><option value="918">Pro League Play-offs</option><option value="20">Professional Development League</option><option value="618">Professional Football League</option><option value="313">Professional League</option><option value="409">Provincial-Antwerpen</option><option value="410">Provincial-Brabant</option><option value="411">Provincial-Hainaut</option><option value="412">Provincial-Liege</option><option value="413">Provincial-Limburg</option><option value="414">Provincial-Luxembourg</option><option value="415">Provincial-Namur</option><option value="416">Provincial-Oost-Vlaanderen</option><option value="417">Provincial-West-Vlaanderen</option><option value="867">Provincial: Play-offs</option><option value="185">Prva Liga</option><option value="315">Q League</option><option value="844">QSL Cup</option><option value="894">Queensland FFA Cup Preliminary</option><option value="735">Recopa Sudamericana</option><option value="838">Regionalliga Playoffs - Finals</option><option value="40">Regionalliga: Bayern</option><option value="760">Regionalliga: Mitte</option><option value="39">Regionalliga: Nord</option><option value="41">Regionalliga: Nordost</option><option value="761">Regionalliga: Ost</option><option value="42">Regionalliga: Sud</option><option value="43">Regionalliga: Südwest</option><option value="44">Regionalliga: West</option><option value="762">Regionalliga: West</option><option value="882">Reserve League</option><option value="883">Reserve League</option><option value="886">Reserve League</option><option value="704">Reserve League</option><option value="851">Reserve Pro League</option><option value="993">Reserve Pro League 2</option><option value="725">Reykjavik Cup</option><option value="833">Reykjavik Youth Cup</option><option value="168">Romania Cup</option><option value="825">Romanian Cup Women</option><option value="590">Rondoniense</option><option value="591">Roraimense</option><option value="171">Russian Cup</option><option value="625">S. League</option><option value="399">SAFF Championship</option><option value="339">Santosh Trophy</option><option value="708">Sao Paolo Youth Cup</option><option value="176">Scottish Cup</option><option value="77">Second Division</option><option value="908">Second Division</option><option value="146">Second League</option><option value="152">Second League</option><option value="212">Second League: Group A</option><option value="213">Second League: Group B</option><option value="88">Second League: West</option><option value="524">Segunda B - Group 1</option><option value="525">Segunda B - Group 2</option><option value="526">Segunda B - Group 3</option><option value="527">Segunda B - Group 4</option><option value="528">Segunda B - Playoffs</option><option value="259">Segunda Division</option><option value="262">Segunda Division</option><option value="270">Segunda Division</option><option value="939">Segunda División</option><option value="847">Segunda Division Women</option><option value="162">Segunda Liga</option><option value="752">Serbian Cup</option><option value="592">Sergipano</option><option value="136">Serie A</option><option value="222">Serie A</option><option value="822">Serie A Women</option><option value="137">Serie B</option><option value="223">Serie B</option><option value="225">Serie C</option><option value="904">Serie C Play-offs</option><option value="475">Serie C: Girone A</option><option value="476">Serie C: Girone B</option><option value="477">Serie C: Girone C</option><option value="226">Serie D</option><option value="481">Serie D: Girone A</option><option value="482">Serie D: Girone B</option><option value="483">Serie D: Girone C</option><option value="484">Serie D: Girone D</option><option value="485">Serie D: Girone E</option><option value="486">Serie D: Girone F</option><option value="487">Serie D: Girone G</option><option value="488">Serie D: Girone H</option><option value="489">Serie D: Girone I</option><option value="831">Serie D: Playoffs</option><option value="747">Shebelieves Cup Women</option><option value="679">Shield Cup</option><option value="640">Singapore Cup</option><option value="190">Slovakia Cup</option><option value="193">Slovenia Cup</option><option value="782">Slovenian Cup</option><option value="849">South American Championship U20</option><option value="967">Southeast Asian Games</option><option value="862">Spain Youth League</option><option value="515">Srpska Liga - Belgrade</option><option value="517">Srpska Liga - East</option><option value="516">Srpska Liga - Vojvodina</option><option value="518">Srpska Liga - West</option><option value="134">State Cup</option><option value="722">Stredocesky Kp</option><option value="295">Sudan Premier League</option><option value="593">Sul Matogrossense</option><option value="739">Sultan Cup</option><option value="666">Summer Cup</option><option value="776">Super Cup</option><option value="523">Super Cup</option><option value="793">Super Cup</option><option value="35">Super Cup</option><option value="804">Super Cup</option><option value="811">Super Cup</option><option value="830">Super Cup</option><option value="65">Super Cup</option><option value="835">Super Cup</option><option value="857">Super Cup</option><option value="643">Super Cup</option><option value="651">Super Cup</option><option value="400">Super Cup</option><option value="916">Super Cup</option><option value="667">Super Cup</option><option value="946">Super Cup</option><option value="952">Super Cup</option><option value="448">Super Cup</option><option value="474">Super Cup</option><option value="496">Super Cup</option><option value="753">Super Cup</option><option value="508">Super Cup</option><option value="779">Super Cup(Serie C)</option><option value="773">Super D1</option><option value="603">Super Final</option><option value="287">Super League</option><option value="299">Super League</option><option value="331">Super League</option><option value="607">Super League</option><option value="352">Super League</option><option value="116">Super League</option><option value="885">Super League</option><option value="203">Super League</option><option value="995">Super League 2</option><option value="921">Super League Play-offs</option><option value="815">Super League Women</option><option value="206">Super Lig</option><option value="860">Süper Lig U21</option><option value="184">Super Liga</option><option value="277">Super Ligue</option><option value="962">Supercopa MX</option><option value="199">Superettan</option><option value="991">Superettan Play-offs 2/3</option><option value="990">Superettan Play-offs 3/4</option><option value="66">Superliga</option><option value="99">Superliga</option><option value="218">Superliga</option><option value="740">Superliga</option><option value="899">Superliga Play-offs</option><option value="200">Svenska Cupen</option><option value="800">Svenska Cupen Women</option><option value="205">Swiss Cup</option><option value="744">Syria Cup</option><option value="617">T&amp;T Pro League</option><option value="163">Taça De Portugal</option><option value="609">Taiwan Football Premier League</option><option value="832">Tercera  - Playoffs</option><option value="529">Tercera - Group 1</option><option value="538">Tercera - Group 10</option><option value="539">Tercera - Group 11</option><option value="540">Tercera - Group 12</option><option value="541">Tercera - Group 13</option><option value="542">Tercera - Group 14</option><option value="543">Tercera - Group 15</option><option value="544">Tercera - Group 16</option><option value="545">Tercera - Group 17</option><option value="546">Tercera - Group 18</option><option value="530">Tercera - Group 2</option><option value="531">Tercera - Group 3</option><option value="532">Tercera - Group 4</option><option value="533">Tercera - Group 5</option><option value="534">Tercera - Group 6</option><option value="535">Tercera - Group 7</option><option value="536">Tercera - Group 8</option><option value="537">Tercera - Group 9</option><option value="965">Thai League 3</option><option value="357">Thai League Two</option><option value="356">Thai Premier League</option><option value="407">Third Amateur Division: ACFF A</option><option value="408">Third Amateur Division: ACFF B</option><option value="868">Third Amateur Division: Play-offs</option><option value="405">Third Amateur Division: VFV A</option><option value="406">Third Amateur Division: VFV B</option><option value="69">Tipico Bundesliga</option><option value="711">Tipsport Liga</option><option value="594">Tocantinense</option><option value="767">Top Liga</option><option value="616">Topklasse</option><option value="994">Toppserien</option><option value="232">Torneo Aguila</option><option value="602">Torneo Federal A</option><option value="219">Torneo Federal B</option><option value="709">Torneos De Verano</option><option value="135">Toto Cup Ligat Al</option><option value="968">Toto Cup Ligat Leumit</option><option value="636">Toulon Tournament</option><option value="785">Tournament Of Nations Women</option><option value="964">Trofeo Joan Gamper</option><option value="972">TSYD Cup</option><option value="689">Tunisia Cup</option><option value="208">Turkish Cup</option><option value="32">Tweede Divisie</option><option value="778">U18 National Team Friendlies</option><option value="699">U19 League</option><option value="984">U19 League</option><option value="942">U21 Championship</option><option value="321">Uae League</option><option value="644">Uafa Cup</option><option value="639">UEFA Europa League Play-offs</option><option value="786">UEFA Nations League</option><option value="691">Uefa Regions' Cup</option><option value="599">Uefa Super Cup</option><option value="874">UEFA U17 Championship</option><option value="600">UEFA Youth League</option><option value="355">UFL</option><option value="839">Uganda Cup</option><option value="654">Uhren Cup</option><option value="211">Ukrainian Cup</option><option value="633">Universiade</option><option value="638">Universiade Women</option><option value="264">US Open Cup</option><option value="266">USL Championship</option><option value="850">USL League One</option><option value="267">USL League Two</option><option value="719">Ustecky Kp</option><option value="359">V-League</option><option value="360">V-League 2</option><option value="988">V.League 1 Play-offs</option><option value="932">Valentin Granatkin Memorial</option><option value="7">Vanarama National League</option><option value="8">Vanarama National League North</option><option value="365">Vanarama National League South</option><option value="106">Veikkausliiga</option><option value="986">Veikkausliiga Play-offs</option><option value="750">Viareggio Cup</option><option value="895">Victoria FFA Cup Preliminary</option><option value="910">Victoria NPL Youth League</option><option value="973">Victoria Premier League 2</option><option value="141">Virsliga</option><option value="715">Vysocina Kp</option><option value="827">W-League</option><option value="971">Waff Championship</option><option value="241">WC Qualification Africa</option><option value="242">WC Qualification Asia</option><option value="243">WC Qualification Concacaf</option><option value="244">WC Qualification Europe</option><option value="247">WC Qualification Intercontinental Playoffs</option><option value="245">WC Qualification Oceania</option><option value="246">WC Qualification South America</option><option value="217">Welsh Cup</option><option value="215">Welsh League Division 1 </option><option value="705">West Bank League</option><option value="936">Western Australia FFA Cup Preliminary</option><option value="901">WK-League</option><option value="976">Women's Cup</option><option value="945">Women's National League</option><option value="970">Women's Pan American Games</option><option value="900">Women's Play-offs 1/2</option><option value="818">Women’s Super League</option><option value="248">World Cup</option><option value="657">World Cup U17</option><option value="632">World Cup U20</option><option value="637">World Cup Women</option><option value="853">World Cup Women Qualification Europe</option><option value="854">World Cup Women Qualification Intercontinental</option><option value="798">World Cup Women U20</option><option value="790">World Medical Football Championship</option><option value="19">Wsl 1 Women</option><option value="18">Wsl 2 Women</option><option value="345">Ybc Levain Cup</option><option value="619">Yemeni League</option><option value="676">Yi League</option><option value="107">Ykkonen</option><option value="905">Youth League</option><option value="669">Youth League</option><option value="173">Youth League</option><option value="686">Youth League</option></select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                                                <input class="btn btn-primary" type="submit" value="Migrate Now">
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="bankrolls">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
                                            <h3 class="panel-title">Bancas de Apostas</h3>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 text-right">
                                            <button class="btn btn-success" data-toggle="modal" data-target="#bank_modal">Criar Nova</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <center id="bank_loading" style="display: none">
                                                <img src="/assets/dashboard/img/loading.gif" alt="">
                                            </center>
                                            <div id="list_bank" class="list-group">
                                                                                        <a class="list-group-item active" data-id="19128">
                                                        Bet365
                                                                                                </a>
                                                                                        <a class="list-group-item " data-id="73001">
                                                        Bet9
                                                                                                </a>
                                                                                        <a class="list-group-item " data-id="73002">
                                                        Apostas Online
                                                                                                </a>
                                                                                </div>
                                        </div>
                                        <div class="col-xs-12 col-md-8">
                                            <div class="tab-content">
                                                <div id="bank_form_div">
                                                    <form method="POST" action="https://www.staketoys.com/pt/dashboard/configs" accept-charset="UTF-8" id="form_bank"><input name="_token" type="hidden" value="Is9heWaOGnVH7D4Gm1k3RqFSPSshBXPlqmFZjbyP">
                                                        <input name="id" type="hidden" value="19128">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="name" class="control-label">Nome</label>
                                                                    <input type="text" class="form-control" name="name" value="Bet365" required="required" placeholder="Ex: Bet365, Betfair">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="initial_balance" class="control-label">Saldo Inicial</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">$</span>
                                                                        <input type="text" value="30,00" data-affixes-stay="true" data-allow-zero="true" name="initial_balance" class="form-control money" id="initial_balance" required="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="fk_currency">Moeda</label>
                                                                    <select class="form-control" required="required" id="fk_currency" name="fk_currency"><option value="1">Dólar ($)</option><option value="2">Euro (€)</option><option value="3">Sterling Pound (£)</option><option value="4" selected="selected">Real Brasileiro (R$)</option><option value="5">Rand (R)</option><option value="6">Bitcoin (BTC)</option><option value="7">Corona Sueca</option><option value="8">Swiss Francs</option></select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="initial_date" class="control-label">Data Inicial</label>
                                                                    <div class="input-group">
                                                                        <input type="text" value="07/09/2017" class="form-control datepicker" id="initial_date" placeholder="Data" name="initial_date" data-dateformat="dd/mm/yy" required="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-xs-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">
                                                                        Comissão
                                                                        <a role="button" tabindex="0" data-toggle="popover" data-placement="top" data-trigger="focus" data-html="true" title="" data-content="A comissão da banca é atribuída apenas ao lucro potencial das apostas pendentes que você criar. <hr/><a class=&quot;btn-link&quot; href=&quot;https://help.staketoys.com/article/37-como-funcionam-as-apostas-pendentes-e-comissoes-no-stake-toys&quot; target=&quot;_blank&quot;>Como funcionam as comissões e apostas pendentes?</a>" class="fa fa-question-circle hidden-xs" data-original-title="Comissões"></a>
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <input type="text" value="0,00" data-affixes-stay="true" data-allow-zero="true" name="commission" class="form-control money" id="commission">
                                                                        <span class="input-group-addon">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-md-6">
                                                                <input class="btn btn-primary" type="submit" value="Salvar">
                                                                <a class="btn btn-link text-danger pull-right" data-toggle="modal" data-target="#remove_bank_modal" data-id="19128" id="remove_bank" href="#">Excluir essa banca</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="conta">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
                                            <h3 class="panel-title">Minha Conta</h3>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="alert alert-danger fade in">
                                        <h4>Começar do Zero!!</h4>
                                        <p>Clicando no botão abaixo, você irá excluir permanentemente todas as suas apostas e movimentações cadastradas em sua conta. Você será solicitado a informar uma nova banca inicial. As demais bancas cadastradas também serão excluídas. <b>Pense com atenção antes de fazer isso</b>.</p>
                                        <hr>
                                        <p>
                                            <button type="button" class="btn btn-danger m-b-5 w-lg" data-toggle="modal" data-target="#conta_modal">Quero reiniciar minha conta</button>
                                        </p>
                                    </div>
                                </div>
                                                </div>
                        </div>
                    </div>


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