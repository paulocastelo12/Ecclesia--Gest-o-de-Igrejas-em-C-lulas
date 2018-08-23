<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ecclesia - Membro</title>
        <link href="<?php echo URL; ?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo URL; ?>assets/css/personalizado_2.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo URL; ?>assets/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="<?php echo URL; ?>assets/font-awesome/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        
        <style>
            table{
                font-size: 10px;
            }
        </style>
    </head>

    <body>

        <!-- modal salvar dados -->
        <div class="modal fade" id="mode" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Ecclesias</h5>

                    </div>
                    <div class="modal-body ">
                        <div class="text-center">
                            
                            <img src="<?php echo URL; ?>/assets/image/carregando03.gif" alt=""/>
                            <h3 id="h3-modal" style="margin-top: 10px">Salvando dados</h3>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <h6>1.0 version</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- fim modal salvar dados -->

        <div class="header-admin">

            <div style="padding: 15px;" class="text-right"><span style="color: white"><i class="glyphicon glyphicon-user"></i> Usuário logado: <?php echo $_SESSION['nome'] ?></span> </div>
        </div>

    </div>