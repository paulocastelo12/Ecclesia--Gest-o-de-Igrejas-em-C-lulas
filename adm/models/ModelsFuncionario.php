<?php

class ModelsFuncionario {

    private $Resultado;
    private $UserId;

    public function listar() {
        $sql = "select * from funcionario inner join cargo on carcod = funcod inner join contato_funcionario on confuncionariocod = funcod";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
     public function cadastrar($Dados) {
        sleep(1);
        
        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('funcionario', $Dados);
        
        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
     public function listarPorId($id) {
        $sql = "select * from funcionario inner join cargo on carcod = funcod inner join contato_funcionario on confuncionariocod = funcod  where funcod = '" . $id . "'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
    public function alterar($Dados, $id) {
        sleep(1);

        $update = new ModelsUpdate();
        $update->ExeUpdate('funcionario', $Dados, "WHERE funcod = :id", "id=" . $id . "");
        if ($update->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
    public function listarPorNome($nome) {
        $sql = "select * from funcionario where funnome = '".$nome."'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();
    
        return $this->Resultado;
    }
    

    function getResultado() {
        return $this->Resultado;
    }

}
