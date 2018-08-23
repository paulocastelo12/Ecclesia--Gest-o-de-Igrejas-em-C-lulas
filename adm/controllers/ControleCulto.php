<?php

class ControleCulto {

    private $Dados;
    private $UserId;

    public function index() {

        $ListarCulto = new ModelsCulto();

        $this->Dados = $ListarCulto->listar();

        $CarregarView = new ConfigView("culto/Culto", $this->Dados);

        $CarregarView->renderizar();
    }

    public function cadastrarCulto() {
        $CarregarView = new ConfigView("culto/CadastrarCulto");
        $CarregarView->renderizar();
    }

    public function salvarCulto() {

        $culdescricao = filter_input(INPUT_POST, 'culdescricao', FILTER_DEFAULT);
        $culdia_semana = filter_input(INPUT_POST, 'culdia_semana', FILTER_DEFAULT);
        $culhorario_inicio = filter_input(INPUT_POST, 'culhorario_inicio', FILTER_DEFAULT);
        $culhorario_final = filter_input(INPUT_POST, 'culhorario_final', FILTER_DEFAULT);
        $culstatus = 'Ativado';

        $culto = new Culto();

        $culto->setCuldescricao($culdescricao);
        $culto->setCuldia_semana($culdia_semana);
        $culto->setCulhorario_inicio($culhorario_inicio);
        $culto->setCulhorario_final($culhorario_final);
        $culto->setCulstatus($culstatus);

        $Dados = [
            'culdescricao' => $culto->getCuldescricao(),
            'culdia_semana' => $culto->getCuldia_semana(),
            'culhorario_inicio' => $culto->getCulhorario_inicio(),
            'culhorario_fial' => $culto->getCulhorario_final(),
            'culstatus' => $culto->getCulstatus()
        ];


        $CadastrarCulto = new ModelsCulto();
        $CadastrarCulto->cadastrar($Dados);
        //var_dump($Dados);
    }

    public function visualizar($UserId = null) {
        $this->UserId = (int) $UserId;
        //echo 'id='.$UserId." ";
        if (!empty($this->UserId)):
            $ListarIdCulto = new ModelsCulto();
            $this->Dados = $ListarIdCulto->listarPorId($UserId);
            $CarregarView = new ConfigView("culto/EditarCulto", $this->Dados);
            //var_dump($this->Dados);
            //echo $this->Dados[0]['grunome'];
            $CarregarView->renderizar();
        else:
            $_SESSION['msg'] = "Necessário selecionar um usuário<br>";
            $UrlDestino = URL . 'controle-usuario/index';
            header("Location: $UrlDestino");
        endif;
    }

    public function editarCulto() {

        $culcod = filter_input(INPUT_POST, 'culcod', FILTER_DEFAULT);
        $culdescricao = filter_input(INPUT_POST, 'culdescricao', FILTER_DEFAULT);
        $culdia_semana = filter_input(INPUT_POST, 'culdia_semana', FILTER_DEFAULT);
        $culhorario_inicio = filter_input(INPUT_POST, 'culhorario_inicio', FILTER_DEFAULT);
        $culhorario_final = filter_input(INPUT_POST, 'culhorario_final', FILTER_DEFAULT);
        $culstatus = 'Ativado';

        $culto = new Culto();

        $culto->setCuldescricao($culdescricao);
        $culto->setCuldia_semana($culdia_semana);
        $culto->setCulhorario_inicio($culhorario_inicio);
        $culto->setCulhorario_final($culhorario_final);
        $culto->setCulstatus($culstatus);

        $Dados = [
            'culdescricao' => $culto->getCuldescricao(),
            'culdia_semana' => $culto->getCuldia_semana(),
            'culhorario_inicio' => $culto->getCulhorario_inicio(),
            'culhorario_fial' => $culto->getCulhorario_final(),
            'culstatus' => $culto->getCulstatus()
        ];

        $EditarCulto = new ModelsCulto();
        $EditarCulto->alterar($Dados, $culcod);
        //var_dump($Dados);
    }

    public function desativarCulto() {

        $culcod = filter_input(INPUT_POST, 'culcod', FILTER_DEFAULT);
        $culstatus = filter_input(INPUT_POST, 'culstatus', FILTER_DEFAULT);

        $culto = new Culto();

        $culto->setCulstatus($culstatus);

        $Dados = [
            'culstatus' => $culto->getCulstatus()
        ];

        $AlterarCulto = new ModelsCulto();
        $AlterarCulto->alterar($Dados, $culcod);
        //var_dump($Dados);
    }

}
