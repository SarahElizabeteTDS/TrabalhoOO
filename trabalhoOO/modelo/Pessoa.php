<?php

require_once("IPessoa.php");

class Pessoa implements IPessoa
{
    protected string $nome;
    protected int $idade;
    protected int $cpf;
    protected $livrosEmprestados = array();

    //metodos da classe
    public function listarTodosLivros($livros)
    {
        $inx = 1;
        foreach($livros as $livro)
        {
            return $inx . " - " . $livro . "\n";
            $inx++;
        }
    }

    public function listarLivrosDisponiveis($livros){
        print "Livros disponíveis para empréstimo:\n";
        foreach ($livros as $livro)
        {
            if ($livro->isDisponivel())
            {
                print "- " . $livro->getTitulo(). "\n";
            }
        }
    }

    public function listarLivrosEmprestados(){
        if (empty($this->livrosEmprestados))
        {
            print $this->nome . " não possui livros emprestados.\n";
            return;
        }

        print "Livros emprestados por " . $this->nome . "\n";
        foreach ($this->livrosEmprestados as $livro)
        {
            print "- " . $livro->getTitulo() . " (renovar até: " . $livro->calcularPrazoRenovar() . "\n";
        }
    }
    
    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getIdade(): int
    {
        return $this->idade;
    }

    public function setIdade(int $idade): self
    {
        $this->idade = $idade;

        return $this;
    }

    public function getCpf(): int
    {
        return $this->cpf;
    }

    public function setCpf(int $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }
}
