<?php

class ModelsContatoFuncionario {

    private $Resultado;
    private $UserId;

    public function cadastrar($Dados) {

        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('contato_funcionario', $Dados);

        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
     public function alterar($Dados, $id) {
        sleep(1);

        $update = new ModelsUpdate();
        $update->ExeUpdate('contato_funcionario', $Dados, "WHERE confuncod = :id", "id=" . $id . "");
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
