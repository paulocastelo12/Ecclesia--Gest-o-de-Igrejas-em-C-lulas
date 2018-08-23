<?php

class ControleCelula {

    private $Dados;
    private $Dados_editar;
    private $UserId;

    public function index() {

        $ListarCelula = new ModelsCelula();

        $this->Dados = $ListarCelula->listar();

        $CarregarView = new ConfigView("celula/Celula", $this->Dados);

        $CarregarView->renderizar();
    }

    public function cadastrarCelula() {
        $ListarMembro = new ModelsMembro();
        $this->Dados = $ListarMembro->listar();

        $CarregarView = new ConfigView("celula/CadastrarCelula", $this->Dados);
        $CarregarView->renderizar();
    }

    public function salvarCelula() {

        $celdescricao = filter_input(INPUT_POST, 'celdescricao', FILTER_DEFAULT);
        $celclassificacao = filter_input(INPUT_POST, 'celclassificacao', FILTER_DEFAULT);
        $celanfitriao = filter_input(INPUT_POST, 'celanfitriao', FILTER_DEFAULT);
        $celmemcod = filter_input(INPUT_POST, 'celmemcod', FILTER_DEFAULT);
        $celstatus = 'Ativo';

        $celula = new Celula();

        $celula->setCeldescricao($celdescricao);
        $celula->setCelclassificacao($celclassificacao);
        $celula->setCelanfitriao($celanfitriao);
        $celula->setCelstatus($celstatus);
        $celula->setCelmemcod($celmemcod);

        $Dados = [
            'celdescricao' => $celula->getCeldescricao(),
            'celclassificacao' => $celula->getCelclassificacao(),
            'celanfitriao' => $celula->getCelanfitriao(),
            'celmemcod' => $celula->getCelmemcod(),
            'celstatus' => $celula->getCelstatus()
        ];

        $CadastrarCelula = new ModelsCelula();
        $CadastrarCelula->cadastrar($Dados);
        //var_dump($Dados);
    }

    public function visualizar($UserId = null) {
        $this->UserId = (int) $UserId;
        //echo 'id='.$UserId." ";
        if (!empty($this->UserId)):
            $ListarIdCelula = new ModelsCelula();
            $this->Dados = $ListarIdCelula->listarPorId($UserId);

            $ListarMembro = new ModelsMembro();
            $this->Dados_editar = $ListarMembro->listar();

            $CarregarView = new ConfigView("celula/EditarCelula", $this->Dados, $this->Dados_editar);
            //var_dump($this->Dados);
            //echo $this->Dados[0]['grunome'];
            $CarregarView->renderizar();


        else:
            $_SESSION['msg'] = "Necessário selecionar um usuário<br>";
            $UrlDestino = URL . 'controle-usuario/index';
            header("Location: $UrlDestino");
        endif;
    }

    public function editarCelula() {

        $celcod = filter_input(INPUT_POST, 'celcod', FILTER_DEFAULT);
        $celdescricao = filter_input(INPUT_POST, 'celdescricao', FILTER_DEFAULT);
        $celclassificacao = filter_input(INPUT_POST, 'celclassificacao', FILTER_DEFAULT);
        $celanfitriao = filter_input(INPUT_POST, 'celanfitriao', FILTER_DEFAULT);
        $celmemcod = filter_input(INPUT_POST, 'celmemcod', FILTER_DEFAULT);
        $celstatus = 'Ativo';

        $celula = new Celula();

        $celula->setCeldescricao($celdescricao);
        $celula->setCelclassificacao($celclassificacao);
        $celula->setCelanfitriao($celanfitriao);
        $celula->setCelstatus($celstatus);
        $celula->setCelmemcod($celmemcod);

        $Dados = [
            'celdescricao' => $celula->getCeldescricao(),
            'celclassificacao' => $celula->getCelclassificacao(),
            'celanfitriao' => $celula->getCelanfitriao(),
            'celmemcod' => $celula->getCelmemcod(),
            'celstatus' => $celula->getCelstatus()
        ];

        $EditarCelula = new ModelsCelula();
        $EditarCelula->alterar($Dados, $celcod);
        //var_dump($Dados);
    }

    public function desativarCelula() {

        $celcod = filter_input(INPUT_POST, 'celcod', FILTER_DEFAULT);
        $celstatus = filter_input(INPUT_POST, 'celstatus', FILTER_DEFAULT);

        $celula = new Celula();

        $celula->setCelstatus($celstatus);

        $Dados = [
            'celstatus' => $celula->getCelstatus()
        ];

        $AlterarCelula = new ModelsCelula();
        $AlterarCelula->alterar($Dados, $celcod);
        //var_dump($Dados);
    }

}
