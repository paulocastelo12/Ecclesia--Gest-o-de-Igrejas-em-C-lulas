<?php

class ModelsFormaPag {

    private $Resultado;
    private $UserId;

    public function listar() {
        $sql = "select * from forma_pagamento";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }

    public function cadastrar($Dados) {
        sleep(1);

        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('forma_pagamento', $Dados);

        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
    public function listarPorId($id) {
        $sql = "select * from forma_pagamento where forcod = '" . $id . "'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }

    public function alterar($Dados, $id) {
        sleep(1);

        $update = new ModelsUpdate();
        $update->ExeUpdate('forma_pagamento', $Dados, "WHERE forcod = :id", "id=" . $id . "");
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
