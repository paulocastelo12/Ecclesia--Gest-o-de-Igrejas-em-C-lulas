<?php


class RegCulto {
    
    private $regcod;
    private $regculdata;
    private $regculvalor;
    private $regculcultocod;
    private $regcaixacod;
    
    function getRegcod() {
        return $this->regcod;
    }

    function getRegculdata() {
        return $this->regculdata;
    }

    function getRegculvalor() {
        return $this->regculvalor;
    }

    function getRegculcultocod() {
        return $this->regculcultocod;
    }

    function getRegcaixacod() {
        return $this->regcaixacod;
    }

    function setRegcod($regcod) {
        $this->regcod = $regcod;
    }

    function setRegculdata($regculdata) {
        $this->regculdata = $regculdata;
    }

    function setRegculvalor($regculvalor) {
        $this->regculvalor = $regculvalor;
    }

    function setRegculcultocod($regculcultocod) {
        $this->regculcultocod = $regculcultocod;
    }

    function setRegcaixacod($regcaixacod) {
        $this->regcaixacod = $regcaixacod;
    }


}
