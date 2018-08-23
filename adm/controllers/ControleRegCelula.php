<?php

class ControleRegCelula {

    private $Dados;
    private $UserId;

    public function index() {

        //$ListarCulto = new ModelsCulto();
        // $this->Dados = $ListarCulto->listar();

        date_default_timezone_set('America/Manaus');

        $regdizpesqmes = filter_input(INPUT_POST, 'regdizpesqmes', FILTER_DEFAULT);
        $regdizpesqano = filter_input(INPUT_POST, 'regdizpesqano', FILTER_DEFAULT);

        if ($regdizpesqmes != null && $regdizpesqano != null) {

            $ano = $regdizpesqano;
            $mes = $regdizpesqmes;

            $ListarRegCelula = new ModelsRegCelula();
            $this->Dados = $ListarRegCelula->listarPorMesAno($mes, $ano);
        } else {

            $ano = date('Y');
            $mes = date('m');

            $ListarRegCelula = new ModelsRegCelula();
            $this->Dados = $ListarRegCelula->listarPorMesAno($mes, $ano);
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

        $CarregarView = new ConfigView("registros/RegCelula", $this->Dados, $this->Dados_editar);

        $CarregarView->renderizar();
    }

    public function creditar() {
        $regcelcod = filter_input(INPUT_POST, 'regcelcod', FILTER_DEFAULT);
        $regcelvalor = filter_input(INPUT_POST, 'regcelvalor', FILTER_DEFAULT);
        $regcelstatus_valor = 'pago';

        $regcelula = new RegCelula();

        $regcelula->setRegcelvalor($regcelvalor);
        $regcelula->setRegcelstatus_valor($regcelstatus_valor);

        $Dados = [
            'regcelvalor' => $regcelula->getRegcelvalor(),
            'regcelstatus_valor' => $regcelula->getRegcelstatus_valor()
        ];

        $AlterarStatus = new ModelsRegCelula();
        $AlterarStatus->alterarStatus($Dados, $regcelcod);

        //creditar
        date_default_timezone_set('America/Manaus');
        $date = date('Y-m-d');

        $creditar = new Creditar_Celula();
        $caixacod = 1;

        $creditar->setCredvalor($regcelvalor);
        $creditar->setCreddata($date);
        $creditar->setCredregcelcod($regcelcod);
        $creditar->setCredcaixacod($caixacod);

        $Dados2 = [
            'credvalor' => $creditar->getCredvalor(),
            'creddata' => $creditar->getCreddata(),
            'credregcelcod' => $creditar->getCredregcelcod(),
            'credcaixacod' => $creditar->getCredcaixacod()
        ];

        $Creditar = new ModelsCreditar_Celula();
        $Creditar->cadastrar($Dados2);
    }

    function cadastrarRegCelula() {
        $ListarCelula = new ModelsCelula();
        $this->Dados = $ListarCelula->listar();

        $CarregarView = new ConfigView("registros/CadRegCelula", $this->Dados);
        $CarregarView->renderizar();
    }

    public function salvarRegCelula() {

        $regcelcelulacod = filter_input(INPUT_POST, 'regcelcelulacod', FILTER_DEFAULT);
        $regceldata_registro = filter_input(INPUT_POST, 'regceldata_registro', FILTER_DEFAULT);
        $regceldata_realizacao = filter_input(INPUT_POST, 'regceldata_realizacao', FILTER_DEFAULT);
        $regcelstatus_registro = filter_input(INPUT_POST, 'regcelstatus_registro', FILTER_DEFAULT);
        $regcelqtd_participantes = filter_input(INPUT_POST, 'regcelqtd_participantes', FILTER_DEFAULT);
        $regcelqtd_conversoes = filter_input(INPUT_POST, 'regcelqtd_conversoes', FILTER_DEFAULT);
        $regcelvalor = filter_input(INPUT_POST, 'regcelvalor', FILTER_DEFAULT);
        if ($regcelstatus_registro == "Houve") {
            $regcelstatus_valor = 'pendente';
        } else {
            $regcelstatus_valor = 'pago';
        }


        $regcelula = new RegCelula();

        $regcelula->setRegcelcelulacod($regcelcelulacod);
        $regcelula->setRegceldata_registro($regceldata_registro);
        $regcelula->setRegceldata_realizacao($regceldata_realizacao);
        $regcelula->setRegcelstatus_registro($regcelstatus_registro);
        $regcelula->setRegcelqtd_participantes($regcelqtd_participantes);
        $regcelula->setRegcelqtd_conversoes($regcelqtd_conversoes);
        $regcelula->setRegcelvalor($regcelvalor);
        $regcelula->setRegcelstatus_valor($regcelstatus_valor);

        $Dados = [
            'regcelcelulacod' => $regcelula->getRegcelcelulacod(),
            'regceldata_registro' => $regcelula->getRegceldata_registro(),
            'regceldata_realizacao' => $regcelula->getRegceldata_realizacao(),
            'regcelstatus_registro' => $regcelula->getRegcelstatus_registro(),
            'regcelqdt_participantes' => $regcelula->getRegcelqtd_participantes(),
            'regcelqtd_conversoes' => $regcelula->getRegcelqtd_conversoes(),
            'regcelvalor' => $regcelula->getRegcelvalor(),
            'regcelstatus_valor' => $regcelula->getRegcelstatus_valor(),
        ];

        $CadastrarRegCelula = new ModelsRegCelula();
        $CadastrarRegCelula->cadastrar($Dados);
        //var_dump($Dados);
    }

    public function visualizar($UserId = null) {
        $this->UserId = (int) $UserId;
        //echo 'id='.$UserId." ";
        if (!empty($this->UserId)):
            $ListarCelula = new ModelsCelula();
            $this->Dados_editar = $ListarCelula->listar();

            $ListarIdRegCelula = new ModelsRegCelula();
            $this->Dados = $ListarIdRegCelula->listarId($UserId);
            $CarregarView = new ConfigView("registros/EditRegCelula", $this->Dados, $this->Dados_editar );
            //var_dump($this->Dados);
            //echo $this->Dados[0]['grunome'];
            $CarregarView->renderizar();
        else:
            $_SESSION['msg'] = "Necessário selecionar um usuário<br>";
            $UrlDestino = URL . 'controle-usuario/index';
            header("Location: $UrlDestino");
        endif;
    }
    
    public function editarRegCelula() {

        $regcelcod = filter_input(INPUT_POST, 'regcelcod', FILTER_DEFAULT);
        $regcelcelulacod = filter_input(INPUT_POST, 'regcelcelulacod', FILTER_DEFAULT);
        $regceldata_registro = filter_input(INPUT_POST, 'regceldata_registro', FILTER_DEFAULT);
        $regceldata_realizacao = filter_input(INPUT_POST, 'regceldata_realizacao', FILTER_DEFAULT);
        $regcelstatus_registro = filter_input(INPUT_POST, 'regcelstatus_registro', FILTER_DEFAULT);
        $regcelqtd_participantes = filter_input(INPUT_POST, 'regcelqtd_participantes', FILTER_DEFAULT);
        $regcelqtd_conversoes = filter_input(INPUT_POST, 'regcelqtd_conversoes', FILTER_DEFAULT);
        $regcelvalor = filter_input(INPUT_POST, 'regcelvalor', FILTER_DEFAULT);
        if ($regcelstatus_registro == "Houve") {
            $regcelstatus_valor = 'pendente';
        } else {
            $regcelstatus_valor = 'pago';
        }

        $regcelula = new RegCelula();

        $regcelula->setRegcelcelulacod($regcelcelulacod);
        $regcelula->setRegceldata_registro($regceldata_registro);
        $regcelula->setRegceldata_realizacao($regceldata_realizacao);
        $regcelula->setRegcelstatus_registro($regcelstatus_registro);
        $regcelula->setRegcelqtd_participantes($regcelqtd_participantes);
        $regcelula->setRegcelqtd_conversoes($regcelqtd_conversoes);
        $regcelula->setRegcelvalor($regcelvalor);
        $regcelula->setRegcelstatus_valor($regcelstatus_valor);

        $Dados = [
            'regcelcelulacod' => $regcelula->getRegcelcelulacod(),
            'regceldata_registro' => $regcelula->getRegceldata_registro(),
            'regceldata_realizacao' => $regcelula->getRegceldata_realizacao(),
            'regcelstatus_registro' => $regcelula->getRegcelstatus_registro(),
            'regcelqdt_participantes' => $regcelula->getRegcelqtd_participantes(),
            'regcelqtd_conversoes' => $regcelula->getRegcelqtd_conversoes(),
            'regcelvalor' => $regcelula->getRegcelvalor(),
            'regcelstatus_valor' => $regcelula->getRegcelstatus_valor(),
        ];

        $AlterarRegCelula = new ModelsRegCelula();
        $AlterarRegCelula->alterar($Dados, $regcelcod);
        //var_dump($Dados);
    }

}
