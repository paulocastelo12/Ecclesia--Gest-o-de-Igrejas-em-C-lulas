<div class="panel panel-default">
    <div class="panel-body">
        <i class="fa fa-users" aria-hidden="true"></i> Listar Contas à Pagar/ <a href="<?php echo URL; ?>controle-contaPagar/cadastrarContaPagar">Cadastrar</a>       
    </div>
</div>
<div class="col-sm-12">
    <form action="<?php echo URL; ?>controle-contapagar/index" method="POST"> 
        <div class="form-group col-sm-3 text-left">
            <div class="col-sm-3" style="font-size: 16px">Mês:</div>
            <div class="col-sm-8">
                <select  style="background-color: #afd9ee; width: 90px; height: 30px; font-size: 12px" id="regdizmes" name="regdizpesqmes" class="form-control">
                    <?php
                    $ano = $this->Dados_editar['ano'];
                    $mes = $this->Dados_editar['mes'];

                    if ($mes == 1) {
                        $mes_nome = 'Janeiro';
                    } elseif ($mes == 2) {
                        $mes_nome = 'Fevereiro';
                    } elseif ($mes == 3) {
                        $mes_nome = 'Março';
                    } elseif ($mes == 4) {
                        $mes_nome = 'Abril';
                    } elseif ($mes == 5) {
                        $mes_nome = 'Maio';
                    } elseif ($mes == 6) {
                        $mes_nome = 'Junho';
                    } elseif ($mes == 7) {
                        $mes_nome = 'Julho';
                    } elseif ($mes == 8) {
                        $mes_nome = 'Agosto';
                    } elseif ($mes == 9) {
                        $mes_nome = 'Setembro';
                    } elseif ($mes == 10) {
                        $mes_nome = 'Outubro';
                    } elseif ($mes == 11) {
                        $mes_nome = 'Novembro';
                    } else {
                        $mes_nome = 'Dezembro';
                    }
                    ?>
                    <option value="<?php echo $mes; ?>"><?php echo $mes_nome; ?></option>
                    <option value="01">Janeiro</option>
                    <option value="02">Fevereiro</option>
                    <option value="03">Março</option>
                    <option value="04">Abril</option>
                    <option value="05">Maio</option>
                    <option value="06">Junho</option>
                    <option value="07">Julho</option>
                    <option value="08">Agosto</option>
                    <option value="09">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11">Novembro</option>
                    <option value="12">Dezembro</option>   
                </select>
            </div>
        </div>
        <div class="form-group col-sm-3 text-left">
            <div class="col-sm-3" style="font-size: 16px">Ano:</div>
            <div class="col-sm-8">
                <select style="background-color: #afd9ee; width: 90px; height: 30px; font-size: 12px" id="regdizano" name="regdizpesqano" class="form-control">
                    <option value="<?php echo $ano; ?>"><?php echo $ano; ?></option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>   
                </select> 
            </div>
        </div>
        <div class="col-sm-2"><button type="submit" style="width: 90px; height: 30px; font-size: 12px"class="btn btn-warning"><i class="glyphicon glyphicon-search"></i> Buscar</button></div>
    </form>
    <div class="form-group">
        <div class="col-sm-1 text-right"></div>
        <div class="col-sm-3 text-right" style="background: white;   border-right-style: solid; border-color: red"><h4 class=""><img src="<?php echo URL; ?>/assets/image/negativo.png" alt=""/> Débitos mês:  </h4><h4  class="text-right" style="color: red"><?php echo "R$ " . number_format($this->Dados2[0]['sum(debvalor)'], 2, ",", ".") ?></h4></div>  
    </div>
