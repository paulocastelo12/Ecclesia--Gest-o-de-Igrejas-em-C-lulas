<?php


class ControleUsuario {
   
    private $Dados;
    private $UserId;

    public function index() {

        $ListarUsuario = new ModelsUsuario();

        $this->Dados = $ListarUsuario->listar();

        $CarregarView = new ConfigView("usuario/Usuario", $this->Dados);

        $CarregarView->renderizar();
    }
    
     public function cadastrarUsuario() {
        $CarregarView = new ConfigView("usuario/CadastrarUsuario");
        $CarregarView->renderizar();
    }
    
    public function salvarUsuario() {

        $usunome = filter_input(INPUT_POST, 'usunome', FILTER_DEFAULT);
        $usuemail = filter_input(INPUT_POST, 'usuemail', FILTER_DEFAULT);
        $ususenha = filter_input(INPUT_POST, 'ususenha', FILTER_DEFAULT);
        $usunivel = filter_input(INPUT_POST, 'usunivel', FILTER_DEFAULT);
        
        $ususenhamd5 = md5($ususenha);
        
        $usuario = new Usuario();
        
        $usuario->setUsunome($usunome);
        $usuario->setUsuemail($usuemail);
        $usuario->setUsusenha($ususenhamd5);
        $usuario->setUsunivel($usunivel);

        $Dados = [
            'usunome' => $usuario->getUsunome(),
            'usuemail' => $usuario->getUsuemail(),
            'ususenha' => $usuario->getUsusenha(),
            'usunivel' => $usuario->getUsunivel()
        ];

        $CadastrarUsuario = new ModelsUsuario();
        $CadastrarUsuario->cadastrar($Dados);
        //var_dump($Dados);
    }
}
