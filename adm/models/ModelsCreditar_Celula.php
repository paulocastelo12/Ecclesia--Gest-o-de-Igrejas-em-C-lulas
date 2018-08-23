<?php


class ModelsCreditar_Celula {
    
    public function cadastrar($Dados) {
        
        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('credito_celula', $Dados);
        
        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
}
