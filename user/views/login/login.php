<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ecclesia - Membro</title>
        <link href="<?php echo URL; ?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo URL; ?>assets/css/signin2.css" rel="stylesheet">
        <style> 
            body {
                
                padding-top: 100px;
                padding-bottom: 40px;
                 background-color: #435360;

            }
        </style>
    </head>
    <body>
        <div class="container">
            <form method="POST" action="" class="form-signin">
                <h2 class="form-signin-heading text-center">Login Usuário</h2>

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

                <input type="submit" class="btn btn-lg btn-danger btn-block" value="Acessar" name="SendLogin">    
            </form>
        </div>

    </body>
</html>