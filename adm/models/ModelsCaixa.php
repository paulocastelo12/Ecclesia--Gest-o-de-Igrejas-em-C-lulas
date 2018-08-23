<?php


class ModelsCaixa {
    
     public function listar() {
        $sql = "SELECT * FROM caixa";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
}
