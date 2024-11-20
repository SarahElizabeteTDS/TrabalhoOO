<?php

require_once("Pessoa.php");

class Aluno extends Pessoa
{
    protected int $matricula;
    protected string $senhaBiblioteca;
    
    //construct e tostring
    
    public function __construct($n,$i,$cpf,$m,$sb)
    {
        $this->nome = $n;
        $this->idade = $i;
        $this->cpf = $cpf;
        $this->matricula = $m;
        $this->senhaBiblioteca = $sb;
    }
    
    public function __toString()
    {
        return  "\n*****************************************\n". "*               DADOS DO ALUNO         *\n". "*****************************************\n". "Nome: " . $this->nome . "\n"."Idade: " . $this->idade . " anos\n". "CPF: " . $this->cpf . "\n". "Matrícula: " . $this->matricula . "\n" . "*****************************************\n";
    }
    
    //metodos da classe
    public function emprestarLivro(Livro $livro)
    {
        print "==Emprestar livro==\n";
        if ($livro->isDisponivel())
        {
            array_push($this->livrosEmprestados, $livro);
            $livro->marcarEmprestado();
            print "Livro " . $livro->getTitulo() . " emprestado para " . $this->nome ."\n";
        }else{
            print "Livro " . $livro->getTitulo() . " não disponível\n";
        }
    }

    public function devolverLivro(Livro $livro)
    {
        print "==Devolver livro==\n";
        foreach ($this->livrosEmprestados as $key => $i)
        {
            if($i === $livro)
            {
                unset($this->livrosEmprestados[$key]);
                $livro->marcarDisponivel();
                print "Livro " . $livro->getTitulo()  . " devolvido.\n";
                return;
            }
        }
        print "Livro " . $livro->getTitulo() . " não está emprestado para " . $this->nome . "\n";
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