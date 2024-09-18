<?php
namespace App\Src\problema1;

class SMS implements InterfaceMensageiro {
    public function enviar($mensagem) {
        echo "SMS enviado: $mensagem\n";
    }
}