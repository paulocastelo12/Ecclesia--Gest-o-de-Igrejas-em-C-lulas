
<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <div class="col-sm-4"><i class="fa fa-users" aria-hidden="true"></i> Cadastrar Cargos/ <a href="<?php echo URL; ?>controle-cargo/index">Listar Cargos</a></div>
            <div class="col-sm-6" id="msg" style="display: none"><h5 style="color: green"><strong id="strong-msg">Cadastrado com sucesso!</strong></h5></div>
        </div>
    </div>
   
    <?php
    if (isset($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
    ?>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" id="form_cargo_editar">
            <div class="form-group">
                <label for="cardescricao" class="col-sm-2 control-label"><span style="color: red">* </span>Descrição:</label>
                <input type="hidden" value="<?php echo $this->Dados[0]['carcod']?>" id="carcod" >
                <div class="col-sm-8">
                    <input type="text" required="required" class="form-control"  value="<?php echo $this->Dados[0]['cardescricao']?>" id="cardescricao" placeholder="Digite descrição">
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
<script src="<?php echo URL; ?>assets/js/Cargo1.js"></script>
