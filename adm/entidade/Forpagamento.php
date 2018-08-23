<?php


class Forpagamento {
    
    private $forcod;
    private $fordescricao;
    private $forstatus;
    
    function getForstatus() {
        return $this->forstatus;
    }

    function setForstatus($forstatus) {
        $this->forstatus = $forstatus;
    }

        
    function getForcod() {
        return $this->forcod;
    }

    function getFordescricao() {
        return $this->fordescricao;
    }

    function setForcod($forcod) {
        $this->forcod = $forcod;
    }

    function setFordescricao($fordescricao) {
        $this->fordescricao = $fordescricao;
    }
    
}
