<?php
require_once(__DIR__.'/config/config.php');
require('config/Autoload.php');

Autoload::charger();

$cont = new ControlerFront();
?>