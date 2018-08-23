<br>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nome</th>
            <th>Responsável(1°)</th>
            <th>Responsável(2°)</th>
            <th>E-mail</th>
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
                <td>
                    <a href=""><img src="<?php echo URL; ?>/assets/image/editar3.png" alt=""/></a>             
                </td>
                <td>
                    <a href=""><img src="<?php echo URL; ?>/assets/image/lixo3.png" alt=""/></a>
                </td>

            </tr> 
    <?php
}
?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $('#example').DataTable({
            "language": {
                "lengthMenu": "Exibir _MENU_ registros por página",
                "zeroRecords": "Nada encontrado - desculpe",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ total registros)",
                "search": "Buscar:"
            },
            "lengthMenu": [[10, 20, 40, -1], [10, 20, 40, "Todos"]],
            "order": [[0, "desc"]]

        });
    });
</script>