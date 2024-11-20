<?php

require_once("Pessoa.php");

class Aluno extends Pessoa
{
    protected int $matricula;
    protected string $senhaBiblioteca;
    
    //construct e tostring
    
    public function __construct($nome, $idade, $cpf, $matricula, $senha)
    {
        // Verificando se o CPF tem 11 dígitos
        if (strlen($cpf) !== 11 || !is_numeric($cpf)) 
        {
            print "CPF inválido. O CPF deve ter 11 números.\n";
            exit;
        }
        
        // Verificando se a matrícula tem um formato válido (aqui, um simples exemplo de 6 dígitos)
        if (strlen($matricula) !== 6 || !is_numeric($matricula)) 
        {
            print "Matrícula inválida. A matrícula deve ter 6 números.\n";
            exit;
        }

        $this->nome = $nome;
        $this->idade = $idade;
        $this->cpf = $cpf;
        $this->matricula = $matricula;
        $this->senhaBiblioteca = $senha;
    }
    
    public function __toString()
    {
        return  "\n*****************************************\n". "*               DADOS DO ALUNO         *\n". "*****************************************\n". "Nome: " . $this->nome . "\n"."Idade: " . $this->idade . " anos\n". "CPF: " . $this->cpf . "\n". "Matrícula: " . $this->matricula . "\n" . "*****************************************\n";
    }
    
    //metodos da classe
    public function emprestarLivro(Livro $livro)
    {
        print "==Emprestar livro==\n";
        
        // Verifica se o livro está disponível
        if ($livro->isDisponivel()) {
            // Adiciona o livro ao array de livros emprestados
            $this->livrosEmprestados[] = $livro;
            
            // Remove o livro do array de livros disponíveis
            $livro->marcarEmprestado(); 

            print "Livro " . $livro->getTitulo() . " emprestado com sucesso.\n";
        } else {
            print "O livro " . $livro->getTitulo() . " não está disponível.\n";
        }
    }

    public function devolverLivro(Livro $livro)
    {
        print "==Devolver livro==\n";

        // Verifica se o livro está no array de livros emprestados
        foreach ($this->livrosEmprestados as $key => $livroEmprestado) 
        {
            if ($livroEmprestado === $livro) 
            {
                // Remove o livro do array de livros emprestados
                unset($this->livrosEmprestados[$key]);
                
                // Marca o livro como disponível novamente
                $livro->marcarDisponivel(); 
                
                print "Livro " . $livro->getTitulo() . " devolvido com sucesso.\n";
                return;
            }
        }

        // Se o livro não for encontrado nos livros emprestados
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