<?php

class ModelsContaPagar {

    private $Resultado;
    private $UserId;

    public function listar() {
        $sql = "select * from contas_pagar";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
     public function listarPorId($id) {
        $sql = "SELECT * FROM contas_pagar inner join tipo_despesa on  tipodescod = pagtipodescod inner join forma_pagamento on forcod = pagforcod inner join fornecedor on fornecod = pagfornecod where pagcod = '" . $id . "'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
    public function listarPorMesAno($mes, $ano) {
        $sql = "SELECT * FROM contas_pagar inner join tipo_despesa on tipodescod = pagtipodescod inner join fornecedor on fornecod = pagfornecod inner join forma_pagamento on forcod = pagforcod where Year(pagdatavenc) = '".$ano."' And MONTH(pagdatavenc) = '".$mes."'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }

    public function cadastrar($Dados) {

        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('contas_pagar', $Dados);

        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
     public function alterarStatus($Dados, $id) {
        sleep(1);

        $update = new ModelsUpdate();
        $update->ExeUpdate('contas_pagar', $Dados, "WHERE pagcod = :id", "id=" . $id . "");
        if ($update->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
     public function alterar($Dados, $id) {
        sleep(1);

        $update = new ModelsUpdate();
        $update->ExeUpdate('contas_pagar', $Dados, "WHERE pagcod = :id", "id=" . $id . "");
        if ($update->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }

}
