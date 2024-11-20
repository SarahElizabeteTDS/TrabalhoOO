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
        print "\n*****************************************\n";
        print "*         LISTA DE TODOS OS LIVROS      *\n";
        print "*****************************************\n";

        // Verificar se há livros na biblioteca
        if (empty($livros)) 
        {
            print "Não há livros cadastrados na biblioteca.\n";
            return;
        }

        // Itera sobre todos os livros
        foreach ($livros as $livro) 
        {
            // Define o status de emprestado ou disponível
            $statusEmprestado = ($livro->isDisponivel()) ? "" : "*EMPRESTADO*";
            
            // Exibe a capa do livro
            print $livro->getCapa($livro->getTitulo(), $livro->getAutor());

            // Exibe as informações do livro
            print "Título: " . $livro->getTitulo() . "\n";
            print "Autor: " . $livro->getAutor() . "\n";
            print "Código: " . $livro->getCodigoIndividual() . "\n";
            print "Ano: " . $livro->getAno() . "\n";
            print "Gênero: " . $livro->getGenero() . "\n";
            print "Status: " . ($livro->isDisponivel() ? "Disponível" : "Não disponível") . " " . $statusEmprestado . "\n";
            print "*****************************************\n";
        }
    }

    public function listarLivrosDisponiveis($livros){
        print "Livros disponíveis para empréstimo:\n";
        foreach ($livros as $livro)
        {
            if ($livro->isDisponivel())
            {
                print $livro->getCodigoIndividual() . "- " . $livro->getTitulo(). "\n";
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
            print $livro->getCodigoIndividual() . "- " . $livro->getTitulo() . " (renovar até: " . $livro->calcularPrazoRenovar() . "\n";
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
