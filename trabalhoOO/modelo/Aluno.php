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
        return  "\n*****************************************\n". "*               DADOS DO ALUNO         *\n". "*****************************************\n". "Nome: " . $this->nome . "\n"."Idade: " . $this->idade . " anos\n". "CPF: " . $this->cpf . "\n". "Matrícula: " . $this->matricula . "\n"."Senha da Biblioteca: " . $this->senhaBiblioteca . "\n"."Prazo de Devolução: " . $this->prazo . " dias\n". "Renovações: " . $this->renovacoes . "\n" . "Pendências: " . $this->pendencias . "\n" . "*****************************************\n";
    }
    
    //metodos da classe
    public function EmprestarLivro($livros)
    {
        $livroDesejado = readline("Qual livro você deseja emprestar? (insira o número do índice)");
        if ($livros[$livroDesejado]->getAlunoResponsavel() != null) 
        {
            print "Esse livro já está emprestado!\n";
        }else{   
            $senhaInserida = readline("Insira sua senha: ");
            if ($senhaInserida == $this->senhaBiblioteca) 
            {
                $livros[$livroDesejado]->setAlunoResponsavel = $this->nome;
            }else{
                print "Senha Incorreta\n";
            }    
        }
    }
    
    public function DevolverLivro($livros)
    {
        $livroDevolvido = readline("Qual livro você deseja devolver? (insira o número do índice)");
        if ($livros[$livroDevolvido]->getAlunoResponsavel() != null) 
        {
            $senhaInserida = readline("Insira sua senha: ");
            if ($senhaInserida == $this->senhaBiblioteca) 
            {
                $livros[$livroDevolvido]->setAlunoResponsavel = null;
            }else{
                print "Senha Incorreta\n";
            }    
        }else{   
            print "Você não é o responsável por esse livro!\n";
        }   
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