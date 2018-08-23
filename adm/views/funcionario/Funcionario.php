<div class="panel panel-default">
    <div class="panel-body">
        <i class="fa fa-users" aria-hidden="true"></i> Listar Funcionários/ <a href="<?php echo URL; ?>controle-funcionario/cadastrarFuncionario">Cadastrar</a>       
    </div>
</div>
<br>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Cód.</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Função</th>
            <th>Dt. Admissão</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($this->Dados as $funcionario) {
            ?>
            <tr>
                <td><?= $funcionario['funcod'] ?></td>
                <td><?= $funcionario['funnome'] ?></td>
                <td><?= $funcionario['funcpf'] ?></td>
                <td><?= $funcionario['confuntelefone'] ?></td>
                <td><?= $funcionario['cardescricao'] ?></td>
                <td><?= $funcionario['fundtadmissao'] ?></td>
                <td>
                    <a href="<?php echo URL; ?>controle-funcionario/visualizar/<?php echo $funcionario['funcod']; ?>"><img src="<?php echo URL; ?>/assets/image/editar_1.png" alt=""/></a>             
                </td>
                <?php
                if ($funcionario['funstatus'] == 'Ativo') {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $funcionario['funcod'] ?>', 'Inativo')" ><img src="<?php echo URL; ?>/assets/image/icone/on_1.png" alt=""/></a>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <a href="" onclick="excluir('<?= $funcionario['funcod'] ?>', 'Ativo')" ><img src="<?php echo URL; ?>/assets/image/icone/off_1.png" alt=""/></a>
                    </td>
                    <?php
                }
                ?>
            </tr> 
        <script>
            function excluir(id, status) {
                if (status == "Ativo") {
                    var variavel = "Ativando Funcionário";
                } else {
                    var variavel = "Desativando Funcionário";
                }
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Ecclesia/adm/controle-funcionario/desativarFuncionario",
                    data: {
                        funcod: id,
                        funstatus: status
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
