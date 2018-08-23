<?php


class Celula {
  
    private $celcod;
    private $celdescricao;
    private $celanfitriao;
    private $celclassificacao;
    private $celstatus;
    private $celmemcod;
    
    function getCelcod() {
        return $this->celcod;
    }

    function getCeldescricao() {
        return $this->celdescricao;
    }

    function getCelanfitriao() {
        return $this->celanfitriao;
    }

    function getCelclassificacao() {
        return $this->celclassificacao;
    }

    function getCelstatus() {
        return $this->celstatus;
    }

    function getCelmemcod() {
        return $this->celmemcod;
    }

    function setCelcod($celcod) {
        $this->celcod = $celcod;
    }

    function setCeldescricao($celdescricao) {
        $this->celdescricao = $celdescricao;
    }

    function setCelanfitriao($celanfitriao) {
        $this->celanfitriao = $celanfitriao;
    }

    function setCelclassificacao($celclassificacao) {
        $this->celclassificacao = $celclassificacao;
    }

    function setCelstatus($celstatus) {
        $this->celstatus = $celstatus;
    }

    function setCelmemcod($celmemcod) {
        $this->celmemcod = $celmemcod;
    }
 
}
