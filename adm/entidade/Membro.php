<?php


class Membro {
    
    private $memcod;
    private $memnome;
    private $memrg;
    private $memsexo;
    private $memestadocivil;
    private $memdatanasc;
    private $memstatus;
    private $memgrupo;
    
    function getMemcod() {
        return $this->memcod;
    }

    function getMemnome() {
        return $this->memnome;
    }

    function getMemrg() {
        return $this->memrg;
    }

    function getMemsexo() {
        return $this->memsexo;
    }

    function getMemestadocivil() {
        return $this->memestadocivil;
    }

    function getMemdatanasc() {
        return $this->memdatanasc;
    }

    function getMemstatus() {
        return $this->memstatus;
    }

    function getMemgrupo() {
        return $this->memgrupo;
    }

    function setMemcod($memcod) {
        $this->memcod = $memcod;
    }

    function setMemnome($memnome) {
        $this->memnome = $memnome;
    }

    function setMemrg($memrg) {
        $this->memrg = $memrg;
    }

    function setMemsexo($memsexo) {
        $this->memsexo = $memsexo;
    }

    function setMemestadocivil($memestadocivil) {
        $this->memestadocivil = $memestadocivil;
    }

    function setMemdatanasc($memdatanasc) {
        $this->memdatanasc = $memdatanasc;
    }

    function setMemstatus($memstatus) {
        $this->memstatus = $memstatus;
    }

    function setMemgrupo($memgrupo) {
        $this->memgrupo = $memgrupo;
    }


}
