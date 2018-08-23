<?php

class ControleRegCulto {

    private $Dados;
    private $UserId;

    public function index() {

        date_default_timezone_set('America/Manaus');

        $regculpesqmes = filter_input(INPUT_POST, 'regculpesqmes', FILTER_DEFAULT);
        $regculpesqano = filter_input(INPUT_POST, 'regculpesqano', FILTER_DEFAULT);

        if ($regculpesqmes != null && $regculpesqano != null) {

            $ano = $regculpesqano;
            $mes = $regculpesqmes;

            $ListarRegCulto = new ModelsRegCulto();
            $this->Dados = $ListarRegCulto->listar($ano, $mes);

            //var_dump($this->Dados);
        } else {

            $ano = date('Y');
            $mes = date('m');

            $ListarRegCulto = new ModelsRegCulto();
            $this->Dados = $ListarRegCulto->listar($ano, $mes);

            //var_dump($this->Dados);
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

        //echo $total;
        //$total_arrecadado = $this->Dados_editar['valorTotalculto'][0]['sum(regculvalor)'] + $this->Dados_editar['valorTotalDiz'][0]['sum(dizvalor)'];

        $this->Dados_editar = [
            'valorTotalDiz' => $valorTotalDiz,
            'valorTotalculto' => $valorTotalCulto,
            'valorcelcredito' => $valorcelcredito,
            'total' => $total,
            'caixasaldo' => $caixasaldo,
            'mes' => $mes,
            'ano' => $ano
        ];

        //var_dump($this->Dados_editar);

        $CarregarView = new ConfigView("registros/RegCulto", $this->Dados, $this->Dados_editar);

        $CarregarView->renderizar();
    }

    public function cadastrarRegCulto() {
        $ListarCulto = new ModelsCulto();
        $this->Dados = $ListarCulto->listar();

        $CarregarView = new ConfigView("registros/CadRegCulto", $this->Dados);
        $CarregarView->renderizar();
    }

    public function salvarRegCulto() {

        $regculdata = filter_input(INPUT_POST, 'regculdata', FILTER_DEFAULT);
        $regculcultocod = filter_input(INPUT_POST, 'regculcod', FILTER_DEFAULT);
        $regculvalor = filter_input(INPUT_POST, 'regculvalor', FILTER_DEFAULT);
        $regculcaixacod = 1;

        $regculto = new RegCulto();

        $regculto->setRegculdata($regculdata);
        $regculto->setRegculcultocod($regculcultocod);
        $regculto->setRegculvalor($regculvalor);
        $regculto->setRegcaixacod($regculcaixacod);

        $Dados = [
            'regculdata' => $regculto->getRegculdata(),
            'regculvalor' => $regculto->getRegculvalor(),
            'regculcultocod' => $regculto->getRegculcultocod(),
            'regcaixacod' => $regculto->getRegcaixacod()
        ];

        //var_dump($Dados);

        $CadastrarRegCulto = new ModelsRegCulto();
        $CadastrarRegCulto->cadastrar($Dados);
    }

    public function excluirRegCulto() {

        $regculcod = filter_input(INPUT_POST, 'regculcod', FILTER_DEFAULT);

        $regculto = new RegCulto();

        $regculto->setRegcod($regculcod);

        //echo $regdizimo->getDizcod();
        $ExcluirRegCulto = new ModelsRegCulto();
        $ExcluirRegCulto->excluir($regculto->getRegcod());
    }

    public function visualizar($UserId = null) {
        $this->UserId = (int) $UserId;
        //echo 'id='.$UserId." ";
        if (!empty($this->UserId)):
            $ListarRegCulto = new ModelsRegCulto();
            $this->Dados = $ListarRegCulto->listarPorId($UserId);

            $ListarCulto = new ModelsCulto();
            $this->Dados_editar = $ListarCulto->listar();

            $CarregarView = new ConfigView("registros/EditRegCulto", $this->Dados, $this->Dados_editar);
            //var_dump($this->Dados);
            //echo $this->Dados[0]['grunome'];
            $CarregarView->renderizar();
        else:
            $_SESSION['msg'] = "Necessário selecionar um usuário<br>";
            $UrlDestino = URL . 'controle-usuario/index';
            header("Location: $UrlDestino");
        endif;
    }

    public function editarRegCulto() {

        $regcod = filter_input(INPUT_POST, 'regcod', FILTER_DEFAULT);
        $regculdata = filter_input(INPUT_POST, 'regculdata', FILTER_DEFAULT);
        $regculcultocod = filter_input(INPUT_POST, 'regculcod', FILTER_DEFAULT);
        

        $regculto = new RegCulto();

        $regculto->setRegculdata($regculdata);
        $regculto->setRegculcultocod($regculcultocod);

        $Dados = [
            'regculdata' => $regculto->getRegculdata(),
            'regculcultocod' => $regculto->getRegculcultocod()
        ];

        $AlterarRegCulto = new ModelsRegCulto();
        $AlterarRegCulto->alterar($Dados, $regcod);
    }

}
