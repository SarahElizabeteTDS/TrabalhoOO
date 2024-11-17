<?php
require_once 'lPessoa.php';
require_once 'Pessoa.php';
require_once 'Aluno.php';
require_once 'Bibliotecario.php';
require_once 'Livro.php';

// Criar livro
$livros = [
    new Livro("Capitães de Areia"),
    new Livro("Pastores da Noite"),
    new Livro("Nas montanhas da Loucura"),
    new Livro("O Cortiço")
];

// Criar pessoa
$aluno = new Aluno("Sarah");
$bibliotecario = new Bibliotecario("Luis");

// Emprestar livro
$aluno->emprestarLivro($livros[0]);
$aluno->emprestarLivro($livros[1]);

// Listar emprestados
$aluno->listarLivrosEmprestados();

// Listar disponivel
$bibliotecario->listarLivrosDisponiveis($livros);

// Devolver livro
$aluno->devolverLivro($livros[0]);

// Listar novamente
$aluno->listarLivrosEmprestados();
$bibliotecario->listarLivrosDisponiveis($livros);