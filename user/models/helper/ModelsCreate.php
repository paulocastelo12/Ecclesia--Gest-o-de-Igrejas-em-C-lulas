<?php

/**
 * <b>Create.class:</b>
 * Classe responsavel por cadastros genéricos no banco de dados!
 * @copyright (c) 2014, Fabio Augusto CASA DOS SITES
 * 
 * Como utilizar: **************************************************
  $Cadastra = new Create;                                          //Estanciar o objeto
  $Dados = [                                                  //Criar os dados de cadastro
  'NOME DA TABELA NO BANCO DE DADOS' => 'VALOR',
  'NOME DA TABELA NO BANCO DE DADOS' => 'VALOR',
  ];
  $Cadastra->ExeCreate('ws_siteviews_agent', $Dados);         //Fazer o cadastro
  if($Cadastra->getResult()):                                 //Debugar o cadastro
  echo 'Cadastro com sucesso';
  else:
  echo 'Falha no cadastro';
  endif;
 * *****************************************************************
 */
class ModelsCreate extends ModelsConn {

    private $Tabela;
    private $Dados;
    private $Result;

    /** @var PDOStatement */
    private $Create;

    /* @var PDO */
    private $Conn;

    public function ExeCreate($Tabela, array $Dados) {
        $this->Tabela = (string) $Tabela;
        $this->Dados = $Dados;

        $this->getSyntax();
        $this->Execute();
    }

    public function getResult() {
        //echo $this->Result;
        return $this->Result;
    }

    /**
     * ****************************************
     * ********** PRIVATE METHODS *************
     * ****************************************
     */
    private function Connect() {
        $this->Conn = parent::getConn();
        $this->Create = $this->Conn->prepare($this->Create);
    }

    private function getSyntax() {
        $Fileds = implode(', ', array_keys($this->Dados));
        $Places = ':' . implode(', :', array_keys($this->Dados));
        $completo= "INSERT INTO {$this->Tabela} ({$Fileds}) VALUES ({$Places})";
        $this->Create = "INSERT INTO {$this->Tabela} ({$Fileds}) VALUES ({$Places})";
        
    }

    private function Execute() {
        $this->Connect();
        try {
            $this->Create->execute($this->Dados);
            $this->Result = $this->Conn->lastInsertId();
            //echo $this->Result;
        } catch (PDOException $e) {
            $this->Result = null;
            CDSErro("<b>Erro ao cadastrar:</b> {$e->getMessage()}", $e->getCode());
        }
    }

}
