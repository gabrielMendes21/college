<?php
namespace App\Src;
class Aluno extends Pessoa implements InterfaceHumano {
    public function logar() {
        echo "Login do aluno";
    }

    public function cadastrar() {
        echo "Cadastro do aluno";
    }

    public function falar() {
        echo "Olá";
    }
}