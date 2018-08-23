<?php


class ModelsRegCelula {
    private $Resultado;
    private $UserId;

    public function listarPorId($pesq) {
        
        $sql = "SELECT * FROM registro_celula inner join celula on celcod = regcelcelulacod where Year(regceldata_realizacao) = '".$ano."' And MONTH(regceldata_realizacao) = '".$mes."'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
    public function listarId($id) {
        $sql = "SELECT * FROM registro_celula inner join celula on celcod = regcelcelulacod inner join membro on memcod = celmemcod inner join grupo on grucod = memgrupo where regcelcod = '".$id."'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
    public function listar($datainicio,$datafinal,$grupo) {
        $sql = "SELECT regcelcod, celdescricao, memnome, grunome, regcelqdt_participantes, regcelvalor, regceldata_realizacao, regcelstatus_registro FROM registro_celula inner join celula on celcod = regcelcelulacod inner join membro on memcod = celmemcod inner join grupo on grucod = memgrupo where regceldata_realizacao BETWEEN '".$datainicio."' AND '".$datafinal."' AND grucod = '".$grupo."' order by regcelcod";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
    public function listarPorMesAno($mes, $ano) {
        $sql = "SELECT * FROM registro_celula inner join celula on celcod = regcelcelulacod inner join membro on memcod = celmemcod inner join grupo on grucod = memgrupo where Year(regceldata_registro) = '".$ano."' And MONTH(regceldata_registro) = '".$mes."'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
     public function alterarStatus($Dados, $id) {
        sleep(1);

        $update = new ModelsUpdate();
        $update->ExeUpdate('registro_celula', $Dados, "WHERE regcelcod = :id", "id=" . $id . "");
        if ($update->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
    public function cadastrar($Dados) {
        sleep(1);
        
        $Cadastrar = new ModelsCreate();
        $Cadastrar->ExeCreate('registro_celula', $Dados);
        
        if ($Cadastrar->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
    
    function getResultado() {
        return $this->Resultado;
    }
    
    public function ValorTotalCreditoCelula($ano, $mes) {
        //echo 'entrou';
        $sql = "SELECT sum(credvalor) FROM credito_celula where Year(creddata) = '".$ano."' And MONTH(creddata) = '".$mes."'";
        $Listar = new ModelsRead();
        $Listar->fullread($sql);
        $this->Resultado = $Listar->getResult();

        return $this->Resultado;
    }
    
    public function alterar($Dados, $id) {
        sleep(1);

        $update = new ModelsUpdate();
        $update->ExeUpdate('registro_celula', $Dados, "WHERE regcelcod = :id", "id=" . $id . "");
        if ($update->getResult()):
            echo 1;
        else:
            echo 2;
        endif;
    }
}
