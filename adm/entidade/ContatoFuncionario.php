<?php


class ContatoFuncionario {
   private $confuncod;
   private $confuntelefone;
   private $confunemail;
   private $confuncionariocod;
   
   function getConfuncod() {
       return $this->confuncod;
   }

   function getConfuntelefone() {
       return $this->confuntelefone;
   }

   function getConfunemail() {
       return $this->confunemail;
   }

   function getConfuncionariocod() {
       return $this->confuncionariocod;
   }

   function setConfuncod($confuncod) {
       $this->confuncod = $confuncod;
   }

   function setConfuntelefone($confuntelefone) {
       $this->confuntelefone = $confuntelefone;
   }

   function setConfunemail($confunemail) {
       $this->confunemail = $confunemail;
   }

   function setConfuncionariocod($confuncionariocod) {
       $this->confuncionariocod = $confuncionariocod;
   }

}
