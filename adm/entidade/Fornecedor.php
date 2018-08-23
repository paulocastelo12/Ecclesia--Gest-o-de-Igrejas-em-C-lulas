<?php


class Fornecedor {
   private $fornecod;
   private $forneidt;
   private $fornedescricao;
   private $fornestatus;
   
   function getForneidt() {
       return $this->forneidt;
   }

   function setForneidt($forneidt) {
       $this->forneidt = $forneidt;
   }
   
   function getFornecod() {
       return $this->fornecod;
   }

   function getFornedescricao() {
       return $this->fornedescricao;
   }

   function getFornestatus() {
       return $this->fornestatus;
   }

   function setFornecod($fornecod) {
       $this->fornecod = $fornecod;
   }

   function setFornedescricao($fornedescricao) {
       $this->fornedescricao = $fornedescricao;
   }

   function setFornestatus($fornestatus) {
       $this->fornestatus = $fornestatus;
   }

}
