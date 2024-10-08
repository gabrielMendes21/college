<?php
namespace App\Src\loginComInterface;

interface UsuarioInterface {
    public function autenticar(string $login, string $senha): bool;
    public function autorizar(): array;
}