<?php

require_once("Pessoa.php");

class Aluno extends Pessoa
{
    private int $matricula;
    private string $senhaBiblioteca;
    private int $prazo;
    private int $renovacoes;
    private int $pendencias;
    
    //construct e tostring
    
    public function __construct($n,$i,$cpf,$m,$sb,$p,$r,$pen)
    {
        $this->nome = $n;
        $this->idade = $i;
        $this->cpf = $cpf;
        $this->matricula = $m;
        $this->senhaBiblioteca = $sb;
        $this->prazo = $p;
        $this->renovacoes = $r;
        $this->pendencias = $pen;
    }
    
    public function __toString()
    {
        return  "\n*****************************************\n". "*               DADOS DO ALUNO         *\n". "*****************************************\n". "Nome: " . $this->nome . "\n"."Idade: " . $this->idade . " anos\n". "CPF: " . $this->cpf . "\n". "Matrícula: " . $this->matricula . "\n"."Senha da Biblioteca: " . $this->senhaBiblioteca . "\n"."Prazo de Devolução: " . $this->prazo . " dias\n". "Renovações: " . $this->renovacoes . "\n" . "Pendências: " . $this->pendencias . "\n" . "*****************************************\n";
    }
    
    //metodos da classe
    public function EmprestarLivro()
    {
        //fazer a logica depois
    }
    
    public function DevolverLivro()
    {
        //fazer a logica depois
    }
    
    public function RenovarLivro()
    {
        //fazer a logica depois
    }

    //gets e setts
    public function getMatricula(): int
    {
        return $this->matricula;
    }

    public function setMatricula(int $matricula): self
    {
        $this->matricula = $matricula;

        return $this;
    }

    public function getSenhaBiblioteca(): string
    {
        return $this->senhaBiblioteca;
    }

    public function setSenhaBiblioteca(string $senhaBiblioteca): self
    {
        $this->senhaBiblioteca = $senhaBiblioteca;

        return $this;
    }
}