<?php
require_once 'lPessoa.php';
require_once 'Livro.php';

class Pessoa implements lPessoa{
    protected $nome;
    protected $livrosEmprestados = array();

    public function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function emprestarLivro(Livro $livro)
    {
        if ($livro->isDisponivel())
        {
            array_push($this->livrosEmprestados, $livro);
            $livro->marcarEmprestado();
            echo "Livro " . $livro->getTitulo() . " emprestado para " . $this->nome ."\n";
        }else{
            echo "Livro " . $livro->getTitulo() . " não disponível\n";
        }
    }

    public function devolverLivro(Livro $livro)
    {
        foreach ($this->livrosEmprestados as $key => $i)
        {
            if($i === $livro)
            {
                unset($this->livrosEmprestados[$key]);
                $livro->marcarDisponivel();
                echo "Livro '{$livro->getTitulo()}' devolvido.\n";
                return;
            }
        }
        echo "Livro '{$livro->getTitulo()}' não está emprestado para {$this->nome}.\n";
    }

    public function listarLivrosEmprestados(){
        if (empty($this->livrosEmprestados)){
            echo "{$this->nome} não possui livros emprestados.\n";
            return;
        }

        echo "Livros emprestados por {$this->nome}:\n";
        foreach ($this->livrosEmprestados as $livro){
            echo "- {$livro->getTitulo()} (renovar até: {$livro->calcularPrazoRenovar()}\n";
        }
    }
}