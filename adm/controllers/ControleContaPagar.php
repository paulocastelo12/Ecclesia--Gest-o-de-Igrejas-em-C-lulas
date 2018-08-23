<?php

class ControleContaPagar {

    private $Dados;
    private $Dados2;
    private $UserId;

    public function index() {

        date_default_timezone_set('America/Manaus');

        $regdizpesqmes = filter_input(INPUT_POST, 'regdizpesqmes', FILTER_DEFAULT);
        $regdizpesqano = filter_input(INPUT_POST, 'regdizpesqano', FILTER_DEFAULT);

        if ($regdizpesqmes != null && $regdizpesqano != null) {

            $ano = $regdizpesqano;
            $mes = $regdizpesqmes;

            $ListarConta = new ModelsContaPagar();
            $this->Dados = $ListarConta->listarPorMesAno($mes, $ano);

            $ListarTotalDebitos = new ModelsDebitar_Conta();
            $this->Dados2 = $ListarTotalDebitos->listarTotalValor($ano, $mes);
        } else {

            $ano = date('Y');
            $mes = date('m');

            $ListarConta = new ModelsContaPagar();
            $this->Dados = $ListarConta->listarPorMesAno($mes, $ano);
            
            $ListarTotalDebitos = new ModelsDebitar_Conta();
            $this->Dados2 = $ListarTotalDebitos->listarTotalValor($ano, $mes);
        }

        $this->Dados_editar = [
            'mes' => $mes,
            'ano' => $ano
        ];


        //echo "valor =".$this->Dados_editar['valorTotalculto'][0]['sum(regculvalor)'];
        //var_dump($this->Dados_editar);

        $CarregarView = new ConfigView("contaPagar/ContaPagar", $this->Dados, $this->Dados_editar, $this->Dados2);

        $CarregarView->renderizar();
    }

    public function cadastrarContaPagar() {

        $ListarFornecedor = new ModelsFornecedor();
        $this->Dados = $ListarFornecedor->listar();

        $ListarTipodes = new ModelsTipoDespesa();
        $this->Dados_editar = $ListarTipodes->listar();

        $ListarFor = new ModelsFormaPag();
        $this->Dados2 = $ListarFor->listar();

        $CarregarView = new ConfigView("contaPagar/CadastrarContaPagar", $this->Dados, $this->Dados_editar, $this->Dados2);
        $CarregarView->renderizar();
    }

    public function salvarContaPagar() {

        $pagfornecod = filter_input(INPUT_POST, 'pagfornecod', FILTER_DEFAULT);
        $pagdatavenc = filter_input(INPUT_POST, 'pagdatavenc', FILTER_DEFAULT);
        $pagnumdoc = filter_input(INPUT_POST, 'pagnumdoc', FILTER_DEFAULT);
        $pagclassificacao = filter_input(INPUT_POST, 'pagclassificacao', FILTER_DEFAULT);
        $pagtipodespesa = filter_input(INPUT_POST, 'pagtipodespesa', FILTER_DEFAULT);
        $pagstatus = filter_input(INPUT_POST, 'pagstatus', FILTER_DEFAULT);
        $pagvalor = filter_input(INPUT_POST, 'pagvalor', FILTER_DEFAULT);
        $pagforcod = filter_input(INPUT_POST, 'pagforcod', FILTER_DEFAULT);
        $pagparcela = filter_input(INPUT_POST, 'pagparcela', FILTER_DEFAULT);
        $pagobservacao = filter_input(INPUT_POST, 'pagobservacao', FILTER_DEFAULT);

        $contapagar = new ContaPagar();

        $contapagar->setPagfornecod($pagfornecod);
        $contapagar->setPagdatavenc($pagdatavenc);
        $contapagar->setPagnumdoc($pagnumdoc);
        $contapagar->setPagclassificacao($pagclassificacao);
        $contapagar->setPagtipodespesa($pagtipodespesa);
        $contapagar->setPagstatus($pagstatus);
        $contapagar->setPagvalor($pagvalor);
        $contapagar->setPagforcod($pagforcod);
        $contapagar->setPagparcela($pagparcela);
        $contapagar->setPagobservacao($pagobservacao);

        // Número de parcelas
        $parcelas = $contapagar->getPagparcela();

// Separando os capos da data
// a função explode retornara um array contendo dia,mes,ano
        $data = explode('-', $contapagar->getPagdatavenc());

        sleep(1);
// Nesse looping percorro o numero de parcelas
        for ($i = 0; $i < $parcelas; $i++) {

            $total = $parcelas - $i;
            // Para cada parcela eu adiciono um mês na data
            $retorno = mktime(0, 0, 0, $data[1] + $i, $data[2], $data[0]);
            // com a função date eu converto novamente o timestamp retornado acima para string
            //$parcelas = $parcelas-1;
            //echo date('Y-m-d', $retorno);
            //echo "</br>";
            //echo "numero de parcelas: " . $total;
            //echo "</br>";


            $Dados = [
                'pagdatavenc' => date('Y-m-d', $retorno),
                'pagobservacao' => $contapagar->getPagobservacao(),
                'pagvalor' => $contapagar->getPagvalor(),
                'pagstatus' => $contapagar->getPagstatus(),
                'pagclassificacao' => $contapagar->getPagclassificacao(),
                'pagtipodescod' => $contapagar->getPagtipodespesa(),
                'pagparcela' => $total,
                'pagnumdoc' => $contapagar->getPagnumdoc(),
                'pagforcod' => $contapagar->getPagforcod(),
                'pagfornecod' => $contapagar->getPagfornecod()
            ];

            var_dump($Dados);

            $CadastrarConta = new ModelsContaPagar();
            $CadastrarConta->cadastrar($Dados);
        }
    }

