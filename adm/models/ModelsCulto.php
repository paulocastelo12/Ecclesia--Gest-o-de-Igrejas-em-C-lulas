<?php

class ModelsCulto {

    private $Resultado;
    private $UserId;

    public function listar() {
        $sql = "select * from culto ORDER BY culcod DESC;";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
    public function cadastrar($Dados) {
        sleep(2);

        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('culto', $Dados);

        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
    public function alterar($Dados, $id) {
        sleep(2);

        $update = new ModelsUpdate();
        $update->ExeUpdate('culto', $Dados, "WHERE culcod = :id", "id=" . $id . "");
        if ($update->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }

    public function listarPorId($id) {
        $sql = "select * from culto where culcod = '" . $id . "'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
}
