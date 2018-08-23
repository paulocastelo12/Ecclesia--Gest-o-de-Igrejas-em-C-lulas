<div class="panel panel-default">
    <div class="panel-body">

        <i class="fa fa-users" aria-hidden="true"></i> Listar Forma pag./ <a href="<?php echo URL; ?>controle-forpagamento/cadastrarForpagamento">Cadastrar</a>       
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
        foreach ($this->Dados as $forpag) {
            ?>
            <tr>
                <td><?= $forpag['forcod'] ?></td>
                <td><?= $forpag['fordescricao'] ?></td>

                <td>
                    <a href="<?php echo URL; ?>controle-forpagamento/visualizar/<?php echo $forpag['forcod']; ?>"><img src="<?php echo URL; ?>/assets/image/editar_1.png" alt=""/></a>             
                </td>
                <?php
                if ($forpag['forstatus'] == 'Ativo') {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $forpag['forcod'] ?>', 'Inativo')" ><img src="<?php echo URL; ?>/assets/image/icone/on_1.png" alt=""/></a>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $forpag['forcod'] ?>', 'Ativo')" ><img src="<?php echo URL; ?>/assets/image/icone/off_1.png" alt=""/></a>
                    </td>
                    <?php
                }
                ?>

            </tr> 

        <script>

            function excluir(id, status) {
               
                if (status == "Ativo") {
                    var variavel = "Ativando Forma de Pagamento";
                } else {
                    var variavel = "Desativando Forma de Pagamento";
                }
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Ecclesia/adm/controle-forpagamento/desativarForpagamento",
                    data: {
                        forcod: id,
                        forstatus: status
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