</div>
<div class="col-sm-12" >
    <fieldset>
        <h6>legandas:</h6>
        <div class="form-group">
            <div class="col-sm-2">
                <div class="form-group">
                    <div class="col-sm-1" >
                        <div style="background-color: white; border: solid 2px; border-radius: 7px; height: 15px; width: 15px "></div>
                    </div>
                    <div class="col-sm-8">Quitado</div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <div class="col-sm-1" >
                        <div style="background-color: blue; border: solid 2px; border-radius: 7px; height: 15px; width: 15px "></div>
                    </div>
                    <div class="col-sm-8">No prazo</div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <div class="col-sm-1" >
                        <div style="background-color: yellow; border: solid 2px; border-radius: 7px; height: 15px; width: 15px "></div>
                    </div>
                    <div class="col-sm-8">Limite</div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <div class="col-sm-1" >
                        <div style="background-color: red; border: solid 2px; height: 15px; border-radius: 7px; width: 15px "></div>
                    </div>
                    <div class="col-sm-8">Atrasada</div>
                </div>
            </div>
        </div>

    </fieldset>
</div>
<div class="col-sm-12">
    <br>
    <table id="tab_dizimo" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Cód</th>
                <th>Data</th>
                <th>Fornecedor</th>
                <th>Categoria</th>        
                <th>Classificação</th>
                <th>Parcela</th>
                <th>Valor</th>
                <th>Status</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->Dados as $conta) {
                ?>
                <?php
                if ($conta['pagstatus'] == 'pago') {
                    ?>
                    <tr>
                        <?php
                    } else {

                        if ($conta['pagdatavenc'] < '2018-06-21') {
                            ?>
                        <tr style="background-color:#f3a683 ">   
                            <?php
                        } elseif ($conta['pagdatavenc'] == '2018-06-21') {
                            ?>
                        <tr style="background-color:#fffa65 ">     
                            <?php
                        } else {
                            ?>
                        <tr style="background-color:#afd9ee ">
                            <?php
                        }
                    }
                    ?>
                    <td><?= $conta['pagcod'] ?></td>
                    <td><?= $conta['pagdatavenc'] ?></td>
                    <td><?= $conta['fornedescricao'] ?></td>
                    <td><?= $conta['tipodesdescricao'] ?></td>
                    <td><?= $conta['pagclassificacao'] ?></td>
                    <td><?= $conta['pagparcela'] ?>x</td>


                    <?php
                    if ($conta['pagstatus'] == 'pago') {
                        ?>
                        <td><?= number_format($conta['pagvalor'], 2, ",", ".") ?></td>
                        <td style="color: green;"><?= $conta['pagstatus'] ?></td>
                        <td>
                            <a type="button" style="cursor: pointer" onclick="debitado()"><img src="<?php echo URL; ?>/assets/image/icone/pago.png" alt=""/></a>             
                        </td>
                        <?php
                    } else {
                        ?>
                        <td><input class="form-control" id="pagvalor<?= $conta['pagcod'] ?>" style="height: 20px; font-size: 12px" size="1px" value="<?= number_format($conta['pagvalor'], 2, ",", ".") ?>"></td>
                        <td style="color: red"><?= $conta['pagstatus'] ?></td>
                        <td>
                            <a href="" onclick="debitar_conta('<?= $conta['pagcod'] ?>')"><img src="<?php echo URL; ?>/assets/image/icone/pendente.png" alt=""/></a>             
                        </td>
                        <?php
                    }
                    ?>

                    <?php
                    if ($conta['pagstatus'] == 'pago') {
                        ?>
                        <td>
                            <a href="" onclick="editar()"><img src="<?php echo URL; ?>/assets/image/naoeditar.png" alt=""/></a>             
                        </td>
                        <?php
                    } else {
                        ?>
                        <td>
                            <a href="<?php echo URL; ?>controle-contapagar/visualizar/<?php echo $conta['pagcod']; ?>"><img src="<?php echo URL; ?>/assets/image/editar_1.png" alt=""/></a>             
                        </td>
                        <?php
                    }
                    ?>

                </tr> 
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo URL; ?>assets/js/ContasPagar8.js"></script>

