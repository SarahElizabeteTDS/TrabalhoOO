<?php

class Livro 
{
    private string $titulo;
    private string $autor;
    private int $ano;
    private string $genero;
    private bool $disponivel;
    private int $codigoIndividual;
    private $capa;
    private $dataEmprestimo;
    
    //construct e tostring
    public function __construct($t,$a,$ano,$gen,$disponivel,$ci,$ca,$de)
    {
        $this->titulo = $t;
        $this->autor = $a;
        $this->ano = $ano;
        $this->genero = $gen;
        $this->disponivel = $disponivel;
        $this->codigoIndividual = $ci;
        $this->capa = $ca;
        $this->dataEmprestimo = $de;
    }
    
    public function __toString()
    {
        return  "\n*****************************************\n" . "*               DADOS DO LIVRO         *\n". "*****************************************\n". "Título: " . $this->titulo . "\n". "Autor: " . $this->autor . "\n". "Ano de Publicação: " . $this->ano . "\n". "Gênero: " . $this->genero . "\n". "Disponível: " . $this->disponivel . "\n". "Código Individual: " . $this->codigoIndividual . "\n"."Capa: " . $this->capa . "\n" . "*****************************************\n"; 
    }

    //metodos livro
    public function marcarEmprestado(){
        $this->disponivel = false;
        $this->dataEmprestimo = new DateTime(); // cria um objeto da classe DateTime()
    }

    public function marcarDisponivel(){
        $this->disponivel = true;
        $this->dataEmprestimo = null;
    }

    public function calcularPrazoRenovar(){
        if ($this->dataEmprestimo){
            $prazo = clone $this->dataEmprestimo; //referencia do comando https://www.php.net/manual/pt_BR/language.oop5.cloning.php
            //basicamente, cria uma variavel com as mesmas propriedades, literalemente um clone
            $prazo->modify("+7 Dias"); //esse modify é um metodo da classe DateTime, basicamente, ele modifica uma data existente de acordo com o que a string manda
            return $prazo->format('d-m-Y'); //é um metodo da mesma classe, serve para formatar o jeito que a data aparece para o usuario
        }
        return 'Não emprestado.';
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

    public function getCodigoIndividual(): int
    {
        return $this->codigoIndividual;
    }

    public function setCodigoIndividual(int $codigoIndividual): self
    {
        $this->codigoIndividual = $codigoIndividual;

        return $this;
    }

    public function getCapa($titulo, $autor)
    {
        return "\n ___________________________"."\n|                           |"."\n|    " . $titulo . "   |"."\n|                           |"."\n|___________________________|"."\n|                           |"."\n|    " . $autor . "   |"."\n|                           |"."\n|___________________________|"."\n|                           |"."\n|                           |" ."\n|                           |" . "\n|___________________________|\n";
    }

    public function setCapa(string $capa): self
    {
        $this->capa = $capa;

        return $this;
    }

    public function isDisponivel(): bool
    {
        return $this->disponivel;
    }

    public function setDisponivel(bool $disponivel): self
    {
        $this->disponivel = $disponivel;

        return $this;
    }
}

