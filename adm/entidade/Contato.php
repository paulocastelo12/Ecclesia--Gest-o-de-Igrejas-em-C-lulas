<?php


class Contato {
   
    private $concod;
    private $conemail;
    private $contelefone;
    private $conmemcod;
    
    function getConcod() {
        return $this->concod;
    }

    function getConemail() {
        return $this->conemail;
    }

    function getContelefone() {
        return $this->contelefone;
    }

    function getConmemcod() {
        return $this->conmemcod;
    }

    function setConcod($concod) {
        $this->concod = $concod;
    }

    function setConemail($conemail) {
        $this->conemail = $conemail;
    }

    function setContelefone($contelefone) {
        $this->contelefone = $contelefone;
    }

    function setConmemcod($conmemcod) {
        $this->conmemcod = $conmemcod;
    }


}
