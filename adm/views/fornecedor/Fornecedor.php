<div class="panel panel-default">
    <div class="panel-body">
        <i class="fa fa-users" aria-hidden="true"></i> Listar Fornecedores/ <a href="<?php echo URL; ?>controle-fornecedor/cadastrarFornecedor">Cadastrar</a>       
    </div>
</div>
<br>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Cód</th>
            <th>CPF/CNPJ</th>
            <th>Descrição</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($this->Dados as $fornecedor) {
            ?>
            <tr>
                <td><?= $fornecedor['fornecod'] ?></td>
                <td><?= $fornecedor['forneidt'] ?></td>
                <td><?= $fornecedor['fornedescricao'] ?></td>
                <td>
                    <a href="<?php echo URL; ?>controle-fornecedor/visualizar/<?php echo $fornecedor['fornecod']; ?>"><img src="<?php echo URL; ?>/assets/image/editar_1.png" alt=""/></a>             
                </td>
                <?php
                if ($fornecedor['fornestatus'] == 'Ativo') {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $fornecedor['fornecod'] ?>', 'Inativo')" ><img src="<?php echo URL; ?>/assets/image/icone/on_1.png" alt=""/></a>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $fornecedor['fornecod'] ?>', 'Ativo')" ><img src="<?php echo URL; ?>/assets/image/icone/off_1.png" alt=""/></a>
                    </td>
                    <?php
                }
                ?>
            </tr> 
        <script>
            function excluir(id, status) {
                if (status == "Ativo") {
                    var variavel = "Ativando Fornecedor";
                } else {
                    var variavel = "Desativando Fornecedor";
                }
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Ecclesia/adm/controle-fornecedor/desativarFornecedor",
                    data: {
                        fornecod: id,
                        fornestatus: status
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




