<?php
namespace App\Src;

class Email implements InterfaceMensageiro {
    public function enviar($mensagem) {
        echo "Mensagem enviada: $mensagem";
    }
}