<?php

class ControleFuncionario {

    private $Dados;
    private $UserId;

    public function index() {

        $ListarFuncionario = new ModelsFuncionario();

        $this->Dados = $ListarFuncionario->listar();

        $CarregarView = new ConfigView("funcionario/Funcionario", $this->Dados);

        $CarregarView->renderizar();
    }

    public function cadastrarFuncionario() {
        $ListarCargo = new ModelsCargo();
        $this->Dados = $ListarCargo->listar();

        $CarregarView = new ConfigView("funcionario/CadastrarFuncionario", $this->Dados);
        $CarregarView->renderizar();
    }

    public function salvarFuncionario() {

        $funnome = filter_input(INPUT_POST, 'funnome', FILTER_DEFAULT);
        $funrg = filter_input(INPUT_POST, 'funrg', FILTER_DEFAULT);
        $funcpf = filter_input(INPUT_POST, 'funcpf', FILTER_DEFAULT);
        $funsexo = filter_input(INPUT_POST, 'funsexo', FILTER_DEFAULT);
        $funestadocivil = filter_input(INPUT_POST, 'funestadocivil', FILTER_DEFAULT);
        $fundtnasc = filter_input(INPUT_POST, 'fundtnasc', FILTER_DEFAULT);
        $fundtadmissao = filter_input(INPUT_POST, 'fundtadmissao', FILTER_DEFAULT);
        $funstatus = "Ativo";
        $funcarcod = filter_input(INPUT_POST, 'funcarcod', FILTER_DEFAULT);

        $confunemail = filter_input(INPUT_POST, 'confunemail', FILTER_DEFAULT);
        $confuntelefone = filter_input(INPUT_POST, 'confuntelefone', FILTER_DEFAULT);
        
        $funcionario = new Funcionario();

        $funcionario->setFunnome($funnome);
        $funcionario->setFunrg($funrg);
        $funcionario->setFuncpf($funcpf);
        $funcionario->setFunsexo($funsexo);
        $funcionario->setFunestadocivil($funestadocivil);
        $funcionario->setFundtnasc($fundtnasc);
        $funcionario->setFundtadmissao($fundtadmissao);
        $funcionario->setFunstatus($funstatus);
        $funcionario->setFuncarcod($funcarcod);
     

        $Dados = [
            'funnome' => $funcionario->getFunnome(),
            'funrg' => $funcionario->getFunrg(),
            'funcpf' => $funcionario->getFuncpf(),
            'funsexo' => $funcionario->getFunsexo(),
            'funestadocivil' => $funcionario->getFunestadocivil(),
            'fundtnasc' => $funcionario->getFundtnasc(),
            'fundtadmissao' => $funcionario->getFundtadmissao(),
            'funstatus' => $funcionario->getFunstatus(),
            'funcarcod' => $funcionario->getFuncarcod() 
        ];
        
        //var_dump($Dados);

        $CadastrarFuncionario = new ModelsFuncionario();
        $CadastrarFuncionario->cadastrar($Dados);
        //var_dump($Dados);
           
        //Retornar id Membro

        $ListarFuncionario = new ModelsFuncionario();

        $this->Dados = $ListarFuncionario->listarPorNome($funnome);

        //Salvar Contato
        foreach ($this->Dados as $funcionario) {
            $confuncionariocod = $funcionario['funcod']; 
        }
        
         $contatofun = new ContatoFuncionario();

        $contatofun->setConfunemail($confunemail);
        $contatofun->setConfuntelefone($confuntelefone);
        $contatofun->setConfuncionariocod($confuncionariocod);

        $Dados2 = [
            'confuncionariocod' => $contatofun->getConfuncionariocod(),
            'confunemail' => $contatofun->getConfunemail(),
            'confuntelefone' => $contatofun->getConfuntelefone()
        ];

        $CadastrarContatofun = new ModelsContatoFuncionario();
        $CadastrarContatofun->cadastrar($Dados2);
    }
    
