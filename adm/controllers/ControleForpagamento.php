<?php

class ControleForpagamento {

    private $Dados;
    private $UserId;

    public function index() {

        $ListarForpag = new ModelsFormaPag();

        $this->Dados = $ListarForpag->listar();

        $CarregarView = new ConfigView("Forpagamento/forpagamento", $this->Dados);

        $CarregarView->renderizar();
    }

    public function cadastrarForpagamento() {
        $CarregarView = new ConfigView("forpagamento/CadastrarForpagamento");
        $CarregarView->renderizar();
    }

    public function salvarForpagamento() {

        $fordescricao = filter_input(INPUT_POST, 'fordescricao', FILTER_DEFAULT);
        $forstatus = 'Ativo';

        $forpagamento = new Forpagamento();

        $forpagamento->setFordescricao($fordescricao);
        $forpagamento->setForstatus($forstatus);

        $Dados = [
            'fordescricao' => $forpagamento->getFordescricao(),
            'forstatus' => $forpagamento->getForstatus()
        ];

        $CadastrarForpagamento = new ModelsFormaPag();
        $CadastrarForpagamento->cadastrar($Dados);
        //var_dump($Dados);
    }

    public function visualizar($UserId = null) {
        $this->UserId = (int) $UserId;
        //echo 'id='.$UserId." ";
        if (!empty($this->UserId)):
            $ListarIdFormapag = new ModelsFormaPag();
            $this->Dados = $ListarIdFormapag->listarPorId($UserId);
            $CarregarView = new ConfigView("forpagamento/EditarForpagamento", $this->Dados);
            //var_dump($this->Dados);
            //echo $this->Dados[0]['grunome'];
            $CarregarView->renderizar();
        else:
            $_SESSION['msg'] = "Necessário selecionar um usuário<br>";
            $UrlDestino = URL . 'controle-usuario/index';
            header("Location: $UrlDestino");
        endif;
    }
    
     public function editarForpagamento() {

        $fordescricao = filter_input(INPUT_POST, 'fordescricao', FILTER_DEFAULT);
        $forcod = filter_input(INPUT_POST, 'forcod', FILTER_DEFAULT);

        $forpagamento = new Forpagamento();

        $forpagamento->setFordescricao($fordescricao);

        $Dados = [
            'fordescricao' => $forpagamento->getFordescricao()
        ];

        $editarForpagamento = new ModelsFormaPag();
        $editarForpagamento->alterar($Dados,$forcod);
        //var_dump($Dados);
    }
    
    public function desativarForpagamento() {
     
        $forcod = filter_input(INPUT_POST, 'forcod', FILTER_DEFAULT);
        $forstatus = filter_input(INPUT_POST, 'forstatus', FILTER_DEFAULT);
        
        $forpag = new Forpagamento();
        
        $forpag->setForstatus($forstatus);
        
        $Dados = [
            'forstatus' => $forpag->getForstatus()
        ];
        
        //var_dump($Dados);

        $AlterarForpagamento = new ModelsFormaPag();
        $AlterarForpagamento->alterar($Dados, $forcod);
        
    }

}
