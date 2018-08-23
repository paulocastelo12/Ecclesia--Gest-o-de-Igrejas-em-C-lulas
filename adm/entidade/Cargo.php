<?php


class Cargo {
    
    private $carcod;
    private $cardescricao;
    private $carstatus;
    
    function getCarstatus() {
        return $this->carstatus;
    }

    function setCarstatus($carstatus) {
        $this->carstatus = $carstatus;
    }

        function getCarcod() {
        return $this->carcod;
    }

    function getCardescricao() {
        return $this->cardescricao;
    }

    function setCarcod($carcod) {
        $this->carcod = $carcod;
    }

    function setCardescricao($cardescricao) {
        $this->cardescricao = $cardescricao;
    }

}
