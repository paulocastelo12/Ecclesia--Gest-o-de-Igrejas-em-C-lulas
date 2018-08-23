
<div class="well text-center">
    Bem vindo
</div>
<h3>Inovação em gestão de Igrejas</h3>
   <br>
<div class="form-group">
    <div class="col-sm-5 text-right"></div>
    <div class="col-sm-3 text-right" style="background: white;   border-right-style: solid; border-color: red"><h4 class=""><img src="<?php echo URL; ?>/assets/image/negativo.png" alt=""/> Débitos mês:  </h4><h4  class="text-right" style="color: red"><?php echo "R$ " . number_format($this->Dados['totaldebitos'][0]['sum(debvalor)'], 2, ",", ".") ?></h4></div>
    <div class="col-sm-1 text-right"></div>
    <div class="col-sm-3 text-right"style="background: white; border-right-style: solid; border-color: green"><h4 class=""><img src="<?php echo URL; ?>/assets/image/money.png" alt=""/> Saldo Disponível:  </h4><h4  class="text-right" style="color: green"><?php echo "R$ " . number_format($this->Dados['caixasaldo'][0]['caixasaldo'], 2, ",", ".") ?></h4></div>
</div>
<br>

<div class="form-group text-center col-sm-12"   style="margin-left: 75px">
    <br>
    <br>
    <div id="div_membro" class="col-sm-2"  style="background-color: #78e08f; cursor: pointer; border-radius: 20px" >
        <div class="text-center" style="padding: 10px"><img src="<?php echo URL; ?>/assets/image/membro.png" alt=""/></div>
        <div class="text-center"><span >Nº membros: 0<?php echo $this->Dados['qtdMembro'] ?></span></div>
    </div>
    <div class="col-sm-1" >

    </div>
    <div class="col-sm-2" id="div_celula" style="background-color: #fab1a0; cursor: pointer; border-radius: 20px" >
        <div class="text-center" style="padding: 10px"><img src="<?php echo URL; ?>/assets/image/icone/familia.png" alt=""/></div>

        <div class="text-center"><span >Nº células: 0<?php echo $this->Dados['qtdCelula'] ?></span></div>
    </div>
    <div class="col-sm-1" >

    </div>
    <div class="col-sm-2" style="background-color: #dff9fb; cursor: pointer; border-radius: 20px" >
        <div class="text-center" style="padding: 10px"><img src="<?php echo URL; ?>/assets/image/icone/grupos2.png" alt=""/></div>  
        <div class="text-center"><span >Nº grupos: 0<?php echo $this->Dados['qtdGrupo'] ?></span></div>
    </div>
    <div class="col-sm-1" >

    </div>
    <div class="col-sm-2" style="background-color: #ffeaa7; cursor: pointer; border-radius: 20px" >
        <div class="text-center" style="padding: 10px"><img src="<?php echo URL; ?>/assets/image/icone/biblia.png" alt=""/></div>

        <div class="text-center"><span >Nº cultos: 0<?php echo $this->Dados['qtdCulto'] ?></span></div>
    </div>
    <div class="col-sm-1">

    </div>
</div>







