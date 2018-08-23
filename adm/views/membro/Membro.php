<div class="panel panel-default">
    <div class="panel-body">

        <i class="fa fa-users" aria-hidden="true"></i> Listar Membros/ <a href="<?php echo URL; ?>controle-membro/cadastrarMembro">Cadastrar</a>       
    </div>
</div>
<br>
<div id="listamembro" class=" col-md-12">
    <table id="example"class="display" style="width:100%">
        <thead>
            <tr>
                <th>Mátricula</th>
                <th>Nome</th>
                <th>Grupo</th>
                <th>Fone</th>
                <th>Email</th>
                <th>Status</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->Dados as $membro) {
                ?>
                <tr>
                    <td><?= $membro['memcod'] ?></td>
                    <td><?= $membro['memnome'] ?></td>
                    <td><?= $membro['grunome'] ?></td>
                    <td><?= $membro['contelefone'] ?></td>
                    <td><?= $membro['conemail'] ?></td>
                    <td><?= $membro['memstatus'] ?></td>

                    <td>
                        <a href="<?php echo URL; ?>controle-membro/visualizar/<?php echo $membro['memcod']; ?>"><img src="<?php echo URL; ?>/assets/image/editar_1.png" alt=""/></a>             
                    </td>
                    <?php
                    if ($membro['memstatus'] == 'Ativo') {
                        ?>
                        <td>
                            <a href="" onclick="excluir('<?= $membro['memcod'] ?>', 'Inativo')" ><img src="<?php echo URL; ?>/assets/image/icone/on_1.png" alt=""/></a>
                        </td>
                        <?php
                    } else {
                        ?>
                        <td>
                            <a href="" onclick="excluir('<?= $membro['memcod'] ?>', 'Ativo')" ><img src="<?php echo URL; ?>/assets/image/icone/off_1.png" alt=""/></a>
                        </td>
                        <?php
                    }
                    ?>

                </tr> 
            <script>

                function excluir(id, status) {
                    if (status == "Ativo") {
                        var variavel = "Ativando Membro";
                    } else {
                        var variavel = "Desativando Membro";
                    }
                    $.ajax({
                        type: "POST",
                        url: "http://localhost/Ecclesia/adm/controle-membro/desativarMembro",
                        data: {
                            memcod: id,
                            memstatus: status
                        },

                        beforeSend: function () {
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
</div>

