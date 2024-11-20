<?php

require_once("modelo/Aluno.php");
require_once("modelo/Bibliotecario.php");
require_once("modelo/IPessoa.php");
require_once("modelo/Livro.php");
require_once("modelo/Pessoa.php");

$livros = array();

$livrosDisponiveis = array();
$livrosEmprestados = array();

//declarando alguns livros à mão, para a biblioteca não comecar sem nenhum livro
$livro1 = new Livro("Capitães da Areia", "Jorge Amado", 1937, "Romance", true, 1, null,null);
$livro1->setCapa($livro1->getCapa("Capitães da Areia", "Jorge Amado"));
$livro2 = new Livro("Querida", "Lygia Bojunga", 2009, "Romance", true, 2, null, null);
$livro1->setCapa($livro2->getCapa("Querida", "Lygia Bojunga"));
$livro3 = new Livro("Coraline", "Neil Gaiman", 2002, "Terror", true, 3, null, null);
$livro1->setCapa($livro3->getCapa("Coraline", "Neil Gaiman"));
$livro4 = new Livro("Senhora", "José de Alencar", 1875, "Romance", true, 4, null, null);
$livro1->setCapa($livro4->getCapa("Senhora", "José de Alencar"));
$livro5 = new Livro("O Cortiço", "Aluísio Azevedo", 1890, "Romance", true, 5, null, null);
$livro1->setCapa($livro5->getCapa("O Cortiço",  "Aluísio Azevedo"));

//puxar os objetos para o array
array_push($livros, $livro1);
array_push($livros, $livro2);
array_push($livros, $livro3);
array_push($livros, $livro4);
array_push($livros, $livro5);

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
            print "===Insira seus dados===\n";
            $aluno = new Aluno(readline("Insira seu nome: "), readline("Insira sua idade: "), readline("Insira seu CPF: "), readline("Insira sua matricula:" ), readline("Insira sua senha da biblioteca: "));
            print "Bem-vindo(a) " . $aluno->getNome() . "!!!\n";
            menuAluno($aluno, $livros);
        break;

        case 2:
            print "===Insira seus dados===\n";
            $bibliotecario = new Bibliotecario(readline("Insira seu nome: "), readline("Insira sua idade: "), readline("Insira seu CPF: "), readline("Insira seu número de funcionário:" ), readline("Insira sua senha de funcionário: "));
            print "Bem-vindo(a) " . $bibliotecario->getNome() . "!!!\n";
            menuBibliotecario($bibliotecario, $livros);
        break;

        default:
            print "\nOpção inválida\n";
            system("clear");
    }
}while($opcao != 0);

//FUNCOES DO SISTEMA

function menuAluno($aluno, $livros)
{
    $opcaoAluno = 0;
    do 
    {
        print "\n*****************************************\n";
        print "*        MENU DE OPÇÕES - ALUNO         *\n";
        print "*****************************************\n";
        print " 1 - Emprestar Livro                   \n";
        print " 2 - Devolver Livro                    \n";
        print " 3 - Listar Livros                     \n";
        print " 0 - Voltar ao Menu Principal          \n";
        print "\n*****************************************\n";
        $opcaoAluno = readline("Selecione a opção (pelo índice): ");
        switch($opcaoAluno) 
        {
            case 0:
                system("clear");
                return;
            break;

            case 1:
                $aluno->listarLivrosDisponiveis($livros);
                $emprestar = readline("Qual livro você deseja emprestar? (pelo indice)");
                $emprestar--;
                $aluno->emprestarLivro($livros[$emprestar]);
            break;

            case 2:
                $aluno->listarLivrosEmprestados();
                $devolver = readline("Qual livro você deseja devolver? (pelo indice)");
                $devolver--;
                $aluno->devolverLivro($livros[$devolver]);
            break;
            
            case 3:
                $aluno->listarTodosLivros($livros);
            break;

            default:
                print "\nOpção inválida\n";
                system("clear");
        }
    }while($opcaoAluno != 0);
}

function menuBibliotecario($bibliotecario, $livros)
{
    $opcaoBibliotecario = 0;
    do 
    {
        print "\n*****************************************\n";
        print "*   MENU DE OPÇÕES - BIBLIOTECÁRIO      *\n";
        print "*****************************************\n";
        print " 1 - Cadastrar Livro                   \n";
        print " 2 - Excluir Livro                     \n";
        print " 3 - Listar Livros                     \n";
        print " 0 - Voltar ao Menu Principal          \n";
        print "\n*****************************************\n";
        $opcaoBibliotecario = readline("Selecione a opção (pelo índice): ");
        switch($opcaoBibliotecario) 
        {
            case 0:
                system("clear");
                return; 
            break;

            case 1:
                $bibliotecario->CadastrarLivro($livros);
            break;

            case 2:
                $bibliotecario->listarTodosLivros($livros);
                $bibliotecario->ExcluirLivro($livros);
            break;
            
            case 3:
                $bibliotecario->listarTodosLivros($livros);
                $bibliotecario->listarLivrosDisponiveis($livros);
                $bibliotecario->listarLivrosEmprestados($livros);
            break;

            default:
                print "\nOpção inválida\n";
                system("clear");
        }
    }while($opcaoBibliotecario != 0);
}

