<?php

class ControleTipoDespesa {

    private $Dados;
    private $UserId;

    public function index() {

        $ListarTipoDespesa = new ModelsTipoDespesa();

        $this->Dados = $ListarTipoDespesa->listar();

        $CarregarView = new ConfigView("tipodespesa/TipoDespesa", $this->Dados);

        $CarregarView->renderizar();
    }
    
     public function cadastrarTipoDespesa() {
        $CarregarView = new ConfigView("tipodespesa/CadastrarTipoDespesa");
        $CarregarView->renderizar();
    }
    
     public function salvarTipoDespesa() {

        $tipodesdescricao = filter_input(INPUT_POST, 'tipodesdescricao', FILTER_DEFAULT);
        $tipodesstatus = "Ativo";
        
        $tipodespesa = new TipoDespesa();
        
        $tipodespesa->setTipodesdescricao($tipodesdescricao);
        $tipodespesa->setTipodesstatus($tipodesstatus);

        $Dados = [
            'tipodesdescricao' => $tipodespesa->getTipodesdescricao(),
            'tipodesstatus' => $tipodespesa->getTipodesstatus()
        ];

        $CadastrarTipoDespesa = new ModelsTipoDespesa();
        $CadastrarTipoDespesa->cadastrar($Dados);
        //var_dump($Dados);
    }
    
    public function visualizar($UserId = null) {
        $this->UserId = (int) $UserId;
        //echo 'id='.$UserId." ";
        if (!empty($this->UserId)):
            $ListarIdTipoDespesa = new ModelsTipoDespesa();
            $this->Dados = $ListarIdTipoDespesa->listarPorId($UserId);
            $CarregarView = new ConfigView("tipodespesa/EditarTipoDespesa", $this->Dados);
            //var_dump($this->Dados);
            //echo $this->Dados[0]['grunome'];
            $CarregarView->renderizar();
        else:
            $_SESSION['msg'] = "Necessário selecionar um usuário<br>";
            $UrlDestino = URL . 'controle-usuario/index';
            header("Location: $UrlDestino");
        endif;
    }
    
    public function editarTipoDespesa() {

        $tipodesdescricao = filter_input(INPUT_POST, 'tipodesdescricao', FILTER_DEFAULT);
        $tipodescod = filter_input(INPUT_POST, 'tipodescod', FILTER_DEFAULT);
               
        $tipodespesa = new TipoDespesa();
        
        $tipodespesa->setTipodesdescricao($tipodesdescricao);
        
        $Dados = [
            'tipodesdescricao' => $tipodespesa->getTipodesdescricao()
        ];

        $AlterarTipoDespesa = new ModelsTipoDespesa();
        $AlterarTipoDespesa->alterar($Dados,$tipodescod);
        //var_dump($Dados);
    }
    
    
    public function desativarTipoDespesa() {

        $tipodescod = filter_input(INPUT_POST, 'tipodescod', FILTER_DEFAULT);
        $tipodesstatus = filter_input(INPUT_POST, 'tipodesstatus', FILTER_DEFAULT);
        
        $tipodespesa = new TipoDespesa();
        
        $tipodespesa->setTipodesstatus($tipodesstatus);
        
        $Dados = [
            'tipodesstatus' => $tipodespesa->getTipodesstatus()
        ];

        $AlterarTipoDespesa = new ModelsTipoDespesa();
        $AlterarTipoDespesa->alterar($Dados, $tipodescod);
        //var_dump($Dados);
    }
    

}
