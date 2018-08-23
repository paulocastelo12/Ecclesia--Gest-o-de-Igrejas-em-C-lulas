<?php


class Culto {
   
    private $culcod;
    private $culdescricao;
    private $culdia_semana;
    private $culhorario_inicio;
    private $culhorario_final;
    private $culstatus;
    
    function getCulcod() {
        return $this->culcod;
    }

    function getCuldescricao() {
        return $this->culdescricao;
    }

    function getCuldia_semana() {
        return $this->culdia_semana;
    }

    function getCulhorario_inicio() {
        return $this->culhorario_inicio;
    }

    function getCulhorario_final() {
        return $this->culhorario_final;
    }

    function getCulstatus() {
        return $this->culstatus;
    }

    function setCulcod($culcod) {
        $this->culcod = $culcod;
    }

    function setCuldescricao($culdescricao) {
        $this->culdescricao = $culdescricao;
    }

    function setCuldia_semana($culdia_semana) {
        $this->culdia_semana = $culdia_semana;
    }

    function setCulhorario_inicio($culhorario_inicio) {
        $this->culhorario_inicio = $culhorario_inicio;
    }

    function setCulhorario_final($culhorario_final) {
        $this->culhorario_final = $culhorario_final;
    }

    function setCulstatus($culstatus) {
        $this->culstatus = $culstatus;
    }

  
}
