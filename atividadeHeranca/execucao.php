<?php

require_once("modelo/Aluno.php");
require_once("modelo/Bibliotecario.php");
require_once("modelo/IPessoa.php");
require_once("modelo/Livro.php");
require_once("modelo/Pessoa.php");

$opcao = 0;

do 
{
    print "\n*****************************************\n";
    print "*          BEM-VINDO À BIBLIOTECA      *\n";
    print "*         SELECIONE O SEU ACESSO:      *\n";
    print "*****************************************\n";
    print " 1 - Acesso de ALUNO                    \n";
    print " 2 - Acesso de BIBLIOTECÁRIO            \n";
    print " 0 - Sair                               \n";
    print "\n*****************************************\n";
    $opcao = readline("Selecione a opção (pelo índice): ");
    switch($opcao) 
    {
        case 0:
            system("clear");
            die;
        break;

        case 1:
            menuAluno();
        break;

        case 2:
            menuBibliotecario();
        break;

        default:
            print "\nOpção inválida\n";
            system("clear");
    }
}while($opcao != 0);

function menuAluno()
{
    $opcaoAluno = 0;
    do 
    {
        print "\n*****************************************\n";
        print "*        MENU DE OPÇÕES - ALUNO         *\n";
        print "*****************************************\n";
        print " 1 - Emprestar Livro                   \n";
        print " 2 - Devolver Livro                    \n";
        print " 3 - Renovar Livro                     \n";
        print " 4 - Listar Livros Disponíveis         \n";
        print " 0 - Voltar ao Menu Principal          \n";
        print "\n*****************************************\n";
        $opcaoAluno = readline("Selecione a opção (pelo índice): ");
        switch($opcaoAluno) 
        {
            case 0:
                system("clear");
                
            break;

            case 1:
            break;

            case 2:
            break;
            
            case 3:
            break;
                
            case 4:
            break;

            default:
                print "\nOpção inválida\n";
                system("clear");
        }
    }while($opcaoAluno != 0);
}

function menuBibliotecario()
{
    $opcaoBibliotecario = 0;
    do 
    {
        print "\n*****************************************\n";
        print "*   MENU DE OPÇÕES - BIBLIOTECÁRIO      *\n";
        print "*****************************************\n";
        print " 1 - Cadastrar Livro                   \n";
        print " 2 - Excluir Livro                     \n";
        print " 3 - Listar Livros Cadastrados         \n";
        print " 0 - Voltar ao Menu Principal          \n";
        print "\n*****************************************\n";
        $opcaoBibliotecario = readline("Selecione a opção (pelo índice): ");
        switch($opcaoBibliotecario) 
        {
            case 0:
                system("clear");
                die;
            break;

            case 1:
            break;

            case 2:
            break;
            
            case 3:
            break;

            default:
                print "\nOpção inválida\n";
                system("clear");
        }
    }while($opcaoBibliotecario != 0);
}