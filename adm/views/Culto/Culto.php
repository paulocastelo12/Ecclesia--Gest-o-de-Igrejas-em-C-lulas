
<div class="panel panel-default">
    <div class="panel-body">

        <i class="fa fa-users" aria-hidden="true"></i> Listar Cultos/ <a href="<?php echo URL; ?>controle-culto/cadastrarCulto">Cadastrar</a>       
    </div>
</div>

<br>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Descrição</th>
            <th>Dia-Semana</th>
            <th>Horário-inicío</th>
            <th>Horário-Término</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($this->Dados as $culto) {
            ?>
            <tr>
                <td><?= $culto['culcod'] ?></td>
                <td><?= $culto['culdescricao'] ?></td>
                <td><?= $culto['culdia_semana'] ?></td>
                <td><?= $culto['culhorario_inicio'] ?></td>
                <td><?= $culto['culhorario_fial'] ?></td>
                <td>
                    <a href="<?php echo URL; ?>controle-culto/visualizar/<?php echo $culto['culcod']; ?>"><img src="<?php echo URL; ?>/assets/image/editar_1.png" alt=""/></a>             
                </td>
                <?php
                if ($culto['culstatus'] == 'Ativo') {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $culto['culcod'] ?>', 'Inativo')" ><img src="<?php echo URL; ?>/assets/image/icone/on_1.png" alt=""/></a>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $culto['culcod'] ?>', 'Ativo')" ><img src="<?php echo URL; ?>/assets/image/icone/off_1.png" alt=""/></a>
                    </td>
                    <?php
                }
                ?>

            </tr> 

        <script>

            function excluir(id, status) {
                if (status == "Ativo") {
                    var variavel = "Ativando Culto";
                } else {
                    var variavel = "Desativando Culto";
                }
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Ecclesia/adm/controle-culto/desativarCulto",
                    data: {
                        culcod: id,
                        culstatus: status
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

        <div class="modal fade" id="ModalDesativar<?= $culto['culcod'] ?>" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Ecclesias</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group text-center">
                            <h4>Deseja realmente desativar Culto <span style="color: red"><?= $culto['culdescricao'] ?></span>?</h4>
                        </div>
                        <br>
                        <div class="form-group text-center">
                            <button  type="button" class="btn btn-danger" >Sim</button>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Não</button>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>

            </div>
        </div>
        <?php
    }
    ?>
</tbody>
</table>



