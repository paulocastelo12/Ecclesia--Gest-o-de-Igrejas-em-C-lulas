<?php


class Endereco {
   
    private $endcod;
    private $cep;
    private $bairro;
    private $cidade;
    private $uf;
    private $rua;
    private $numero;
    private $complemento;
    private $forendcod;
    
    function getUf() {
        return $this->uf;
    }

    function setUf($uf) {
        $this->uf = $uf;
    }

        
    function getEndcod() {
        return $this->endcod;
    }

    function getCep() {
        return $this->cep;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getRua() {
        return $this->rua;
    }

    function getNumero() {
        return $this->numero;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function getForendcod() {
        return $this->forendcod;
    }

    function setEndcod($endcod) {
        $this->endcod = $endcod;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    function setForendcod($forendcod) {
        $this->forendcod = $forendcod;
    }

}
