<?php
require_once 'Pessoa.php';

class Aluno extends Pessoa {
    public function __construct($nome){
        parent::__construct($nome);
    }
}