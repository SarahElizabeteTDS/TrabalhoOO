<?php
interface lPessoa{
    public function emprestarLivro(Livro $livro);
    public function devolverLivro(Livro $livro);
    public function listarLivrosEmprestados();
}