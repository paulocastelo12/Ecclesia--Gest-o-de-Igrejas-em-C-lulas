
<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            <div class="col-sm-6"><i class="fa fa-users" aria-hidden="true"></i> Adicionar Conta á Pagar/ <a href="<?php echo URL; ?>controle-contapagar/index">Listar Contas Pagar</a></div>
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
        <form class="form-horizontal" id="form_contaPagar">
            <div class="form-group">  
                <div class="col-sm-6">
                    <label for="pagfornecod" class="control-label">Fornecedor:</label>
                    <select id="pagfornecod" class="form-control">
                        <option>Selecione</option>
                        <?php
                        foreach ($this->Dados as $forne) {
                            ?>
                            <option value="<?= $forne['fornecod'] ?>"><?= $forne['fornedescricao'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="pagdatavenc" class="control-label">Data Vencimento:</label>
                    <input type="date" required="required"  class="form-control" id="pagdatavenc">
                </div>
            </div>
            <div class="form-group">  
                <div class="col-sm-8">
                    <label for="memdatanasc" class="control-label">N° Documento:</label>
                    <input type="text" required="required"  class="form-control" id="pagnumdoc" placeholder="00000000000000000000000000">
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-4">
                    <label for="pagclassificacao" class="control-label">Classificação de Conta:</label>
                    <select id="pagclassificacao" class="form-control">
                        <option value="Variaveis">Variaves</option>
                        <option value="Fixas">Fixas</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="pagtipodespesa" class="control-label">Tipo de Despesa:</label>
                    <select id="pagtipodespesa" class="form-control">
                        <option>Selecione</option>
                        <?php
                        foreach ($this->Dados_editar as $tipodes) {
                            ?>
                            <option value="<?= $tipodes['tipodescod'] ?>"><?= $tipodes['tipodesdescricao'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="pagstatus" class="control-label">Status:</label>
                    <select id="pagstatus" disabled="true" class="form-control">
                        <option>Pendente</option>
                        <option>Pago</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="pagvalor" class="control-label">Valor:</label>
                    <input type="text" required="required"  class="form-control" id="pagvalor" ata-thousands="." data-decimal="," data-prefix="R$ ">
                </div>
                <div class="col-sm-4">
                    <label for="pagforcod" class="control-label">Forma de Pagamento:</label>
                    <select id="pagforcod" class="form-control">
                        <option>Selecione</option>
                        <?php
                        foreach ($this->Dados2 as $for) {
                            ?>
                            <option value="<?= $for['forcod'] ?>"><?= $for['fordescricao'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="condpagamanento" class="control-label">Condições de pagamento:</label>
                    <select id="condpagamento" class="form-control">
                        <option value="0">Selecione</option>
                        <option value="1">Á vista</option>
                        <option value="2">Á prazo</option>

                    </select>
                </div>

            </div>
            <div class="form-group">
                <div id="divpagparcela" class="col-sm-2" style="display: none">
                    <label for="pagparcela" class="control-label">N° Parcelas:</label>
                    <select id="pagparcela" class="form-control">
                        <option value="1">01x</option>
                        <option value="2">02x</option>
                        <option value="3">03x</option>
                        <option value="4">04x</option>
                        <option value="5">05x</option>
                        <option value="6">06x</option>
                        <option value="7">07x</option>
                        <option value="8">08x</option>
                        <option value="9">09x</option>
                        <option value="10">10x</option>
                        <option value="11">11x</option>
                        <option value="12">12x</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="valorprazo" class="control-label"><span id="valorprazo" style="font-size: 18px; color: green" ></span></label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <label for="pagobservacao">Observaçoes:</label>
                    <textarea class="form-control" rows="4" id="pagobservacao"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class=" col-sm-2">
                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Salvar</button>
                </div>
                 <div class=" col-sm-2">
                     <button type="button" style="cursor: pointer" id="bt-limpar" class="btn btn-warning"><i class="glyphicon glyphicon-floppy-saved"></i> Limpar</button>
                </div>
            </div>
        </form>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo URL; ?>assets/js/ContasPagar8.js"></script>
