<?php

class ModelsContato {

    private $Resultado;
    private $UserId;

    
    public function cadastrar($Dados) {
        
        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('contato', $Dados);
        
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

