<?php

class ConfigView {

    private $Nome;
    private $Dados;
    private $Dados_editar;
    private $Dados2;
    private $Dados3;

    public function __construct($Nome, array $Dados = null,array $Dados_editar = null,array $Dados2 = null, array $Dados3 = null ) {
        $this->Nome = (string) $Nome;
        $this->Dados = $Dados;
        $this->Dados_editar = $Dados_editar;
        $this->Dados2 = $Dados2;
        $this->Dados3 = $Dados3;
    }

    public function renderizar() {
        include 'views/include/header.php';
        include 'views/include/menu.php';
        if (file_exists('views/' . $this->Nome . '.php')):
            include 'views/' . $this->Nome . '.php';
        else:
            echo "Erro ao carregar a VIEW: {$this->Nome}";
        endif;
        include 'views/include/footer.php';
    }
    
     public function renderizar_lista() {
        
        if (file_exists('views/' . $this->Nome . '.php')):
            include 'views/' . $this->Nome . '.php';
        else:
            echo "erro ao Carregar a View {$this->Nome}";
        endif;
    }
    
     public function renderizar_relatorio() {
        
        if (file_exists('views/' . $this->Nome . '.php')):
            include 'views/' . $this->Nome . '.php';
        else:
            echo "erro ao Carregar a View {$this->Nome}";
        endif;
    }
   
    
    public function renderizarlogin() {
        if(file_exists('views/'. $this->Nome . '.php')):
            include 'views/'. $this->Nome . '.php';
        endif;
    }


    public function getdados() {
        return $this->Dados;
    }

}
