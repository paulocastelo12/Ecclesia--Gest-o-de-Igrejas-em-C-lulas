<?php

class ControleFornecedor {

    private $Dados;
    private $UserId;

    public function index() {

        $ListarFornecedor = new ModelsFornecedor();

        $this->Dados = $ListarFornecedor->listar();

        $CarregarView = new ConfigView("fornecedor/Fornecedor", $this->Dados);

        $CarregarView->renderizar();
    }
    
     public function cadastrarFornecedor() {
        $CarregarView = new ConfigView("fornecedor/CadastrarFornecedor");
        $CarregarView->renderizar();
    }
    
     public function salvarFornecedor() {

        $forneidt = filter_input(INPUT_POST, 'forneidt', FILTER_DEFAULT);
        $fornedescricao = filter_input(INPUT_POST, 'fordescricao', FILTER_DEFAULT);
        $fornestatus = "Ativo";
        
        $fornecedor = new Fornecedor();
        
        $fornecedor->setForneidt($forneidt);
        $fornecedor->setFornedescricao($fornedescricao);
        $fornecedor->setFornestatus($fornestatus);

        $Dados = [
            'forneidt' => $fornecedor->getForneidt(),
            'fornedescricao' => $fornecedor->getFornedescricao(),
            'fornestatus' => $fornecedor->getFornestatus()
        ];

        $CadastrarFornecedor = new ModelsFornecedor();
        $CadastrarFornecedor->cadastrar($Dados);
        //var_dump($Dados);
    }
    
     public function visualizar($UserId = null) {
        $this->UserId =  $UserId;
        echo 'id='.$UserId." ";
        if (!empty($this->UserId)):
            $ListarIdFornecedor = new ModelsFornecedor();
            $this->Dados = $ListarIdFornecedor->listarPorId($UserId);
            $CarregarView = new ConfigView("fornecedor/EditarFornecedor", $this->Dados);
            //var_dump($this->Dados);
            //echo $this->Dados[0]['grunome'];
            $CarregarView->renderizar();
        else:
            $_SESSION['msg'] = "Necessário selecionar um usuário<br>";
            $UrlDestino = URL . 'controle-usuario/index';
            header("Location: $UrlDestino");
        endif;
    }
    
     public function editarFornecedor() {

        $fornecod = filter_input(INPUT_POST, 'fornecod', FILTER_DEFAULT);
        $forneidt = filter_input(INPUT_POST, 'forneidt', FILTER_DEFAULT);
        $fornedescricao = filter_input(INPUT_POST, 'fornedescricao', FILTER_DEFAULT);
       
        $fornecedor = new Fornecedor();
        
        $fornecedor->setFornedescricao($fornedescricao);
        $fornecedor->setForneidt($forneidt);

        $Dados = [
            'fornedescricao' => $fornecedor->getFornedescricao(),
            'forneidt' => $fornecedor->getForneidt()
        ];

        $AlterarFornecedor = new ModelsFornecedor();
        $AlterarFornecedor->alterar($Dados,$fornecod);
        //var_dump($Dados);
    }
    
     public function desativarFornecedor() {

        $fornecod = filter_input(INPUT_POST, 'fornecod', FILTER_DEFAULT);
        $fornestatus = filter_input(INPUT_POST, 'fornestatus', FILTER_DEFAULT);
        
        $fornecedor = new Fornecedor();
        
        $fornecedor->setFornestatus($fornestatus);
        
        $Dados = [
            'fornestatus' => $fornecedor->getFornestatus()
        ];

        $AlterarFornecedor = new ModelsFornecedor();
        $AlterarFornecedor->alterar($Dados, $fornecod);
        //var_dump($Dados);
    }

}
