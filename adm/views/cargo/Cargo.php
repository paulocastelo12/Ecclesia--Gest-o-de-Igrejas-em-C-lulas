<div class="panel panel-default">
    <div class="panel-body">
        <i class="fa fa-users" aria-hidden="true"></i> Listar Cargos/ <a href="<?php echo URL; ?>controle-cargo/cadastrarCargo">Cadastrar</a>       
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
        foreach ($this->Dados as $cargo) {
            ?>
            <tr>
                <td><?= $cargo['carcod'] ?></td>
                <td><?= $cargo['cardescricao'] ?></td>
                <td>
                    <a href="<?php echo URL; ?>controle-cargo/visualizar/<?php echo $cargo['carcod']; ?>"><img src="<?php echo URL; ?>/assets/image/editar_1.png" alt=""/></a>             
                </td>
                <?php
                if ($cargo['carstatus'] == 'Ativo') {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $cargo['carcod'] ?>', 'Inativo')" ><img src="<?php echo URL; ?>/assets/image/icone/on_1.png" alt=""/></a>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $cargo['carcod'] ?>', 'Ativo')" ><img src="<?php echo URL; ?>/assets/image/icone/off_1.png" alt=""/></a>
                    </td>
                    <?php
                }
                ?>
            </tr> 
        <script>
            function excluir(id, status) {
                if (status == "Ativo") {
                    var variavel = "Ativando Cargo";
                } else {
                    var variavel = "Desativando Cargo";
                }
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Ecclesia/adm/controle-cargo/desativarCargo",
                    data: {
                        carcod: id,
                        carstatus: status
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


