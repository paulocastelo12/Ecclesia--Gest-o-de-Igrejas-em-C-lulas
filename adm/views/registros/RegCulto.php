<div class="panel panel-default">
    <div class="panel-body">

        <i class="glyphicon glyphicon-list-alt"></i> Registros Cultos           
    </div>
</div>

<ul class="nav nav-tabs">
    <li><a href="<?php echo URL; ?>controle-regdizimo/index">Dízimo</a></li>
    <li class="active"><a href="<?php echo URL; ?>controle-regculto/index">Culto</a></li>
    <li><a href="<?php echo URL; ?>controle-regcelula/index">Célula</a></li>
</ul>
<br>
<div class="col-sm-12">
    <div class="col-sm-3"><a href="<?php echo URL; ?>controle-regculto/cadastrarRegCulto" type="button" style="width: 90px; height: 30px; font-size: 12px" class="btn btn-primary">Adicionar</a></div>
    <form action="<?php echo URL; ?>controle-regculto/index" method="POST"> 
        <div class="form-group col-sm-3 text-left">
            <div class="col-sm-3" style="font-size: 16px">Mês:</div>
            <div class="col-sm-8">
                <select  style="background-color: #afd9ee; width: 90px; height: 30px; font-size: 12px" id="regdizmes" name="regculpesqmes" class="form-control">
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
                <select style="background-color: #afd9ee; width: 90px; height: 30px; font-size: 12px" id="regdizano" name="regculpesqano" class="form-control">
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
        <div class="col-sm-3"><button type="submit" style="width: 90px; height: 30px; font-size: 12px" class="btn btn-warning"><i class="glyphicon glyphicon-search"></i> Buscar</button></div>
    </form>

</div>

<div class="col-sm-9">
    <br>
    <table id="tab_dizimo"  class="display" style="width:100%">
        <thead>
            <tr>
                <th>Cód</th>
                <th>Data</th>
                <th>Valor</th>
                <th>Descrição Culto</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->Dados as $regculto) {
                ?>

                <tr>
                    <td><?= $regculto['regculcod'] ?></td>
                    <td><?= $regculto['regculdata'] ?></td>
                    <td><?= number_format($regculto['regculvalor'], 2, ",", ".") ?></td>
                    <td><?= $regculto['culdescricao'] ?></td>

                    <td>
                        <a href="<?php echo URL; ?>controle-regculto/visualizar/<?php echo $regculto['regculcod']; ?>"><img src="<?php echo URL; ?>/assets/image/editar_1.png" alt=""/></a>             
                    </td>
                    <td>
                        <a href="" onclick="excluir('<?= $regculto['regculcod'] ?>')" id="bt-excluir"><img src="<?php echo URL; ?>/assets/image/delete_1.png" alt=""/></a>
                    </td>

                </tr> 
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<div class="col-sm-3" style="background-color: white; border: 1px solid; border-color: #31b0d5; border-radius: 10px">
    <table class="table col-sm-12">
        <tr><h3>Arrecadações: <img src="<?php echo URL; ?>/assets/image/money.png" alt=""/></h3></tr>
        <tr>
            <td><h5>Culto</h5></td>
            <td></td>
            <td><h5 style="color: green"><?php echo "R$ " . number_format($this->Dados_editar['valorTotalculto'][0]['sum(regculvalor)'], 2, ",", ".") ?></h5></td>
        </tr>
        <tr>
            <td><h5>Célula</h5></td>
            <td></td>
            <td><h5 style="color: green"><?php echo "R$ " . number_format($this->Dados_editar['valorcelcredito'][0]['sum(credvalor)'], 2, ",", ".") ?></h5></td>
        </tr>
        <tr>
            <td><h5>Dízimo</h5></td>
            <td></td>
            <td><h5 style="color: green"><?php echo "R$ " . number_format($this->Dados_editar['valorTotalDiz'][0]['sum(dizvalor)'], 2, ",", ".") ?></h5></td>

        </tr>
        <tr>
            <td><h5>T. Arrecadado</h5></td>
            <td></td>
            <td><h5 style="color: green"><?php echo "R$ " . number_format($this->Dados_editar['total'], 2, ",", ".") ?></h5></td>
        </tr>
        <tr>
            <td><h5>Saldo Atual</h5></td>
            <td></td>
            <td><h5 style="color: green"><?php echo "R$ " . number_format($this->Dados_editar['caixasaldo'][0]['caixasaldo'], 2, ",", ".") ?></h5></td>
        </tr>
    </table> 

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo URL; ?>assets/js/RegCulto1.js"></script>




