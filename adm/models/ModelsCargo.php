<?php

class ModelsCargo {
    
    private $Resultado;
    private $UserId;

    public function listar() {
        $sql = "select * from cargo";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();
    
        return $this->Resultado;
    }

    public function cadastrar($Dados) {
        sleep(1);
        
        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('cargo', $Dados);
        
        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
     public function listarPorId($id) {
        $sql = "select * from cargo where carcod = '" . $id . "'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
    public function alterar($Dados, $id) {
        sleep(1);

        $update = new ModelsUpdate();
        $update->ExeUpdate('cargo', $Dados, "WHERE carcod = :id", "id=" . $id . "");
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
