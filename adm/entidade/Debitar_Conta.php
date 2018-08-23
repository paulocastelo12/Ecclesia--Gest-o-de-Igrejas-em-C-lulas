<?php


class Debitar_Conta {
    
    private $debcod;
    private $debvalor;
    private $debdata;
    private $debpagcod;
    private $debcaixacod;
    
    function getDebcod() {
        return $this->debcod;
    }

    function getDebvalor() {
        return $this->debvalor;
    }

    function getDebdata() {
        return $this->debdata;
    }

    function getDebpagcod() {
        return $this->debpagcod;
    }

    function getDebcaixacod() {
        return $this->debcaixacod;
    }

    function setDebcod($debcod) {
        $this->debcod = $debcod;
    }

    function setDebvalor($debvalor) {
        $this->debvalor = $debvalor;
    }

    function setDebdata($debdata) {
        $this->debdata = $debdata;
    }

    function setDebpagcod($debpagcod) {
        $this->debpagcod = $debpagcod;
    }

    function setDebcaixacod($debcaixacod) {
        $this->debcaixacod = $debcaixacod;
    }

}
