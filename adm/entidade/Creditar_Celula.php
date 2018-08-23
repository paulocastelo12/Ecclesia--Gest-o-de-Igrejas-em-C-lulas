<?php


class Creditar_Celula {
    private $credcod;
    private $credvalor;
    private $creddata;
    private $credregcelcod;
    private $credcaixacod;
    
    function getCredcod() {
        return $this->credcod;
    }

    function getCredvalor() {
        return $this->credvalor;
    }

    function getCreddata() {
        return $this->creddata;
    }

    function getCredregcelcod() {
        return $this->credregcelcod;
    }

    function getCredcaixacod() {
        return $this->credcaixacod;
    }

    function setCredcod($credcod) {
        $this->credcod = $credcod;
    }

    function setCredvalor($credvalor) {
        $this->credvalor = $credvalor;
    }

    function setCreddata($creddata) {
        $this->creddata = $creddata;
    }

    function setCredregcelcod($credregcelcod) {
        $this->credregcelcod = $credregcelcod;
    }

    function setCredcaixacod($credcaixacod) {
        $this->credcaixacod = $credcaixacod;
    }

}
