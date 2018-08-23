<?php


class Usuario {
   
    private $usucod;
    private $usunome;
    private $usuemail;
    private $ususenha;
    private $usunivel;
    
    function getUsunivel() {
        return $this->usunivel;
    }

    function setUsunivel($usunivel) {
        $this->usunivel = $usunivel;
    }

        
    function getUsucod() {
        return $this->usucod;
    }

    function getUsunome() {
        return $this->usunome;
    }

    function getUsuemail() {
        return $this->usuemail;
    }

    function getUsusenha() {
        return $this->ususenha;
    }

    function setUsucod($usucod) {
        $this->usucod = $usucod;
    }

    function setUsunome($usunome) {
        $this->usunome = $usunome;
    }

    function setUsuemail($usuemail) {
        $this->usuemail = $usuemail;
    }

    function setUsusenha($ususenha) {
        $this->ususenha = $ususenha;
    }

}
