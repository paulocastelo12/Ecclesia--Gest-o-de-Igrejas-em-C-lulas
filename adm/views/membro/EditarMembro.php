
<div class="panel panel-default">

    <div class="panel-body">
        <div class="form-group">
            <div class="col-sm-4"><i class="fa fa-users" aria-hidden="true"></i> Cadastrar Membro/ <a href="<?php echo URL; ?>controle-membro/index">Listar Membros</a></div>
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
        <form class="form-horizontal" id="form_membro_editarDados">
            <fieldset>
                <legend><i class="glyphicon glyphicon-user"></i> Dados Pessoais:</legend>
                <div class="form-group">  
                    <div class="col-sm-4">
                        <label for="memnome" class="control-label"><span style="color: red">* </span>Nome:</label>
                        <input type="hidden" value="<?php echo $this->Dados[0]['memcod'] ?>" class="form-control" id="memcod" >
                        <input type="text" required="required" value="<?php echo $this->Dados[0]['memnome'] ?>" class="form-control" id="memnome" placeholder="Digite nome">
                    </div>
                    <div class="col-sm-4">
                        <label for="memrg" class="control-label"><span style="color: red">* </span>RG:</label>
                        <input type="text" required="required" value="<?php echo $this->Dados[0]['memrg'] ?>" class="form-control" id="memrg" placeholder="">
                    </div>
                    <div class="col-sm-4">
                        <label for="memsexo" class="control-label"><span style="color: red">* </span>Sexo:</label>
                        <select id="memsexo"  class="form-control">
                            <option><?php echo $this->Dados[0]['memsexo'] ?></option>
                            <option>Masculino</option>
                            <option>Feminino</option>    
                        </select>
                    </div>
                </div>
                <div class="form-group">  
                    <div class="col-sm-4">
                        <label for="memestadocivil" class="control-label"><span style="color: red">* </span>Estado Civil:</label>
                        <select id="memestadocivil" class="form-control">
                            <option><?php echo $this->Dados[0]['memestadocivil'] ?></option>
                            <option>Solteiro</option>
                            <option>Casado</option>    
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="memdatanasc" class="control-label"><span style="color: red">* </span>Data Nasc.:</label>
                        <input type="date" required="required" value="<?php echo $this->Dados[0]['memdatanasc'] ?>"  class="form-control" id="memdatanasc">
                    </div>
                    <div class="col-sm-4">
                        <label for="memgrupo" class="control-label"><span style="color: red">* </span>Grupo:</label>
                        <select id="memgrupo" class="form-control">
                            <option value="<?php echo $this->Dados[0]['grucod'] ?>" ><?php echo $this->Dados[0]['grunome'] ?></option>
                            <?php
                            foreach ($this->Dados_editar as $grupo) {
                                ?>
                                <option value="<?= $grupo['grucod'] ?>"><?= $grupo['grunome'] ?></option>
                                <?php
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Salvar</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <br>
        <form class="form-horizontal" id="form_membro_editarContato" >

            <fieldset>
                <legend><i class="glyphicon glyphicon-phone-alt"></i> Contato: <a href="" value="descer" id="bt-contato"><i class="glyphicon glyphicon-triangle-bottom"></i></a></legend>

                <div id="div_contato" style="display: none">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="memtelefone" class=" control-label"><span style="color: red">* </span>Telefone:</label>
                            <input type="text" value="<?php echo $this->Dados[0]['contelefone'] ?>" class="form-control" id="memtelefone" placeholder="">
                            <input type="hidden" value="<?php echo $this->Dados[0]['concod'] ?>" class="form-control" id="memconcod">
                        </div>
                        <div class="col-sm-4">
                            <label for="mememail" class="control-label">Email:</label>
                            <input type="email" value="<?php echo $this->Dados[0]['conemail'] ?>" class="form-control" id="mememail" placeholder="exemplo@dominio.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Salvar</button>
                        </div>
                    </div>
                </div>   
            </fieldset>

        </form>
        <br>
        <form class="form-horizontal" id="form_membro_editarEndereco">
            <fieldset>
                <legend><i class="glyphicon glyphicon-home"></i> Endereço: <a href="" id="bt-endereco"><i class="glyphicon glyphicon-triangle-bottom"></i></a></legend>
                <div id="div_endereco" style="display: none">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="memcep" class=" control-label"><span style="color: red">* </span>Cep:</label>
                            <input type="text" required="required" value="<?php echo $this->Dados[0]['cep'] ?>"  onblur="pesquisacep(this.value);" class="form-control" id="cep" placeholder="">
                            <input type="hidden" value="<?php echo $this->Dados[0]['endcod'] ?>" class="form-control" id="endcod">
                        </div>
                        <div class=" col-sm-2" style="margin-top: 27px;">
                            <button type="button" id="btcep" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Buscar</button>
                        </div>
                        <div class=" col-sm-2" style="margin-top: 40px;">
                            <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/"><i class="glyphicon glyphicon-link"></i> Procure seu cep!</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="membairro" class=" control-label">Bairro:</label>
                            <input type="text" value="<?php echo $this->Dados[0]['bairro'] ?>" class="form-control" readonly="true" id="bairro" placeholder="">
                        </div>
                        <div class="col-sm-4">
                            <label for="memmunicipio" class=" control-label">Município:</label>
                            <input type="text" value="<?php echo $this->Dados[0]['cidade'] ?>" class="form-control" readonly="true" id="cidade" placeholder="">
                        </div>
                        <div class="col-sm-2">
                            <label for="memuf" class=" control-label">UF:</label>
                            <input type="text" value="<?php echo $this->Dados[0]['uf'] ?>" class="form-control" readonly="true" id="uf" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <label for="memrua"  class=" control-label">Rua:</label>
                            <input type="text" value="<?php echo $this->Dados[0]['rua'] ?>" class="form-control" readonly="true" id="rua" placeholder="">
                        </div>
                        <div class="col-sm-1">
                            <label for="numero" class=" control-label">Numero:</label>
                            <input type="text" value="<?php echo $this->Dados[0]['numero'] ?>" class="form-control" id="numero" placeholder="">
                        </div>
                        <div class="col-sm-6">
                            <label for="complemento" class=" control-label">Complemento:</label>
                            <input type="text" value="<?php echo $this->Dados[0]['complemento'] ?>" class="form-control" id="complemento" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class=" col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Salvar</button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo URL; ?>assets/js/buscacep.js"></script>
<script src="<?php echo URL; ?>assets/js/Membro3.js"></script>