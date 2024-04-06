<?php
namespace App\src;
abstract class Pessoa {
    private $nome;
    private $idade;

    public abstract function logar();
    public abstract function cadastrar();

    public function criar() {
        echo "Método criar";
    }
}