<?php

class ControleGrupo {

    private $Dados;
    private $UserId;

    public function index() {

        $ListarGrupo = new ModelsGrupo();

        $this->Dados = $ListarGrupo->listar();

        $CarregarView = new ConfigView("grupo/Grupo", $this->Dados);

        $CarregarView->renderizar();
    }

    public function cadastrarGrupo() {
        $CarregarView = new ConfigView("grupo/CadastrarGrupo");
        $CarregarView->renderizar();
    }

    /* public function jsonGrupo() {

      $ListarGrupo = new ModelsGrupo();

      $this->Dados = $ListarGrupo->listar();

      $CarregarView = new ConfigView("grupo/getDados", $this->Dados);

      $CarregarView->renderizar_json();
      } */

    public function teste() {

        $ListarGrupo = new ModelsGrupo();

        $this->Dados = $ListarGrupo->listar();

        $CarregarView = new ConfigView("grupo/listaGrupo", $this->Dados);

        $CarregarView->renderizar_lista();
    }

    public function salvarGrupo() {

        $grunome = filter_input(INPUT_POST, 'grunome', FILTER_DEFAULT);
        $gruresponsavel1 = filter_input(INPUT_POST, 'gruresponsavel1', FILTER_DEFAULT);
        $gruresponsavel2 = filter_input(INPUT_POST, 'gruresponsavel2', FILTER_DEFAULT);
        $gruemail = filter_input(INPUT_POST, 'gruemail', FILTER_DEFAULT);
        $grustatus = "Ativo";

        $grupo = new Grupo();

        $grupo->setNome($grunome);
        $grupo->setResponsavel1($gruresponsavel1);
        $grupo->setResponsavel2($gruresponsavel2);
        $grupo->setEmail($gruemail);
        $grupo->setStatus($grustatus);

        $Dados = [
            'grunome' => $grupo->getNome(),
            'gruresponsavel1' => $grupo->getResponsavel1(),
            'gruresponsavel2' => $grupo->getResponsavel2(),
            'gruemail' => $grupo->getEmail(),
            'grustatus' => $grupo->getStatus()
        ];

        $CadastrarGrupo = new ModelsGrupo();
        $CadastrarGrupo->cadastrar($Dados);
        //var_dump($Dados);
    }

    public function visualizar($UserId = null) {
        $this->UserId = (int) $UserId;
        //echo 'id='.$UserId." ";
        if (!empty($this->UserId)):
            $ListarIdGrupo = new ModelsGrupo();
            $this->Dados = $ListarIdGrupo->listarPorId($UserId);
            $CarregarView = new ConfigView("grupo/EditarGrupo", $this->Dados);
            //var_dump($this->Dados);
            //echo $this->Dados[0]['grunome'];
            $CarregarView->renderizar();
        else:
            $_SESSION['msg'] = "Necessário selecionar um usuário<br>";
            $UrlDestino = URL . 'controle-usuario/index';
            header("Location: $UrlDestino");
        endif;
    }

    public function editarGrupo() {

        $grucod = filter_input(INPUT_POST, 'grucod', FILTER_DEFAULT);
        $grunome = filter_input(INPUT_POST, 'grunome', FILTER_DEFAULT);
        $gruresponsavel1 = filter_input(INPUT_POST, 'gruresponsavel1', FILTER_DEFAULT);
        $gruresponsavel2 = filter_input(INPUT_POST, 'gruresponsavel2', FILTER_DEFAULT);
        $gruemail = filter_input(INPUT_POST, 'gruemail', FILTER_DEFAULT);
        $grustatus = "Ativo";

        $grupo = new Grupo();

        $grupo->setNome($grunome);
        $grupo->setResponsavel1($gruresponsavel1);
        $grupo->setResponsavel2($gruresponsavel2);
        $grupo->setEmail($gruemail);
        $grupo->setStatus($grustatus);

        $Dados = [
            'grunome' => $grupo->getNome(),
            'gruresponsavel1' => $grupo->getResponsavel1(),
            'gruresponsavel2' => $grupo->getResponsavel2(),
            'gruemail' => $grupo->getEmail(),
            'grustatus' => $grupo->getStatus()
        ];

        $AlterarGrupo = new ModelsGrupo();
        $AlterarGrupo->alterar($Dados, $grucod);
        //var_dump($Dados);
    }

    public function desativarGrupo() {

        $grucod = filter_input(INPUT_POST, 'grucod', FILTER_DEFAULT);
        $grustatus = filter_input(INPUT_POST, 'grustatus', FILTER_DEFAULT);
        
        $grupo = new Grupo();
        
        $grupo->setStatus($grustatus);
        
        $Dados = [
            'grustatus' => $grupo->getStatus()
        ];

        $AlterarGrupo = new ModelsGrupo();
        $AlterarGrupo->alterar($Dados, $grucod);
        //var_dump($Dados);
    }

}
