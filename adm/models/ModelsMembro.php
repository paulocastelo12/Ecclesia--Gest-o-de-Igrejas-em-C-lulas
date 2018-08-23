<?php


class ModelsMembro {

    private $Resultado;
    private $UserId;

    public function listar() {
        //$sql = "select * from membro ORDER BY memcod DESC;";
        $sql = "SELECT * FROM membro inner join grupo on grucod = memgrupo inner join contato on concod = memcod inner join endereco on forendcod = memcod ORDER BY memcod DESC;";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();
    
        return $this->Resultado;
    }
    
    public function listarPorNome($nome) {
        $sql = "select * from membro where memnome = '".$nome."'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();
    
        return $this->Resultado;
    }

    public function cadastrar($Dados) {
       
        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('membro', $Dados);
  
        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
    public function listarPorId($id) {
        $sql = "SELECT * FROM membro inner join grupo on grucod = memgrupo inner join contato on concod = memcod inner join endereco on forendcod = memcod where memcod = '" . $id . "'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
    public function alterar($Dados, $id) {
        sleep(1);

        $update = new ModelsUpdate();
        $update->ExeUpdate('membro', $Dados, "WHERE memcod = :id", "id=" . $id . "");
        if ($update->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
    public function alterarContato($Dados, $id) {
        sleep(1);

        $update = new ModelsUpdate();
        $update->ExeUpdate('contato', $Dados, "WHERE concod = :id", "id=" . $id . "");
        if ($update->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
    public function alterarEndereco($Dados, $id) {
        sleep(2);

        $update = new ModelsUpdate();
        $update->ExeUpdate('endereco', $Dados, "WHERE endcod = :id", "id=" . $id . "");
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
