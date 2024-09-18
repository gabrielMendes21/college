<?php
namespace App\Src\problema1;

class Email implements InterfaceMensageiro {
    public function enviar($mensagem) {
        echo "Email enviado: $mensagem\n";
    }
}