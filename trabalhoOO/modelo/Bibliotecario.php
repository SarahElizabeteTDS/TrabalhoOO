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
        return  "\n*****************************************\n"."*           DADOS DO BIBLIOTECÁRIO      *\n". "*****************************************\n" . "Nome: " . $this->nome . "\n". "Idade: " . $this->idade . " anos\n". "CPF: " . $this->cpf . "\n"."Número de Funcionário: " . $this->numFuncionario . "\n". "*****************************************\n";
    }
    
    //metodos da classe
    public function CadastrarLivro(&$livros)
    {
        print "==CADASTRO DO LIVRO==\n";
        $titulo = readline("Digite o título do livro: ");
        $autor = readline("Digite o autor do livro: ");
        $ano = readline("Digite o ano de publicação: ");
        $genero = readline("Digite o gênero do livro: ");
        $codigoIndividual = count($livros) + 1;

        // Verificando se o ano é válido
        if (!is_numeric($ano) || $ano < 1000 || $ano > date("Y")) 
        {
            print "Ano inválido. O ano deve ser um valor numérico entre 1000 e o ano atual.\n";
            return;
        }

        // Criando o livro
        $livro = new Livro($titulo, $autor, (int)$ano, $genero, true, (int)$codigoIndividual, null, null);
        $livros[] = $livro;
        print "Livro cadastrado com sucesso!\n";
    }
    
    public function ExcluirLivro(&$livros) //O simbolo passa o array por referencia, ou seja, altera o original
    {
        print "==EXCLUIR LIVRO==\n";
        $idExcluir = readline("Digite o ID do livro que deseja excluir: ");
        $idExcluir--;
        $encontrado = false;

        foreach ($livros as $index) 
        {
            if ($index->getCodigoIndividual() == $idExcluir) 
            {
                unset($livros[$idExcluir]);
                $livros = array_values($livros); // Reorganiza os índices
                print "Livro foi excluído com sucesso!\n";
                $encontrado = true;
                break;
            }
        }

        if (!$encontrado) 
        {
            print "Livro não encontrado.\n";
        }
        return $livros;
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