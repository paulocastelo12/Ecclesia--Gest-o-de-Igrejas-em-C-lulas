<?php

class ControleLogin {

    private $Dados;

    public function login() {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['SendLogin'])):
            unset($this->Dados['SendLogin']);

            //var_dump($this->Dados);

            $Login = new ModelsLogin;
            $Login->logar($this->Dados);
            if (!$Login->getResultado()):
                $_SESSION['Msg'] = $Login->getMsg();
            else:
                $this->Dados = $Login->getResultado();
                if ($this->Dados[0]['usunivel'] == 2):
                    $_SESSION['idt'] = $this->Dados[0]['usucod'];
                    $_SESSION['nome'] = $this->Dados[0]['usunome'];
                    $_SESSION['email'] = $this->Dados[0]['usuemail'];
                    //echo "ID".$_SESSION['id'];
                    //echo $this->Dados[0]['usucod'];

                    $UrlDestino = URL . 'controle-home/index';
                    header("Location: $UrlDestino");
                //var_dump($this->Dados);
                    else:
                       $_SESSION['Msg'] = "<div class = 'alert alert-danger'>Desculpe! Você não é um Usuário!</div>";  
                endif;



            endif;
        else:

            $this->Dados = null;
        endif;

        $this->Dados = null;
        $CarregarView = new ConfigView("login/login", $this->Dados);
        $CarregarView->renderizarlogin();
    }

    public function logout() {
        unset($_SESSION['idt'], $_SESSION['nome'], $_SESSION['email']);
        $_SESSION['Msg'] = "<div class = 'alert alert-success'>Deslogado com sucesso!</div>";
        $UrlDestino = URL . 'controle-login/login';
        header("Location:$UrlDestino");
    }

}
