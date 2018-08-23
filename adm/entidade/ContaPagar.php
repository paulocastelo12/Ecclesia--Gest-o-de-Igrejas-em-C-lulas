<?php


class ContaPagar {
    
    private $pagcod;
    private $pagfornecod;
    private $pagdatavenc;
    private $pagnumdoc;
    private $pagclassificacao;
    private $pagtipodespesa;
    private $pagstatus;
    private $pagvalor;
    private $pagforcod;
    private $pagparcela;
    private $pagobservacao;
    
    function getPagcod() {
        return $this->pagcod;
    }

    function getPagfornecod() {
        return $this->pagfornecod;
    }

    function getPagdatavenc() {
        return $this->pagdatavenc;
    }

    function getPagnumdoc() {
        return $this->pagnumdoc;
    }

    function getPagclassificacao() {
        return $this->pagclassificacao;
    }

    function getPagtipodespesa() {
        return $this->pagtipodespesa;
    }

    function getPagstatus() {
        return $this->pagstatus;
    }

    function getPagvalor() {
        return $this->pagvalor;
    }

    function getPagforcod() {
        return $this->pagforcod;
    }

    function getPagparcela() {
        return $this->pagparcela;
    }

    function getPagobservacao() {
        return $this->pagobservacao;
    }

    function setPagcod($pagcod) {
        $this->pagcod = $pagcod;
    }

    function setPagfornecod($pagfornecod) {
        $this->pagfornecod = $pagfornecod;
    }

    function setPagdatavenc($pagdatavenc) {
        $this->pagdatavenc = $pagdatavenc;
    }

    function setPagnumdoc($pagnumdoc) {
        $this->pagnumdoc = $pagnumdoc;
    }

    function setPagclassificacao($pagclassificacao) {
        $this->pagclassificacao = $pagclassificacao;
    }

    function setPagtipodespesa($pagtipodespesa) {
        $this->pagtipodespesa = $pagtipodespesa;
    }

    function setPagstatus($pagstatus) {
        $this->pagstatus = $pagstatus;
    }

    function setPagvalor($pagvalor) {
        $this->pagvalor = $pagvalor;
    }

    function setPagforcod($pagforcod) {
        $this->pagforcod = $pagforcod;
    }

    function setPagparcela($pagparcela) {
        $this->pagparcela = $pagparcela;
    }

    function setPagobservacao($pagobservacao) {
        $this->pagobservacao = $pagobservacao;
    }

}
