<?php

class RegCelula {
   
    private $regcelcod;
    private $regceldata_registro;
    private $regcelqtd_participantes;
    private $regcelqtd_conversoes;
    private $regcelvalor;
    private $regceldata_realizacao;
    private $regcelstatus_registro;
    private $regcelstatus_valor;
    private $regcelcelulacod;
    
    function getRegceldata_registro() {
        return $this->regceldata_registro;
    }

    function setRegceldata_registro($regceldata_registro) {
        $this->regceldata_registro = $regceldata_registro;
    }
   
    function getRegcelcod() {
        return $this->regcelcod;
    }

    function getRegcelqtd_participantes() {
        return $this->regcelqtd_participantes;
    }

    function getRegcelqtd_conversoes() {
        return $this->regcelqtd_conversoes;
    }

    function getRegcelvalor() {
        return $this->regcelvalor;
    }

    function getRegceldata_realizacao() {
        return $this->regceldata_realizacao;
    }

    function getRegcelstatus_registro() {
        return $this->regcelstatus_registro;
    }

    function getRegcelstatus_valor() {
        return $this->regcelstatus_valor;
    }

    function getRegcelcelulacod() {
        return $this->regcelcelulacod;
    }

    function setRegcelcod($regcelcod) {
        $this->regcelcod = $regcelcod;
    }


    function setRegcelqtd_participantes($regcelqtd_participantes) {
        $this->regcelqtd_participantes = $regcelqtd_participantes;
    }

    function setRegcelqtd_conversoes($regcelqtd_conversoes) {
        $this->regcelqtd_conversoes = $regcelqtd_conversoes;
    }

    function setRegcelvalor($regcelvalor) {
        $this->regcelvalor = $regcelvalor;
    }

    function setRegceldata_realizacao($regceldata_realizacao) {
        $this->regceldata_realizacao = $regceldata_realizacao;
    }

    function setRegcelstatus_registro($regcelstatus_registro) {
        $this->regcelstatus_registro = $regcelstatus_registro;
    }

    function setRegcelstatus_valor($regcelstatus_valor) {
        $this->regcelstatus_valor = $regcelstatus_valor;
    }

    function setRegcelcelulacod($regcelcelulacod) {
        $this->regcelcelulacod = $regcelcelulacod;
    }


}