     public function visualizar($UserId = null) {
        $this->UserId = (int) $UserId;
        //echo 'id=' . $UserId . " ";
        if (!empty($this->UserId)):
            $ListarIdFuncionario = new ModelsFuncionario();
            $this->Dados = $ListarIdFuncionario->listarPorId($UserId);
            
            //var_dump($this->Dados);

            $ListarCargo = new ModelsCargo();
            $this->Dados_editar = $ListarCargo->listar();

            $CarregarView = new ConfigView("funcionario/EditarFuncionario", $this->Dados, $this->Dados_editar);
            //var_dump($this->Dados);
            //echo $this->Dados[0]['memnome'];
            $CarregarView->renderizar();
        else:
            $_SESSION['msg'] = "Necessário selecionar um usuário<br>";
            $UrlDestino = URL . 'controle-usuario/index';
            header("Location: $UrlDestino");
        endif;
    }
    
    public function editarFuncionario() {

        $funnome = filter_input(INPUT_POST, 'funnome', FILTER_DEFAULT);
        $funcod = filter_input(INPUT_POST, 'funcod', FILTER_DEFAULT);
        $funrg = filter_input(INPUT_POST, 'funrg', FILTER_DEFAULT);
        $funcpf = filter_input(INPUT_POST, 'funcpf', FILTER_DEFAULT);
        $funsexo = filter_input(INPUT_POST, 'funsexo', FILTER_DEFAULT);
        $funestadocivil = filter_input(INPUT_POST, 'funestadocivil', FILTER_DEFAULT);
        $fundtnasc = filter_input(INPUT_POST, 'fundtnasc', FILTER_DEFAULT);
        $fundtadmissao = filter_input(INPUT_POST, 'fundtadmissao', FILTER_DEFAULT);
        $funstatus = "Ativo";
        $funcarcod = filter_input(INPUT_POST, 'funcarcod', FILTER_DEFAULT);

        $confuncod = filter_input(INPUT_POST, 'confuncod', FILTER_DEFAULT);
        $confunemail = filter_input(INPUT_POST, 'confunemail', FILTER_DEFAULT);
        $confuntelefone = filter_input(INPUT_POST, 'confuntelefone', FILTER_DEFAULT);
        
        $funcionario = new Funcionario();

        $funcionario->setFunnome($funnome);
        $funcionario->setFunrg($funrg);
        $funcionario->setFuncpf($funcpf);
        $funcionario->setFunsexo($funsexo);
        $funcionario->setFunestadocivil($funestadocivil);
        $funcionario->setFundtnasc($fundtnasc);
        $funcionario->setFundtadmissao($fundtadmissao);
        $funcionario->setFunstatus($funstatus);
        $funcionario->setFuncarcod($funcarcod);
     

        $Dados = [
            'funnome' => $funcionario->getFunnome(),
            'funrg' => $funcionario->getFunrg(),
            'funcpf' => $funcionario->getFuncpf(),
            'funsexo' => $funcionario->getFunsexo(),
            'funestadocivil' => $funcionario->getFunestadocivil(),
            'fundtnasc' => $funcionario->getFundtnasc(),
            'fundtadmissao' => $funcionario->getFundtadmissao(),
            'funstatus' => $funcionario->getFunstatus(),
            'funcarcod' => $funcionario->getFuncarcod() 
        ];
        
        //var_dump($Dados);

        $AlterarFuncionario = new ModelsFuncionario();
        $AlterarFuncionario->alterar($Dados, $funcod);
        //var_dump($Dados);
         
        $contatofun = new ContatoFuncionario();

        $contatofun->setConfunemail($confunemail);
        $contatofun->setConfuntelefone($confuntelefone);
       
        $Dados2 = [
            'confunemail' => $contatofun->getConfunemail(),
            'confuntelefone' => $contatofun->getConfuntelefone()
        ];

        $AlterarContatofun = new ModelsContatoFuncionario();
        $AlterarContatofun->alterar($Dados2,$confuncod);
    }

}
