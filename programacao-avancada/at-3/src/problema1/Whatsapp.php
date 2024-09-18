<?php
namespace App\Src\problema1;

class Whatsapp implements InterfaceMensageiro {
    public function enviar($mensagem) {
        echo "Mensagem enviada: $mensagem\n";
    }
}