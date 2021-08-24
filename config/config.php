<?php
require_once(__DIR__.'/env.php');

$dConfig['includes'] = array('Validation.php');

//BD
$dsn = "mysql:host=".HOST.";dbname=".DB_NAME.";charset=utf8";
$login = DB_LOGIN;
$mdp = DB_PASSWORD;

//WEBSITE
define('LISTE','liste');
$vues[LISTE] = 'vue/liste.php';