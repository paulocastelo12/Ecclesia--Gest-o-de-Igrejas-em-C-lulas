
<div class="panel panel-default">
    <div class="panel-body"><i class="fa fa-users" aria-hidden="true"></i> Cadastrar Grupo/ <a href="<?php echo URL; ?>controle-grupo/index">Listar Grupos</a></div>
    <?php
    if (isset($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
    ?>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" id="form_grupo">
            <div class="form-group">
                <label for="grunome" class="col-sm-2 control-label"><span style="color: red">* </span>Nome:</label>
                <div class="col-sm-8">
                    <input type="text" required="required" class="form-control" id="grunome" placeholder="Digite nome">
                </div>
            </div>
            <div class="form-group">
                <label for="gruresponsavel1" class="col-sm-2 control-label"><span style="color: red">* </span>Responsável (1°):</label>
                <div class="col-sm-6">
                    <input type="text" required="required" class="form-control" id="gruresponsavel1" placeholder="Digite o nome do responsável">
                </div>
            </div>
            <div class="form-group">
                <label for="gruresponsavel2" class="col-sm-2 control-label"><span style="color: red">* </span>Responsável (2°):</label>
                <div class="col-sm-6">
                    <input type="text" required="required" class="form-control" id="gruresponsavel2" placeholder="Digite o nome da responsável">
                </div>
            </div>
            <div class="form-group">
                <label for="gruemail" class="col-sm-2 control-label">Email:</label>
                <div class="col-sm-4">
                    <input type="email" required="required" class="form-control" id="gruemail" placeholder="exemplo@dominio.com">
                </div>
            </div>
      
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Salvar</button>
                </div>
            </div>
        </form>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo URL; ?>assets/js/Grupo2.js"></script>
