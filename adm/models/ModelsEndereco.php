<?php

class ModelsEndereco {

    private $Resultado;
    private $UserId;

    

    public function cadastrar($Dados) {
        sleep(1);
        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('endereco', $Dados);
        
        

        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }

    function getResultado() {
        return $this->Resultado;
    }

}
