<?php

interface IPessoa
{
    public function listarTodosLivros($livros);
    public function listarLivrosDisponiveis($livros);
    public function listarLivrosEmprestados();
}