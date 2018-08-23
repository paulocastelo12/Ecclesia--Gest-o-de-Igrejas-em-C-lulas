<?php

class TipoDespesa {
    private $tipodescod;
    private $tipodesdescricao;
    private $tipodesstatus;
    
    function getTipodescod() {
        return $this->tipodescod;
    }

    function getTipodesdescricao() {
        return $this->tipodesdescricao;
    }

    function getTipodesstatus() {
        return $this->tipodesstatus;
    }

    function setTipodescod($tipodescod) {
        $this->tipodescod = $tipodescod;
    }

    function setTipodesdescricao($tipodesdescricao) {
        $this->tipodesdescricao = $tipodesdescricao;
    }

    function setTipodesstatus($tipodesstatus) {
        $this->tipodesstatus = $tipodesstatus;
    }


}
