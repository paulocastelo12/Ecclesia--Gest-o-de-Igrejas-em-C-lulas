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
                <li><a href="<?php echo URL; ?>controle-regcelula/cadastrarRegCelula">> Registrar relátorio</a></li>    
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-2 sidenav hidden-xs">
             <h4 class="form-signin-heading text-center"><img src="<?php echo URL; ?>/assets/image/userLogin.png" alt=""/></h4>
            <h2 style="background-color: #535c68; color: white">Ecclesia<span style="font-size: 14px">. System</span></h2>
            
            <br>
            <ul class="nav nav-pills nav-stacked">
                <li>
                    <a href="<?php echo URL; ?>controle-home/index" style="color: white">
                        <i class="fa fa-home fa-2x" aria-hidden="true"></i>
                        Home
                    </a> 
                </li>
                <li>
                    <a href="#servSubmenu" data-toggle="collapse" style="color: white" >
                        <i class="fa fa-briefcase fa-2x" aria-hidden="true"></i>
                       Minha Célula
                    </a>
                    <ul class="collapse list-unstyled" id="servSubmenu">
                        <li><a style="color: white" href="<?php echo URL; ?>controle-regcelula/cadastrarRegCelula">> Registrar relátorio</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" style="color: white">
                        <i class="fa fa-question-circle fa-2x" aria-hidden="true"></i>
                        Ajuda
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL; ?>controle-login/logout" style="color: white">
                        <i class="fa fa-fw fa-sign-out fa-2x"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div><br>
        <div class="col-sm-10">