<?php

class ModelsRegCulto {

    private $Resultado;
    private $UserId;

    public function listar($ano, $mes) {
        $sql = "SELECT * FROM registro_culto inner join culto on culcod = regculcultocod where Year(regculdata) = '".$ano."' And MONTH(regculdata) = '".$mes."'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
     public function ValorTotalCulto($ano, $mes) {
        //echo 'entrou';
        $sql = "SELECT sum(regculvalor) FROM registro_culto where Year(regculdata) = '".$ano."' And MONTH(regculdata) = '".$mes."'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
    public function cadastrar($Dados) {
        sleep(1);
        
        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('registro_culto', $Dados);
        
        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
     public function excluir($id) {
        sleep(1);
        
        $Excluir = new ModelsDelete();
        $Excluir->executar("DELETE FROM registro_culto WHERE  regculcod = '$id'");
        
        if ($Excluir->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
     public function listarPorId($id) {
        $sql = "select * from registro_culto inner join culto on culcod = regculcultocod where regculcod = '" . $id . "'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
    public function alterar($Dados, $id) {
        sleep(1);

        $update = new ModelsUpdate();
        $update->ExeUpdate('registro_culto', $Dados, "WHERE regculcod = :id", "id=" . $id . "");
        if ($update->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }

}
