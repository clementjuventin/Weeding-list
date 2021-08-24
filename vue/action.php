<?php
$rootRepository = __DIR__ . '/../';

require_once($rootRepository . 'config/config.php');
require_once($rootRepository . 'modele/Connection.php');
require_once($rootRepository . 'modele/gateway/GatewayObjet.php');
require_once($rootRepository . 'modele/metier/Objet.php');
require_once($rootRepository . 'modele/gateway/GatewayParticipant.php');

global $mdp, $login, $dsn;
$con = new Connection($dsn, $login, $mdp);
$gatewayParticipant = new GatewayParticipant($con);
$gatewayObjet = new GatewayObjet($con);
$gatewayParticipant->insert($_POST['surname'], $_POST['id'], $_POST['number']);
$gatewayObjet->updateObjet($_POST['id'], $_POST['number']);
