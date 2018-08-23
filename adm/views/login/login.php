<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ecclesia - Administrativo</title>
        <link href="<?php echo URL; ?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo URL; ?>assets/css/signin3.css" rel="stylesheet">
        <style> 
            body {

                padding-top: 100px;
                padding-bottom: 40px;
                background-image: url(http://localhost/Ecclesia/adm/assets/image/fundo7.png);
                background-repeat: no-repeat;
                background-size:100%;
                bottom: 0;
                color: black;
                left: 0;
                overflow: auto;
                padding: 5em;
                position: absolute;
                right: 0;
                text-align: center;
                top: 0;

            }
        </style>
    </head>
    <body>
        <div class="container col-sm-8" >
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h1 style="color: white; font-size: 40px;">Ecclesia System inovação e criatividade</h1>
            <h4 style="color: white">Paulo Castelo & Luiz Lopes</h4>
        </div>
        <div class="container col-sm-4 " >
            <form method="POST" action="" class="form-signin">
                <h4 class="form-signin-heading text-center"><img src="<?php echo URL; ?>/assets/image/userLogin3.png" alt=""/></h4>
                
                <h2 class="form-signin-heading text-center">Área Administrativa</h2>

                <?php
                if (isset($_SESSION['Msg'])):
                    echo $_SESSION['Msg'];
                    unset($_SESSION['Msg']);
                endif;
                ?>

                <div style="padding-bottom: 20px;">
                    <label class="sr-only">Usuário: </label>
                    <input type="text" required="required" class="form-control" name="email" placeholder="Digite seu email">
                </div>

                <div style="padding-bottom: 20px;">
                    <label class="sr-only">Senha: </label>
                    <input type="password" required="required" class="form-control" name="password" placeholder="Digite sua senha">
                </div>

                <input type="submit" class="btn btn-lg btn-success btn-block" value="Acessar" name="SendLogin">    
            </form>
        </div>

    </body>
</html>