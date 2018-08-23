<?php


class ControleCargo {

    private $Dados;
    private $UserId;

    public function index() {

        $ListarCargo = new ModelsCargo();
        $this->Dados = $ListarCargo->listar();

        $CarregarView = new ConfigView("cargo/Cargo", $this->Dados);

        $CarregarView->renderizar();
    }

    public function cadastrarCargo() {
        $CarregarView = new ConfigView("cargo/CadastrarCargo");
        $CarregarView->renderizar();
    }

    public function salvarCargo() {

        $cardescricao = filter_input(INPUT_POST, 'cardescricao', FILTER_DEFAULT);
        $carstatus = "Ativo";
        
        $cargo = new Cargo();
        
        $cargo->setCardescricao($cardescricao);
        $cargo->setCarstatus($carstatus);

        $Dados = [
            'cardescricao' => $cargo->getCardescricao(),
            'carstatus' => $cargo->getCarstatus()
        ];

        $CadastrarCargo = new ModelsCargo();
        $CadastrarCargo->cadastrar($Dados);
        //var_dump($Dados);
    }
    
     public function visualizar($UserId = null) {
        $this->UserId = (int) $UserId;
        //echo 'id='.$UserId." ";
        if (!empty($this->UserId)):
            $ListarIdCargo = new ModelsCargo();
            $this->Dados = $ListarIdCargo->listarPorId($UserId);
            $CarregarView = new ConfigView("cargo/EditarCargo", $this->Dados);
            //var_dump($this->Dados);
            //echo $this->Dados[0]['grunome'];
            $CarregarView->renderizar();
        else:
            $_SESSION['msg'] = "Necessário selecionar um usuário<br>";
            $UrlDestino = URL . 'controle-usuario/index';
            header("Location: $UrlDestino");
        endif;
    }
    
    public function editarCargo() {

        $carcod = filter_input(INPUT_POST, 'carcod', FILTER_DEFAULT);
        $cardescricao = filter_input(INPUT_POST, 'cardescricao', FILTER_DEFAULT);
       
        $cargo = new Cargo();
        
        $cargo->setCardescricao($cardescricao);

        $Dados = [
            'cardescricao' => $cargo->getCardescricao()
        ];

        $AlterarCargo = new ModelsCargo();
        $AlterarCargo->alterar($Dados,$carcod);
        //var_dump($Dados);
    }
    
     public function desativarCargo() {

        $carcod = filter_input(INPUT_POST, 'carcod', FILTER_DEFAULT);
        $carstatus = filter_input(INPUT_POST, 'carstatus', FILTER_DEFAULT);
        
        $cargo = new Cargo();
        
        $cargo->setCarstatus($carstatus);
        
        $Dados = [
            'carstatus' => $cargo->getCarstatus()
        ];

        $AlterarCargo = new ModelsCargo();
        $AlterarCargo->alterar($Dados, $carcod);
        //var_dump($Dados);
    }

}
