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
    public function CadastrarLivro($livros)
    {
        $titulo = readline("Insira o título do livro: ");
        $autor = readline("Insira o nome do autor(a) do livro: ");
        foreach($livros as $l)
        {
            if ($l->getTitulo() == $titulo && $l->getAutor() == $autor) 
            {
                print "Esse livro já foi cadastrado\n"; 
            }else
            {
                $livro = new Livro($titulo, $autor, readline("Insira o ano de publicacao do livro: "), readline("Insira o genero literario do livro: "), NULL, readline("Insira o codigo individual do livro: "), gerarCapa($titulo, $autor));
                array_push($livros, $livro);

            }
        }
    }
    
    public function ExcluirLivro($livros, $livrosEmprestados)
    {
        $livroExcluido = readline("Qual livro você deseja exluir? (pelo indice)");
        if ($livros[$livroExcluido] >= count($livros) || $livros[$livroExcluido] <= 0) 
        {
            print "Esse livro não existe!\n";
        }
        elseif (in_array($livros[$livroExcluido], $livrosEmprestados)) {
            print "Você não pode excluir esse livro, ele está emprestado!\n";
        }
        else{
            array_slice($livros, $livroExcluido);
        }
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