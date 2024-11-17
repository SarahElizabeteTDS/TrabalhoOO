<?php
class Livro{
    private $titulo;
    private $disponivel = true;
    private $dataEmprestimo;

    public function __contruct($titulo){
        $this->titulo = $titulo;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function isDisponivel(){
        return $this->disponivel;
    }
    
    public function marcarEmprestado(){
        $this->disponivel = false;
        $this->dataEmprestimo = new DateTime();
    }

    public function marcarDisponivel(){
        $this->disponivel = true;
        $this->dataEmprestimo = null;
    }

    public function calcularPrazoRenovar(){
        if ($this->dataEmprestimo){
            $prazo = clone $this->dataEmprestimo;
            $prazo->modify("+7 Dias");
            return $prazo->format('d-m-Y');
        }
        return 'Não emprestado.';
    }

}