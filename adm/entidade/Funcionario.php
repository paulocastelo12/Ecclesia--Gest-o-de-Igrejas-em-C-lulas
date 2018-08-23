<?php


class Funcionario {
    
 private $funcod;
 private $funnome;
 private $funrg;
 private $funcpf;
 private $funestadocivil;
 private $funsexo;
 private $fundtnasc;
 private $fundtadmissao;
 private $funstatus;
 private $funcarcod;
 
 function getFunstatus() {
     return $this->funstatus;
 }

 function setFunstatus($funstatus) {
     $this->funstatus = $funstatus;
 }

  
 function getFuncod() {
     return $this->funcod;
 }

 function getFunnome() {
     return $this->funnome;
 }

 function getFunrg() {
     return $this->funrg;
 }

 function getFuncpf() {
     return $this->funcpf;
 }

 function getFunestadocivil() {
     return $this->funestadocivil;
 }

 function getFunsexo() {
     return $this->funsexo;
 }

 function getFundtnasc() {
     return $this->fundtnasc;
 }

 function getFundtadmissao() {
     return $this->fundtadmissao;
 }

 function getFuncarcod() {
     return $this->funcarcod;
 }

 function setFuncod($funcod) {
     $this->funcod = $funcod;
 }

 function setFunnome($funnome) {
     $this->funnome = $funnome;
 }

 function setFunrg($funrg) {
     $this->funrg = $funrg;
 }

 function setFuncpf($funcpf) {
     $this->funcpf = $funcpf;
 }

 function setFunestadocivil($funestadocivil) {
     $this->funestadocivil = $funestadocivil;
 }

 function setFunsexo($funsexo) {
     $this->funsexo = $funsexo;
 }

 function setFundtnasc($fundtnasc) {
     $this->fundtnasc = $fundtnasc;
 }

 function setFundtadmissao($fundtadmissao) {
     $this->fundtadmissao = $fundtadmissao;
 }

 function setFuncarcod($funcarcod) {
     $this->funcarcod = $funcarcod;
 }


}
