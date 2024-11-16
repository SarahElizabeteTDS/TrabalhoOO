<?php

class Livro
{
    private string $titulo;
    private string $autor;
    private int $ano;
    private string $genero;
    private ?Aluno $alunoResponsavel;
    private int $codigoIndividual;
    private string $capa;
    
    //construct e tostring
    public function __construct($t,$a,$ano,$gen,$ar,$ci,$ca)
    {
        $this->titulo = $t;
        $this->autor = $a;
        $this->ano = $ano;
        $this->genero = $gen;
        $this->alunoResponsavel = $ar;
        $this->codigoIndividual = $ci;
        $this->capa = $ca;
    }
    
    public function __toString()
    {
        return  "\n*****************************************\n" . "*               DADOS DO LIVRO         *\n". "*****************************************\n". "Título: " . $this->titulo . "\n". "Autor: " . $this->autor . "\n". "Ano de Publicação: " . $this->ano . "\n". "Gênero: " . $this->genero . "\n". "Aluno Responsável: " . $this->alunoResponsavel . "\n". "Código Individual: " . $this->codigoIndividual . "\n"."Capa: " . $this->capa . "\n" . "*****************************************\n"; 
    }
    
    //gets e setts
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getAutor(): string
    {
        return $this->autor;
    }

    public function setAutor(string $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    public function getAno(): int
    {
        return $this->ano;
    }

    public function setAno(int $ano): self
    {
        $this->ano = $ano;

        return $this;
    }
    
    public function getGenero(): string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getAlunoResponsavel(): ?Aluno
    {
        return $this->alunoResponsavel;
    }

    public function setAlunoResponsavel(Aluno $alunoResponsavel): self
    {
        $this->alunoResponsavel = $alunoResponsavel;

        return $this;
    }

    public function getCodigoIndividual(): int
    {
        return $this->codigoIndividual;
    }

    public function setCodigoIndividual(int $codigoIndividual): self
    {
        $this->codigoIndividual = $codigoIndividual;

        return $this;
    }

    public function getCapa(): string
    {
        return $this->capa;
    }

    public function setCapa(string $capa): self
    {
        $this->capa = $capa;

        return $this;
    }
}

