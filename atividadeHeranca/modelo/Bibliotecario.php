<?php

require_once("Pessoa.php");

class Bibliotecario extends Pessoa
{
    private int $numFuncionario;
    private string $senhaFuncionario;
    
    //construct e tostring
    
    public function __construct($n,$i,$cpf,$num,$sen)
    {
        $this->nome = $n;
        $this->idade = $i;
        $this->cpf = $cpf;
        $this->numFuncionario = $num;
        $this->senhaFuncionario = $sen;
    }
    
    public function __toString()
    {
        return  "\n*****************************************\n"."*           DADOS DO BIBLIOTECÁRIO      *\n". "*****************************************\n" . "Nome: " . $this->nome . "\n". "Idade: " . $this->idade . " anos\n". "CPF: " . $this->cpf . "\n"."Número de Funcionário: " . $this->numFuncionario . "\n". "Senha de Acesso: " . $this->senhaFuncionario . "\n". "*****************************************\n";
    }
    
    //metodos da classe
    public function CadastrarLivro()
    {
        //fazer a logica depois
    }
    
    public function ExcluirLivro()
    {
        //fazer a logica depois
    }
    
    //gets e setts
    public function getNumFuncionario(): int
    {
        return $this->numFuncionario;
    }

    public function setNumFuncionario(int $numFuncionario): self
    {
        $this->numFuncionario = $numFuncionario;

        return $this;
    }

    public function getSenhaFuncionario(): string
    {
        return $this->senhaFuncionario;
    }

    public function setSenhaFuncionario(string $senhaFuncionario): self
    {
        $this->senhaFuncionario = $senhaFuncionario;

        return $this;
    }
}