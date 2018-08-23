<?php

class ControleRelaCelula {

    private $Dados;
    private $Dados_editar;
    private $UserId;

    public function index() {

        $ListarGrupo = new ModelsGrupo();

        $this->Dados = $ListarGrupo->listar();

        $CarregarView = new ConfigView("relatorio/RelatorioCelula", $this->Dados);

        $CarregarView->renderizar();
    }

    public function gerarRelatorio() {
        
        $datainicio = filter_input(INPUT_POST, 'datainicio', FILTER_DEFAULT);
        $datafinal = filter_input(INPUT_POST, 'datafinal', FILTER_DEFAULT);
        $grupo = filter_input(INPUT_POST, 'grupo', FILTER_DEFAULT);
        
        $ListarRegCelula = new ModelsRegCelula();
        $this->Dados = $ListarRegCelula->listar($datainicio, $datafinal, $grupo);
        
        $ListarGrupo = new ModelsGrupo();
        $nomegrupo = $ListarGrupo->listarPorId($grupo);
        
         $this->Dados_editar = [
            'nomegrupo' => $nomegrupo
        ];

        $CarregarView = new ConfigView("relatorio/GerarRelaCelula", $this->Dados, $this->Dados_editar);

        $CarregarView->renderizar_relatorio();
    }

}