    public function debitar() {
        $pagcod = filter_input(INPUT_POST, 'pagcod', FILTER_DEFAULT);
        $pagvalor = filter_input(INPUT_POST, 'pagvalor', FILTER_DEFAULT);
        $pagstatus = 'pago';

        $contapagar = new ContaPagar();

        $contapagar->setPagvalor($pagvalor);
        $contapagar->setPagstatus($pagstatus);

        $Dados = [
            'pagvalor' => $contapagar->getPagvalor(),
            'pagstatus' => $contapagar->getPagstatus()
        ];

        $AlterarStatus = new ModelsContaPagar();
        $AlterarStatus->alterarStatus($Dados, $pagcod);

        //debitar
        date_default_timezone_set('America/Manaus');
        $date = date('Y-m-d');

        $debitar = new Debitar_Conta();
        $caixacod = 1;

        $debitar->setDebvalor($pagvalor);
        $debitar->setDebdata($date);
        $debitar->setDebpagcod($pagcod);
        $debitar->setDebcaixacod($caixacod);

        $Dados2 = [
            'debvalor' => $debitar->getDebvalor(),
            'debdata' => $debitar->getDebdata(),
            'debpagcod' => $debitar->getDebpagcod(),
            'debcaixacod' => $debitar->getDebcaixacod()
        ];

        var_dump($Dados2);

        $debitar_conta = new ModelsDebitar_Conta();
        $debitar_conta->cadastrar($Dados2);
    }

    public function visualizar($UserId = null) {
        $this->UserId = (int) $UserId;
        //echo 'id='.$UserId." ";
        if (!empty($this->UserId)):
            $ListarFornecedor = new ModelsFornecedor();
            $this->Dados_editar = $ListarFornecedor->listar();

            $ListarFor = new ModelsFormaPag();
            $this->Dados2 = $ListarFor->listar();

            $ListarTipodes = new ModelsTipoDespesa();
            $this->Dados3 = $ListarTipodes->listar();

            $ListarIdContas = new ModelsContaPagar();
            $this->Dados = $ListarIdContas->listarPorId($UserId);
            $CarregarView = new ConfigView("contapagar/EditarContaPagar", $this->Dados, $this->Dados_editar, $this->Dados2, $this->Dados3);
            //var_dump($this->Dados);
            //echo $this->Dados[0]['grunome'];
            $CarregarView->renderizar();
        else:
            $_SESSION['msg'] = "Necessário selecionar um usuário<br>";
            $UrlDestino = URL . 'controle-usuario/index';
            header("Location: $UrlDestino");
        endif;
    }

    public function editarContaPagar() {

        $pagcod = filter_input(INPUT_POST, 'pagcod', FILTER_DEFAULT);
        $pagfornecod = filter_input(INPUT_POST, 'pagfornecod', FILTER_DEFAULT);
        $pagdatavenc = filter_input(INPUT_POST, 'pagdatavenc', FILTER_DEFAULT);
        $pagnumdoc = filter_input(INPUT_POST, 'pagnumdoc', FILTER_DEFAULT);
        $pagclassificacao = filter_input(INPUT_POST, 'pagclassificacao', FILTER_DEFAULT);
        $pagtipodespesa = filter_input(INPUT_POST, 'pagtipodespesa', FILTER_DEFAULT);
        $pagstatus = filter_input(INPUT_POST, 'pagstatus', FILTER_DEFAULT);
        $pagvalor = filter_input(INPUT_POST, 'pagvalor', FILTER_DEFAULT);
        $pagforcod = filter_input(INPUT_POST, 'pagforcod', FILTER_DEFAULT);
        $pagobservacao = filter_input(INPUT_POST, 'pagobservacao', FILTER_DEFAULT);

        $contapagar = new ContaPagar();

        $contapagar->setPagfornecod($pagfornecod);
        $contapagar->setPagdatavenc($pagdatavenc);
        $contapagar->setPagnumdoc($pagnumdoc);
        $contapagar->setPagclassificacao($pagclassificacao);
        $contapagar->setPagtipodespesa($pagtipodespesa);
        $contapagar->setPagstatus($pagstatus);
        $contapagar->setPagvalor($pagvalor);
        $contapagar->setPagforcod($pagforcod);
        $contapagar->setPagobservacao($pagobservacao);


        $Dados = [
            'pagdatavenc' => date($pagdatavenc),
            'pagobservacao' => $contapagar->getPagobservacao(),
            'pagvalor' => $contapagar->getPagvalor(),
            'pagstatus' => $contapagar->getPagstatus(),
            'pagclassificacao' => $contapagar->getPagclassificacao(),
            'pagtipodescod' => $contapagar->getPagtipodespesa(),
            'pagnumdoc' => $contapagar->getPagnumdoc(),
            'pagforcod' => $contapagar->getPagforcod(),
            'pagfornecod' => $contapagar->getPagfornecod()
        ];

        var_dump($Dados);

        $AlterarConta = new ModelsContaPagar();
        $AlterarConta->alterar($Dados, $pagcod);
    }

}
