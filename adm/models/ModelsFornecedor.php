<?php

class ModelsFornecedor {

    private $Resultado;
    private $UserId;

    public function listar() {
        $sql = "select * from fornecedor";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
     public function cadastrar($Dados) {
        sleep(1);
        
        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('fornecedor', $Dados);
        
        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
    public function listarPorId($id) {
        $sql = "select * from fornecedor where fornecod = '" . $id . "'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
    public function alterar($Dados, $id) {
        sleep(1);

        $update = new ModelsUpdate();
        $update->ExeUpdate('fornecedor', $Dados, "WHERE fornecod = :id", "id=" . $id . "");
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
