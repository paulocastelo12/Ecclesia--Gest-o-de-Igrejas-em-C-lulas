<?php

class Grupo {

    private $codigo;
    private $nome;
    private $responsavel1;
    private $responsavel2;
    private $email;
    private $status;
    
    function getCodigo() {
        return $this->codigo;
    }

    function getNome() {
        return $this->nome;
    }

    function getResponsavel1() {
        return $this->responsavel1;
    }

    function getResponsavel2() {
        return $this->responsavel2;
    }

    function getEmail() {
        return $this->email;
    }

    function getStatus() {
        return $this->status;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setResponsavel1($responsavel1) {
        $this->responsavel1 = $responsavel1;
    }

    function setResponsavel2($responsavel2) {
        $this->responsavel2 = $responsavel2;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setStatus($status) {
        $this->status = $status;
    }



}
