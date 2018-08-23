<?php


class ControleHome {

    public function index() {
        $CarregarView = new ConfigView("home/home");
        $CarregarView->renderizar();
    }
}
