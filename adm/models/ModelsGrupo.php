<?php

class ModelsGrupo {

    private $Resultado;
    //private $UserId;

    public function listar() {
        $sql = "select * from grupo ORDER BY grucod DESC;";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }

    public function cadastrar($Dados) {
        sleep(1);

        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('grupo', $Dados);

        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }

    public function alterar($Dados, $id) {
        sleep(1);

        $update = new ModelsUpdate();
        $update->ExeUpdate('grupo', $Dados, "WHERE grucod = :id", "id=" . $id . "");
        if ($update->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }

    public function listarPorId($id) {
        $sql = "select * from grupo where grucod = '" . $id . "'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }

    function getResultado() {
        return $this->Resultado;
    }

}
