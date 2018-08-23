
<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <div class="col-sm-4"><i class="glyphicon glyphicon-list-alt"></i> Add Registro Célula/ <a href="<?php echo URL; ?>controle-regcelula/index">Registro Célula</a></div>
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
        <form class="form-horizontal" id="form_editregcelula">
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="regcelceluladescricao" class=" control-label"><span style="color: red">* </span>Célula:</label>
                    <input type="text" readonly="true"  value="<?php echo $this->Dados[0]['celdescricao']?>" class="form-control" id="regcelceluladescricao">
                    <input type="hidden" required="required"  value="<?php echo $this->Dados[0]['celcod']?>" readonly="true" class="form-control" id="regcelcelulacod">
                    <input type="hidden" required="required"  value="<?php echo $this->Dados[0]['regcelcod']?>" readonly="true" class="form-control" id="regcelcod">
                </div>
                <div class="col-sm-4">
                    <button type="button"  data-toggle="modal" href="#modalSelectLideres" id="btSelecionarLideres" style="margin-top: 27px" class="btn btn-default"> Add</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="regcellider" class=" control-label"><span style="color: red">* </span>Líder:</label>
                    <input type="text" readonly="true"  value="<?php echo $this->Dados[0]['memnome']?>" class="form-control" id="regcellider">
                </div>
                <div class="col-sm-4">
                    <label for="regcelgrupo" class=" control-label"><span style="color: red">* </span>Grupo:</label>
                    <input type="text" readonly="true" value="<?php echo $this->Dados[0]['grunome']?>" class="form-control" id="regcelgrupo">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="regcelstatus_registro" class="control-label"><span style="color: red">* </span>Status Registro:</label>
                    <select id="regcelstatus_registro" class="form-control">
                        <option  value="<?php echo $this->Dados[0]['regcelstatus_registro']?>"><?php echo $this->Dados[0]['regcelstatus_registro']?></option>
                        <option>Houve</option>
                        <option>Não-houve</option>
                    </select>
                </div>
            </div>
            <div class="form-group">  
                <div class="col-sm-4">
                    <?php
                    date_default_timezone_set('America/Manaus');
                    $date = date('Y-m-d');
                    $hora = date('H:i:s');
                    ?>
                    <label for="regceldata_registro" class=" control-label">Data Registro:</label>
                    <input type="date" required="required"   value="<?php echo $this->Dados[0]['regceldata_registro']?>"  class="form-control" id="regceldata_registro" readonly="true">
                </div>
                <div class="col-sm-4">
                    <label for="regceldata_realizacao" class=" control-label"><span style="color: red">* </span>Data Realização:</label>
                    <input type="date" required="required"  value="<?php echo $this->Dados[0]['regceldata_realizacao']?>"  class="form-control" id="regceldata_realizacao" >
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label for="regcelqtd_participantes" class=" control-label"><span style="color: red">* </span>Quant. Participantes:</label>
                    <input class="form-control"  type="number"  value="<?php echo $this->Dados[0]['regcelqdt_participantes']?>" id="regcelqtd_participantes">               
                </div>
                <div class="col-sm-3">
                    <label for="regcelqtd_conversoes" class=" control-label">Quant. Conversões:</label>
                    <input class="form-control" type="number"  value="<?php echo $this->Dados[0]['regcelqtd_conversoes']?>" id="regcelqtd_conversoes">               
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="regcelvalor" class=" control-label">Oferta:</label>
                    <input type="text"  required="required"  value="<?php echo $this->Dados[0]['regcelvalor']?>" class="form-control" id="regcelvalor" ata-thousands="." data-decimal="," data-prefix="R$ " >                   
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

<!-- modal  selecionar lideres -->
<div class="modal fade "  id="modalSelectLideres" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ecclesia</h5>

            </div>
            <div class="modal-body ">

                <form id="form-pesqLideresCelula">

                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cód.</th>
                                <th>Célula</th>
                                <th>Líder</th>
                                <th>Grupo</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($this->Dados_editar as $celula) {
                                ?>
                                <tr>
                                    <td><?= $celula['celcod'] ?></td>
                                    <td><?= $celula['celdescricao'] ?></td>
                                    <td><?= $celula['memnome'] ?></td>
                                    <td><?= $celula['grunome'] ?></td>

                                    <td>
                                        <a class="btn btn-success" 
                                           onclick="confirmarCelula<?= $celula['celcod'] ?>('<?= $celula['celcod'] ?>')" 
                                           id="btn-editar" data-dismiss="modal" href="#edit"><i class="fa fa-check fa-lg" aria-hidden="true"></i></a>
                                    </td>

                                </tr>

                            <script type="text/javascript">

                                function confirmarCelula<?= $celula['celcod'] ?>(id) {

                                    var descricao = "<?= $celula['celdescricao'] ?>";
                                    var codigo = "<?= $celula['celcod'] ?>";
                                    var lider = "<?= $celula['memnome'] ?>";
                                    var grupo = "<?= $celula['grunome'] ?>";
                                     
                                    $("#regcelcelulacod").val(codigo); 
                                    $("#regcelceluladescricao").val(descricao);
                                    $("#regcellider").val(lider);
                                    $("#regcelgrupo").val(grupo);

                                }
                            </script>

                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </form>
                <button type="button" id="btn-nao" data-dismiss="modal" class="btn btn-danger">Fechar</button>
            </div>
            <div class="modal-footer">
                <h6>1.0 version</h6>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo URL; ?>assets/js/RegCelula3.js"></script>







