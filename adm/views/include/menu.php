<nav class="navbar navbar-inverse visible-xs">

    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Ecclesia</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo URL; ?>controle-cargo/index">> Cargo</a></li>
                <li><a href="<?php echo URL; ?>controle-culto/index">> Culto</a></li>
                <li><a href="<?php echo URL; ?>controle-celula/index">> Célula</a></li>
                <li><a href="<?php echo URL; ?>controle-fonercedor/index">> Fornecedor</a></li>
                <li><a href="<?php echo URL; ?>controle-funcionario/index">> Funcionário</a></li>
                <li><a href="<?php echo URL; ?>controle-grupo/index">> Grupo</a></li>
                <li><a href="<?php echo URL; ?>controle-membro/index">> Membro</a></li>      
                <li><a href="<?php echo URL; ?>controle-usuario/index">> Usuário</a></li>     
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-2 sidenav hidden-xs">
            <h4 class="form-signin-heading text-center"><img src="<?php echo URL; ?>/assets/image/userLogin.png" alt=""/></h4>
            <h2 style="background-color: #269abc; color: white">Ecclesia<span style="font-size: 14px">. System</span></h2>
            
            <br>
            <ul class="nav nav-pills nav-stacked">
                <li>
                    <a href="<?php echo URL; ?>controle-home/index">
                        <i class="fa fa-home fa-2x" aria-hidden="true"></i>
                        Home
                    </a> 
                </li>

                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" >
                        <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                        Cadastros
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li><a href="<?php echo URL; ?>controle-cargo/index">> Cargo</a></li>
                        <li><a href="<?php echo URL; ?>controle-culto/index">> Culto</a></li>
                        <li><a href="<?php echo URL; ?>controle-celula/index">> Célula</a></li>
                         <li><a href="<?php echo URL; ?>controle-fornecedor/index">> Fornecedor</a></li>
                        <li><a href="<?php echo URL; ?>controle-funcionario/index">> Funcionário</a></li>
                        <li><a href="<?php echo URL; ?>controle-grupo/index">> Grupo</a></li>
                        <li><a href="<?php echo URL; ?>controle-membro/index">> Membro</a></li>      
                        <li><a href="<?php echo URL; ?>controle-usuario/index">> Usuário</a></li>                

                    </ul>
                </li>

                <li>

                    <a href="#pageSubmenu" data-toggle="collapse" >
                        <i class="fa fa-usd fa-2x" aria-hidden="true"></i>
                        Finanças 
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li><a href="<?php echo URL; ?>controle-forpagamento/index">> Forma de pagamento</a></li>
                        <li><a href="<?php echo URL; ?>controle-tipodespesa/index">> Tipo de Despesas</a></li>
                        <li><a href="<?php echo URL; ?>controle-contapagar/index">> Contas à Pagar</a></li>
                    </ul>
                </li>
                <li>

                    <a href="#servSubmenu" data-toggle="collapse" >
                        <i class="fa fa-briefcase fa-2x" aria-hidden="true"></i>
                        Serviços
                    </a>
                    <ul class="collapse list-unstyled" id="servSubmenu">
                        <li><a href="<?php echo URL; ?>controle-regdizimo/index">> Atividades</a></li>
                    </ul>
                </li>
                <li>

                    <a href="#relSubmenu" data-toggle="collapse" >
                        <i class="fa fa-line-chart fa-2x" aria-hidden="true"></i>
                        Relatórios
                    </a>
                    <ul class="collapse list-unstyled" id="relSubmenu">
                        <li><a href="<?php echo URL; ?>controle-relacelula/index">> Registro de Células</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-question-circle fa-2x" aria-hidden="true"></i>
                        Ajuda
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL; ?>controle-login/logout">
                        <i class="fa fa-fw fa-sign-out fa-2x"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div><br>
        <div class="col-sm-10">