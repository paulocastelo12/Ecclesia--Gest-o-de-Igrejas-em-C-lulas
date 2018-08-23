<div class="panel panel-default">
    <div class="panel-body">

        <i class="fa fa-users" aria-hidden="true"></i> Listar Grupos/ <a href="<?php echo URL; ?>controle-grupo/cadastrarGrupo">Cadastrar</a>       
    </div>
</div>

<br>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nome</th>
            <th>Responsável(1°)</th>
            <th>Responsável(2°)</th>
            <th>E-mail</th>
            <th>Status</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($this->Dados as $grupo) {
            ?>
            <tr>
                <td><?= $grupo['grucod'] ?></td>
                <td><?= $grupo['grunome'] ?></td>
                <td><?= $grupo['gruresponsavel1'] ?></td>
                <td><?= $grupo['gruresponsavel2'] ?></td>
                <td><?= $grupo['gruemail'] ?></td>
                <td><?= $grupo['grustatus'] ?></td>
                <td>
                    <a href="<?php echo URL; ?>controle-grupo/visualizar/<?php echo $grupo['grucod']; ?>"><img src="<?php echo URL; ?>/assets/image/editar_1.png" alt=""/></a>             
                </td>
                <?php
                if ($grupo['grustatus'] == 'Ativo') {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $grupo['grucod'] ?>','Inativo')" ><img src="<?php echo URL; ?>/assets/image/icone/on_1.png" alt=""/></a>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $grupo['grucod'] ?>','Ativo')" ><img src="<?php echo URL; ?>/assets/image/icone/off_1.png" alt=""/></a>
                    </td>
                    <?php
                }
                ?>

            </tr>

        <script>

            function excluir(id,status) {
                if(status == "Ativo"){
                  var variavel = "Ativando Grupo";  
                }else{
                     var variavel = "Desativando Grupo"; 
                }
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Ecclesia/adm/controle-grupo/desativarGrupo",
                    data: {
                        grucod: id,
                        grustatus: status
                    },

                    beforeSend: function () {
                        
                        $('#modal-grupo').modal('hide');
                        $('#h3-modal').html(variavel);

                        $('#mode').modal('show');
                    },

                    success: function (resultado) {
                        if (resultado !== "") {
                            $('#mode').modal('hide');

                            //alert("PPPPPPPP");
                            console.log(resultado);
                        } else {
                            console.log("error retorno vazio!");
                        }
                    }
                });
                 return false;
            }
  
        </script>
        <?php
    }
    ?>
</tbody>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



