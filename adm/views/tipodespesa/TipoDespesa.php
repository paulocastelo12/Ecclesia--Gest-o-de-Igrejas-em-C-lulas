<div class="panel panel-default">
    <div class="panel-body">
        <i class="fa fa-users" aria-hidden="true"></i> Listar Tipo despesas/ <a href="<?php echo URL; ?>controle-tipoDespesa/cadastrarTipodespesa">Cadastrar</a>       
    </div>
</div>
<br>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Descrição</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($this->Dados as $tipodespesa) {
            ?>
            <tr>
                <td><?= $tipodespesa['tipodescod'] ?></td>
                <td><?= $tipodespesa['tipodesdescricao'] ?></td>
                <td>
                    <a href="<?php echo URL; ?>controle-tipodespesa/visualizar/<?php echo $tipodespesa['tipodescod']; ?>"><img src="<?php echo URL; ?>/assets/image/editar_1.png" alt=""/></a>             
                </td>
                <?php
                if ($tipodespesa['tipodesstatus'] == 'Ativo') {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $tipodespesa['tipodescod'] ?>', 'Inativo')" ><img src="<?php echo URL; ?>/assets/image/icone/on_1.png" alt=""/></a>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $tipodespesa['tipodescod'] ?>', 'Ativo')" ><img src="<?php echo URL; ?>/assets/image/icone/off_1.png" alt=""/></a>
                    </td>
                    <?php
                }
                ?>
            </tr> 
        <script>
            function excluir(id, status) {
             
                if (status == "Ativo") {
                    var variavel = "Ativando Tipo de Despesa";
                } else {
                    var variavel = "Desativando Tipo de Despesa";
                }
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Ecclesia/adm/controle-tipoDespesa/desativarTipodespesa",
                    data: {
                        tipodescod: id,
                        tipodesstatus: status
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


