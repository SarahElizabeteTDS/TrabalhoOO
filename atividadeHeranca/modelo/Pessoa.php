<?php

require_once("IPessoa.php");

class Pessoa implements IPessoa
{
    protected string $nome;
    protected int $idade;
    protected int $cpf;
    
    public function listarLivros($array)
    {
        $inx = 1;
        foreach($array as $a)
        {
            return $inx . " - " . $a . "\n";
            $inx++;
        }
    }
    
    //perguntar para o professor
    
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
