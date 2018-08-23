<?php

class ModelsRegDizimo {

    private $Resultado;
    private $UserId;

    public function listar() {
        $sql = "select * from registro_dizimo inner join membro on memcod = dizmemcod inner join forma_pagamento on forcod = dizforcod inner join caixa on caixacod = dizcaixacod";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
      public function listarPorMesAno($mes, $ano) {
        $sql = "select * from registro_dizimo inner join membro on memcod = dizmemcod inner join forma_pagamento on forcod = dizforcod inner join caixa on caixacod = dizcaixacod where Year(dizdata) = '".$ano."' And MONTH(dizdata) = '".$mes."'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
    public function ValorTotalDiz($mes, $ano) {
        $sql = "SELECT sum(dizvalor) FROM registro_dizimo where Year(dizdata) = '".$ano."' And MONTH(dizdata) = '".$mes."'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
     public function cadastrar($Dados) {
        sleep(1);
        
        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('registro_dizimo', $Dados);
        
        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
     public function excluir($id) {
        sleep(1);
        
        $Excluir = new ModelsDelete();
        $Excluir->executar("DELETE FROM registro_dizimo WHERE  dizcod = '$id'");
        
        if ($Excluir->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
     public function listarPorId($id) {
        $sql = "select * from registro_dizimo inner join membro on memcod = dizmemcod inner join forma_pagamento on forcod = dizforcod inner join caixa on caixacod = dizcaixacod where dizcod = '" . $id . "'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
     public function alterar($Dados, $id) {
        sleep(1);

        $update = new ModelsUpdate();
        $update->ExeUpdate('registro_dizimo', $Dados, "WHERE dizcod = :id", "id=" . $id . "");
        if ($update->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }

}
