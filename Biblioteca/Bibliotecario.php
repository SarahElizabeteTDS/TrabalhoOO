<?php
require_once 'Pessoa.php';

class Bibliotecario extends Pessoa{
    public function __construct($nome){
        parent::__construct($nome);
    }

    public function listarLivrosDisponiveis($livros){
        echo "Livros disponíveis para empréstimo:\n";
        foreach ($livros as $livro){
            if ($livro->isDisponivel()){
                echo "- {$livro->getTitulo()}\n";
            }
        }
    }
}