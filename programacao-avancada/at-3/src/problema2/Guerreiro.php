<?php
namespace App\Src\problema2;

class Guerreiro implements InterfacePersonagem {
    public function atacar() {
        echo "Ataque corpo a corpo\n";
    }
}