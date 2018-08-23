
<div class="panel panel-default">
    <div class="panel-body">
        <i class="fa fa-users" aria-hidden="true"></i> Listar Células/ <a href="<?php echo URL; ?>controle-celula/cadastrarCelula">Cadastrar</a>       
    </div>
</div>

<br>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Cód</th>
            <th>Descrição</th>
            <th>Anfitrião</th>
            <th>Líder</th>
            <th>Classificação</th>
            <th>Status</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($this->Dados as $celula) {
            ?>
            <tr>
                <td><?= $celula['celcod'] ?></td>
                <td><?= $celula['celdescricao'] ?></td>
                <td><?= $celula['celanfitriao'] ?></td>
                <td><?= $celula['memnome'] ?></td>
                <td><?= $celula['celclassificacao'] ?></td>
                <td><?= $celula['celstatus'] ?></td>
                <td>
                    <a href="<?php echo URL; ?>controle-celula/visualizar/<?php echo $celula['celcod']; ?>"><img src="<?php echo URL; ?>/assets/image/editar_1.png" alt=""/></a>             
                </td>
                <?php
                if ($celula['celstatus'] == 'Ativo') {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $celula['celcod'] ?>', 'Inativo')" ><img src="<?php echo URL; ?>/assets/image/icone/on_1.png" alt=""/></a>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $celula['celcod'] ?>', 'Ativo')" ><img src="<?php echo URL; ?>/assets/image/icone/off_1.png" alt=""/></a>
                    </td>
                    <?php
                }
                ?>

            </tr> 

        <script>

            function excluir(id, status) {
                if (status == "Ativo") {
                    var variavel = "Ativando Célula";
                } else {
                    var variavel = "Desativando Célula";
                }
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Ecclesia/adm/controle-celula/desativarCelula",
                    data: {
                        celcod: id,
                        celstatus: status
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


