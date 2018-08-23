<?php

class ControleRegDizimo {

    private $Dados;
    private $Dados_editar;
    private $UserId;

    public function index() {

        date_default_timezone_set('America/Manaus');

        $regdizpesqmes = filter_input(INPUT_POST, 'regdizpesqmes', FILTER_DEFAULT);
        $regdizpesqano = filter_input(INPUT_POST, 'regdizpesqano', FILTER_DEFAULT);

        if ($regdizpesqmes != null && $regdizpesqano != null) {

            $ano = $regdizpesqano;
            $mes = $regdizpesqmes;

            $ListarRegDizimo = new ModelsRegDizimo();
            $this->Dados = $ListarRegDizimo->listarPorMesAno($mes, $ano);
        } else {

            $ano = date('Y');
            $mes = date('m');

            $ListarRegDizimo = new ModelsRegDizimo();
            $this->Dados = $ListarRegDizimo->listarPorMesAno($mes, $ano);
        }


        $ValorDizTotal = new ModelsRegDizimo();
        $valorTotalDiz = $ValorDizTotal->ValorTotalDiz($mes, $ano);

        $ValorCultoTotal = new ModelsRegCulto();
        $valorTotalCulto = $ValorCultoTotal->ValorTotalCulto($ano, $mes);

        $ValorTotalCreditoCelula = new ModelsRegCelula();
        $valorcelcredito = $ValorTotalCreditoCelula->ValorTotalCreditoCelula($ano, $mes);

        $ListarSaldo = new ModelsCaixa();
        $caixasaldo = $ListarSaldo->listar();

        $total = $valorTotalCulto[0]['sum(regculvalor)'] + $valorTotalDiz[0]['sum(dizvalor)'];

        $this->Dados_editar = [
            'valorTotalDiz' => $valorTotalDiz,
            'valorTotalculto' => $valorTotalCulto,
            'valorcelcredito' => $valorcelcredito,
            'total' => $total,
            'caixasaldo' => $caixasaldo,
            'mes' => $mes,
            'ano' => $ano
        ];

        //echo "valor =".$this->Dados_editar['valorTotalculto'][0]['sum(regculvalor)'];
        //var_dump($this->Dados_editar);

        $CarregarView = new ConfigView("registros/RegDizimo", $this->Dados, $this->Dados_editar);

        $CarregarView->renderizar();
    }

    public function cadastrarRegDizimo() {
        $ListarMembro = new ModelsMembro();
        $this->Dados = $ListarMembro->listar();

        $ListarFormPag = new ModelsFormaPag();
        $this->Dados_editar = $ListarFormPag->listar();

        $CarregarView = new ConfigView("registros/CadRegDizmo", $this->Dados, $this->Dados_editar);
        $CarregarView->renderizar();
    }

    public function salvarRegDizimo() {

        $regdizdata = filter_input(INPUT_POST, 'regdizdata', FILTER_DEFAULT);
        $regdizformapag = filter_input(INPUT_POST, 'regdizformapag', FILTER_DEFAULT);
        $regdizvalor = filter_input(INPUT_POST, 'regdizvalor', FILTER_DEFAULT);
        $regdizmemcod = filter_input(INPUT_POST, 'regdizmemcod', FILTER_DEFAULT);
        $regdizcaixacod = 1;

        $regdizimo = new RegDizimo();

        $regdizimo->setDizdata($regdizdata);
        $regdizimo->setDizforcod($regdizformapag);
        $regdizimo->setDizvalor($regdizvalor);
        $regdizimo->setDizmemcod($regdizmemcod);
        $regdizimo->setDizcaixacod($regdizcaixacod);

        $Dados = [
            'dizdata' => $regdizimo->getDizdata(),
            'dizvalor' => $regdizimo->getDizvalor(),
            'dizmemcod' => $regdizimo->getDizmemcod(),
            'dizforcod' => $regdizimo->getDizforcod(),
            'dizcaixacod' => $regdizimo->getDizcaixacod()
        ];

        $CadastrarRegDizimo = new ModelsRegDizimo();
        $CadastrarRegDizimo->cadastrar($Dados);
        //var_dump($Dados);
    }

    public function excluirRegDizimo() {


        $regdizcod = filter_input(INPUT_POST, 'regdizcod', FILTER_DEFAULT);

        $regdizimo = new RegDizimo();

        $regdizimo->setDizcod($regdizcod);

        //echo $regdizimo->getDizcod();
        $ExcluirRegDizimo = new ModelsRegDizimo();
        $ExcluirRegDizimo->excluir($regdizimo->getDizcod());
    }

    public function visualizar($UserId = null) {
        $this->UserId = (int) $UserId;
        //echo 'id='.$UserId." ";
        if (!empty($this->UserId)):
            $ListarIdRegDizimo = new ModelsRegDizimo();
            $this->Dados = $ListarIdRegDizimo->listarPorId($UserId);

            $ListarFormPag = new ModelsFormaPag();
            $this->Dados_editar = $ListarFormPag->listar();

            $ListarMembro = new ModelsMembro();
            $this->Dados2 = $ListarMembro->listar();

            $CarregarView = new ConfigView("registros/EditRegDizimo", $this->Dados, $this->Dados_editar, $this->Dados2);
            //var_dump($this->Dados);
            //echo $this->Dados[0]['grunome'];
            $CarregarView->renderizar();
        else:
            $_SESSION['msg'] = "Necessário selecionar um usuário<br>";
            $UrlDestino = URL . 'controle-usuario/index';
            header("Location: $UrlDestino");
        endif;
    }
    
     public function editarRegDizimo() {

        $regdizforcod = filter_input(INPUT_POST, 'regdizforcod', FILTER_DEFAULT);
        $dizcod = filter_input(INPUT_POST, 'dizcod', FILTER_DEFAULT);
        $regdizmemcod = filter_input(INPUT_POST, 'regdizmemcod', FILTER_DEFAULT);
       
        $regdizimo = new RegDizimo();

        $regdizimo->setDizforcod($regdizforcod);
        $regdizimo->setDizmemcod($regdizmemcod);


        $Dados = [
            'dizmemcod' => $regdizimo->getDizmemcod(),
            'dizforcod' => $regdizimo->getDizforcod(),
        ];
        
        //var_dump($Dados);

        $AlterarRegDizimo = new ModelsRegDizimo();
        $AlterarRegDizimo->alterar($Dados,$dizcod);
        //var_dump($Dados);
    }

}
