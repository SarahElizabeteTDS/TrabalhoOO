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
        print "==Cadastrar livro==\n";
        $titulo = readline("Informe o título do livro: ");
        $autor = readline("Informe o autor do livro: ");
        $ano = readline("Informe o ano de publicação: ");
        $genero = readline("Informe o gênero do livro: ");
        $id = count($livros) + 1;

        foreach ($livros as $livro) 
        {
            if (strtolower($livro->getTitulo()) === strtolower($titulo) && strtolower($livro->getAutor()) === strtolower($autor))  //strtolower só deixa tudo em letra minuscula
            {
                print "Esse livro já foi cadastrado.\n";
                return;
            }
        }

        $novoLivro = new Livro($titulo, $autor, $ano, $genero, true, $id, null, null);
        $novoLivro->setCapa($novoLivro->getCapa($titulo, $autor));
        array_push($livros, $novoLivro);
        print "Livro cadastrado!\n";
    }
    
    public function ExcluirLivro($livros)
    {
        print "==Excluir livro==\n";
        if (empty($livros)) 
        {
            print "Nenhum livro cadastrado para excluir.\n";
            return;
        }

        $idExcluir = (int) readline("Informe o ID do livro que deseja excluir: ");
        if ($idExcluir <= 0) 
        {
            print "Indice invalido.\n";
            return;
        }

        $encontrado = false;
        foreach ($livros as $index => $livro) 
        {
            if ($livro->getCodigoIndividual() === $idExcluir) 
            {
                unset($livros[$idExcluir]); // Remove o livro do array
                $livros = array_values($livros); // Reorganiza os índices do array
                print "Livro com ID  ". $idExcluir . " foi excluído com sucesso!\n";
                $encontrado = true;
                break;
            }
        }

        if (!$encontrado) 
        {
            print "Livro não encontrado.;\n";
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