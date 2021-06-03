<?php
//session_start();
require_once('../model/Personne_DAO.php');

$message_deco="Déconnexion";
if(!isset($_SESSION['login'])) header('Location: index.php');
if(!isset($_GET['module']) || $_GET['module']!='dashboard'){
	header('Location: index.php'); //forcer un utilsateur à passer par la page index
}
$pDao= new Personne_DAO();
$profil=$pDao->getByEmail($_SESSION['login']);

include('../view/start.php');
include('../view/dashboard_content.php');
include('../view/end.php');