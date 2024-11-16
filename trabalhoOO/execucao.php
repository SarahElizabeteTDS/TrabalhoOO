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
$livro1 = new Livro("Capitães da Areia", "Jorge Amado", 1937, "Romance", NULL, 1, gerarCapa("Capitães da Areia", "Jorge Amado"));
$livro2 = new Livro("Querida", "Lygia Bojunga", 2009, "Romance", NULL, 2, gerarCapa("Querida", "Lygia Bojunga"));
$livro3 = new Livro("Coraline", "Neil Gaiman", 2002, "Terror", NULL, 3, gerarCapa("Coraline", "Neil Gaiman"));
$livro4 = new Livro("Senhora", "José de Alencar", 1875, "Romance", NULL, 4, gerarCapa("Senhora", "José de Alencar"));
$livro5 = new Livro("O Cortiço", "Aluísio Azevedo", 1890, "Romance", NULL, 5, gerarCapa("O Cortiço", "Aluísio Azevedo"));

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
            print "Insira seus dados:\n";
            $aluno = new Aluno(readline("Insira seu nome: "), readline("Insira sua idade: "), readline("Insira seu CPF: "), readline("Insira sua matricula:" ), readline("Insira sua senha da biblioteca: "));
            print "Bem-vindo(a)" . $aluno->getNome() . "!!!";
            menuAluno($aluno, $livros, $livrosDisponiveis, $livrosEmprestados);
        break;

        case 2:
            print "Insira seus dados:\n";
            $bibliotecario = new Bibliotecario(readline("Insira seu nome: "), readline("Insira sua idade: "), readline("Insira seu CPF: "), readline("Insira seu número de funcionário:" ), readline("Insira sua senha de funcionário: "));
            print "Bem-vindo(a)" . $bibliotecario->getNome() . "!!!";print "Bem-vindo(a)" . $bibliotecario->getNome() . "!!!";
            menuBibliotecario($bibliotecario, $livros, $livrosEmprestados, $livrosDisponiveis);
        break;

        default:
            print "\nOpção inválida\n";
            system("clear");
    }
}while($opcao != 0);

//FUNCOES DO SISTEMA

function gerarCapa($titulo, $autor)
{
    return "\n ___________________________"."\n|                           |"."\n|    " . $titulo . "   |"."\n|                           |"."\n|___________________________|"."\n|                           |"."\n|    " . $autor . "   |"."\n|                           |"."\n|___________________________|"."\n|                           |"."\n|                           |" ."\n|                           |" . "\n|___________________________|\n";
}

function menuAluno($aluno, $livros, $livrosDisponiveis, $livrosEmprestados)
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

            break;

            case 1:
                LivrosDisponiveis($livros, $livrosDisponiveis);
                $aluno->EmprestarLivro($livros);
            break;

            case 2:
                LivrosEmprestados($livros, $livrosEmprestados);
                $aluno->DevolverLivro($livros); 
            break;
            
            case 3:
                ListarLivros($livros, $livrosDisponiveis, $livrosEmprestados);
            break;

            default:
                print "\nOpção inválida\n";
                system("clear");
        }
    }while($opcaoAluno != 0);
}

function menuBibliotecario($bibliotecario, $livros, $livrosEmprestados, $livrosDisponiveis)
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
                
            break;

            case 1:
                $bibliotecario->CadastrarLivro($livros);
            break;

            case 2:
                $bibliotecario->ExcluirLivro($livros, $livrosEmprestados);
            break;
            
            case 3:
                ListarLivros($livros, $livrosDisponiveis, $livrosEmprestados);
            break;

            default:
                print "\nOpção inválida\n";
                system("clear");
        }
    }while($opcaoBibliotecario != 0);
}

function ListarLivros($livros, $livrosDisponiveis, $livrosEmprestados)
{
    $inx = 1;
    foreach($livros as $l)
    {
        if ($l->getAlunoResponsavel() != NULL) 
        {
            print $inx . "-" . $l->getTitulo() ." | ". $l->getAutor() . "(EMPRESTADO)\n";
            array_push($livrosEmprestados, $l);
        }else{
            print $inx . "-" . $l->getTitulo() ." | ". $l->getAutor() . "(DISPONÍVEL)\n";
            array_push($livrosDisponiveis, $l);
        }
        $inx++;
    }
}

function LivrosDisponiveis($livros, $livrosDisponiveis)
{
    $inx = 1;
    foreach($livros as $l)
    {
        if ($l->getAlunoResponsavel() == NULL) 
        {
            print $inx . "-" . $l->getTitulo() ." | ". $l->getAutor() . "\n";
            array_push($livrosDisponiveis, $l);
        }
        $inx++;
    }
    return $livrosDisponiveis;
}

function LivrosEmprestados($livros, $livrosEmprestados)
{
    $inx = 1;
    foreach($livros as $l)
    {
        if ($l->getAlunoResponsavel() != NULL) 
        {
            print $inx . "-" . $l->getTitulo() ." | ". $l->getAutor() . "\n";
            array_push($livrosEmprestados, $l);
        }
        $inx++;
    }
    return $livrosEmprestados;
}