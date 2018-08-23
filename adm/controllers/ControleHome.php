<?php

class ControleHome {

    public function index() {

        $ListarQtdMembro = new ModelsHome();
        $qtdMembro = $ListarQtdMembro->listarQtdMembro();

        $ListarQtdCulto = new ModelsHome();
        $qtdCulto = $ListarQtdCulto->listarQtdCulto();

        $ListarQtdGrupo = new ModelsHome();
        $qtdGrupo = $ListarQtdGrupo->listarQtdGrupo();

        $ListarQtdCelula = new ModelsHome();
        $qtdCelula = $ListarQtdCelula->listarQtdCelula();

        $ListarSaldo = new ModelsCaixa();
        $caixasaldo = $ListarSaldo->listar();

        date_default_timezone_set('America/Manaus');

        $ano = date('Y');
        $mes = date('m');

        $ListarTotalDebitos = new ModelsDebitar_Conta();
        $totaldebitos = $ListarTotalDebitos->listarTotalValor($ano, $mes);

        $Dados = [
            'qtdMembro' => $qtdMembro,
            'qtdCulto' => $qtdCulto,
            'qtdGrupo' => $qtdGrupo,
            'qtdCelula' => $qtdCelula,
            'caixasaldo' => $caixasaldo,
            'totaldebitos' => $totaldebitos
        ];

        //var_dump($Dados);

        $CarregarView = new ConfigView("home/home", $Dados);
        $CarregarView->renderizar();
    }

}
