<?php

class ModelsTipoDespesa {

    private $Resultado;
    private $UserId;

    public function listar() {
        $sql = "select * from tipo_despesa";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
     public function cadastrar($Dados) {
        sleep(1);
        
        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('tipo_despesa', $Dados);
        
        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
     public function listarPorId($id) {
        $sql = "select * from tipo_despesa where tipodescod = '" . $id . "'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
     
    public function alterar($Dados, $id) {
        sleep(1);

        $update = new ModelsUpdate();
        $update->ExeUpdate('tipo_despesa', $Dados, "WHERE tipodescod = :id", "id=" . $id . "");
        if ($update->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
    

    function getResultado() {
        return $this->Resultado;
    }

}
