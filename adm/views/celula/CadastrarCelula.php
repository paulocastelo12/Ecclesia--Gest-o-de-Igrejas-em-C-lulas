
<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <div class="col-sm-4"><i class="fa fa-users" aria-hidden="true"></i> Cadastrar Célula/ <a href="<?php echo URL; ?>controle-celula/index">Listar Células</a></div>
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
        <form class="form-horizontal" id="form_celula">
            <div class="form-group">  
                <div class="col-sm-6">
                    <label for="celdescricao" class=" control-label"><span style="color: red">* </span>Descrição:</label>
                    <input type="text" required="required" class="form-control" id="celdescricao" placeholder="Digite nome">
                </div>
                <div class="col-sm-4">
                    <label for="celclassificacao" class="control-label"><span style="color: red">* </span>Classicação:</label>
                    <select id="celclassificacao" class="form-control">
                        <option>Selecione</option>
                        <option>Criança</option>
                        <option>Adolescente</option>    
                        <option>Jovem</option>    
                        <option>Adulto</option>    
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="celanfitriao" class=" control-label"><span style="color: red">* </span>Anfitrião:</label>
                    <input type="text" required="required" class="form-control" id="celanfitriao" >
                </div>
                <div class="col-sm-4">
                    <label for="celmemnome" class=" control-label"><span style="color: red">* </span>Líder:</label>
                    <input type="text" readonly="true" class="form-control" id="celmemnome">
                    <input type="hidden" required="required" readonly="true" class="form-control" id="celmemcod">
                </div>
                <div class="col-sm-4">
                    <button type="button"  data-toggle="modal" href="#modalSelectLideres" id="btSelecionarLideres" style="margin-top: 27px" class="btn btn-default"> Add</button>
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
                                <th>Mát.</th>
                                <th>Nome</th>
                                <th>Grupo</th>
                                <th>Ação</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($this->Dados as $membro) {
                                ?>
                                <tr>
                                    <td><?= $membro['memcod'] ?></td>
                                    <td><?= $membro['memnome'] ?></td>
                                    <td><?= $membro['grunome'] ?></td>

                                    <td>
                                        <a class="btn btn-success" 
                                           onclick="confirmarLider<?= $membro['memcod'] ?>('<?= $membro['memcod'] ?>')" 
                                           id="btn-editar" data-dismiss="modal" href="#edit"><i class="fa fa-check fa-lg" aria-hidden="true"></i></a>
                                    </td>

                                </tr>

                            <script type="text/javascript">

                                function confirmarLider<?= $membro['memcod'] ?>(id) {
             
                                    var nome = "<?= $membro['memnome'] ?>";
                                    var memcod = "<?= $membro['memcod'] ?>";
                     
                                    $("#celmemnome").val(nome);
                                    $("#celmemcod").val(memcod);
       
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
<!-- fim selecionar lideres -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo URL; ?>assets/js/Celula3.js"></script>



