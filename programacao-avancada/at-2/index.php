<?php
require 'vendor/autoload.php';
use App\Src\loginComAbstract\UsuarioFactory;
// use App\Src\loginComInterface\UsuarioFactory;

function login($perfil, $login, $senha) {
    $usuario = UsuarioFactory::criar($perfil);
    
    if ($usuario->autenticar($login, $senha)) {
        $autorizacoes = $usuario->autorizar();
        echo "Bem-vindo, $login! Você tem acesso às seguintes funcionalidades: " . implode(', ', $autorizacoes);
    } else {
        echo "Login ou senha incorretos";
    }
}
login("administrador", "Gabriel", "123456");