<?php

class RegDizimo {
    
    private $dizcod;
    private $dizdata;
    private $dizvalor;
    private $dizmemcod;
    private $dizforcod;
    private $dizcaixacod;
    
    function getDizcod() {
        return $this->dizcod;
    }

    function getDizdata() {
        return $this->dizdata;
    }

    function getDizvalor() {
        return $this->dizvalor;
    }

    function getDizmemcod() {
        return $this->dizmemcod;
    }

    function getDizforcod() {
        return $this->dizforcod;
    }

    function getDizcaixacod() {
        return $this->dizcaixacod;
    }

    function setDizcod($dizcod) {
        $this->dizcod = $dizcod;
    }

    function setDizdata($dizdata) {
        $this->dizdata = $dizdata;
    }

    function setDizvalor($dizvalor) {
        $this->dizvalor = $dizvalor;
    }

    function setDizmemcod($dizmemcod) {
        $this->dizmemcod = $dizmemcod;
    }

    function setDizforcod($dizforcod) {
        $this->dizforcod = $dizforcod;
    }

    function setDizcaixacod($dizcaixacod) {
        $this->dizcaixacod = $dizcaixacod;
    }

}
