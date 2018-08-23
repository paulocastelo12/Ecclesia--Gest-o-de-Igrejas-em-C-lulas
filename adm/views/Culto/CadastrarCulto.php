
<div class="panel panel-default">
    <div class="panel-body"><i class="fa fa-users" aria-hidden="true"></i> Cadastrar Culto/ <a href="<?php echo URL; ?>controle-culto/index">Listar Culto</a></div>
    <?php
    if (isset($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
    ?>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" id="form_culto">
            <div class="form-group">  
                <div class="col-sm-6">
                    <label for="culdescricao" class=" control-label"><span style="color: red">* </span>Descrição:</label>
                    <input type="text" required="required" class="form-control" id="culdescricao" placeholder="Digite nome">
                </div>
                <div class="col-sm-4">
                    <label for="culdia_semana" class="control-label"><span style="color: red">* </span>Dia da semana:</label>
                    <select id="culdia_semana" class="form-control">
                        <option>Selecione</option>
                        <option>Domingo</option>
                        <option>Segunda-feira</option>    
                        <option>Terça-feira</option>    
                        <option>Quarta-feira</option>    
                        <option>Quinta-feira</option>    
                        <option>Sexta-feira</option>    
                        <option>Sabádo</option>    
                    </select>
                </div>

            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="culhorario_inicio" class=" control-label"><span style="color: red">* </span>Horário inicío:</label>
                    <input type="time" required="required" class="form-control" id="culhorario_inicio" >
                </div>
                 <div class="col-sm-4">
                    <label for="culhorario_final" class=" control-label"><span style="color: red">* </span>Horário final:</label>
                    <input type="time" required="required" class="form-control" id="culhorario_final">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo URL; ?>assets/js/Culto.js"></script>

