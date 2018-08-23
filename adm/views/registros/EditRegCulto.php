
<div class="panel panel-default">
     <div class="panel-body">
        <div class="form-group">
            <div class="col-sm-4"><i class="glyphicon glyphicon-list-alt"></i> Adicionar Culto/ <a href="<?php echo URL; ?>controle-regculto/index">Registro Culto</a></div>
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
        <form class="form-horizontal" id="form_editregculto">
            <div class="form-group">  
                <div class="col-sm-4">
               
                    <label for="regculdata" class=" control-label"><span style="color: red">* </span>Data:</label>
                    <input type="date" required="required" value="<?php echo $this->Dados[0]['regculdata']?>"  class="form-control" id="regculdata">
                    <input type="hidden" required="required" value="<?php echo $this->Dados[0]['regculcod']?>"  class="form-control" id="regcod">
                </div>
                <div class="col-sm-4">
                    <label for="regculcod" class="control-label"><span style="color: red">* </span>Culto:</label>
                    <select id="regculcod" class="form-control">
                        <option value="<?php echo $this->Dados[0]['culcod']?>"><?php echo $this->Dados[0]['culdescricao']?></option>
                        <?php
                        foreach ($this->Dados_editar as $culto) {
                            ?>
                            <option value="<?= $culto['culcod'] ?>"><?= $culto['culdescricao'] ?></option>
                            <?php
                        }
                        ?> 
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="regculvalor" class=" control-label"><span style="color: red">* </span>Valor:</label>
                    <input type="text" required="required" readonly="true" value="<?php echo $this->Dados[0]['regculvalor']?>" class="form-control" id="regculvalor" ata-thousands="." data-decimal="," data-prefix="R$ " >                   
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Salvar</button>
                </div>
            </div>
        </form>
    </div>

</div>
<!-- fim selecionar lideres -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo URL; ?>assets/js/RegCulto2.js"></script>


