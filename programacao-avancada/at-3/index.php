<?php
// Exercício de polimorfismo
// Toda classe implementa uma interface, fazendo com que todas tenham o mesmo método, mas cada uma terá uma implementação diferente dele
require "vendor/autoload.php";
use App\Src\problema1\InterfaceMensageiro;
use App\Src\problema1\Whatsapp;
use App\Src\problema1\Email;
use App\Src\problema1\SMS;

use App\Src\problema2\InterfacePersonagem;
use App\Src\problema2\Mago;
use App\Src\problema2\Guerreiro;
use App\Src\problema2\Arqueiro;

function enviarMensagem(InterfaceMensageiro $mensageiro, $mensagem) {
    $mensageiro->enviar($mensagem);
}

enviarMensagem(new Whatsapp(), "Bom dia");
enviarMensagem(new SMS(), "Boa tarde");
enviarMensagem(new Email(), "Boa noite");

function ataque(InterfacePersonagem $personagem) {
    $personagem->atacar();
}

ataque(new Mago());
ataque(new Guerreiro());
ataque(new Arqueiro());