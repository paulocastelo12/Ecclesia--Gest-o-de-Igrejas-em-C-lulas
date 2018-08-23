<?php


class ModelsDebitar_Conta {
    
     public function cadastrar($Dados) {
        
        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('debitar_conta', $Dados);
        
        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
     public function listarTotalValor($ano, $mes) {
        $sql = "select sum(debvalor) from debitar_conta where Year(debdata) = '".$ano."' And MONTH(debdata) = '".$mes."'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();
    
        return $this->Resultado;
    }
}
