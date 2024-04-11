<?php
require 'vendor/autoload.php';
use App\Src\loginComAbstract\Login;
// use App\Src\loginComInterface\Login;

$login = new Login();
$login->executar('eu','123');