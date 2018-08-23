<div class="panel panel-default">
    <div class="panel-body">
        <i class="fa fa-users" aria-hidden="true"></i> Relatório de Registro de Células       
    </div>
</div>
<br>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" method="POST" target="_blank" action="<?php echo URL; ?>controle-relacelula/gerarRelatorio" id="form_relacelula">
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="datainicio" class="control-label">De:</label>
                    <input type="date" name="datainicio" required="required"  class="form-control" id="datainicio">
                </div>
                <div class="col-sm-4">
                    <label for="datafinal" class="control-label">Até:</label>
                    <input type="date" required="required" name="datafinal"  class="form-control" id="datafinal">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="memgrupo" class="control-label">Grupo:</label>
                    <select id="memgrupo" name="grupo" class="form-control">
                        <option>Selecione</option>
                        <?php
                        foreach ($this->Dados as $grupo) {
                            ?>
                            <option value="<?= $grupo['grucod'] ?>"><?= $grupo['grunome'] ?></option>
                            <?php
                        }
                        ?>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Gerar relatório</button>
                </div>
            </div>
        </form>
    </div>
</div>