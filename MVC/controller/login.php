<?php
//session_start();
require_once('../model/Client_DAO.php');
$dao = new Client_DAO();
$message_erreur='';
$message_deco="";

if(!isset($_GET['module']) || $_GET['module']!='login'){
	header('Location: index.php'); //forcer un utilsateur à passer par la page index
}

if(isset($_POST['btnValider'])) 
	if(isset($_POST['login']) && $_POST['login'] != ''
	&& isset($_POST['mdp']) && $_POST['mdp'] != '') {
		if(strlen($_POST['login'])<=30)
		{
			if($dao->connectUser($_POST['login'],$_POST['mdp']))
			{
				$_SESSION['login'] = $_POST['login'];
				header('Location: index.php?module=dashboard');
			}
			else $message_erreur= 'Erreur lors de la saisie';
		}
		else $message_erreur="Il est interdit l'username comptant plus de 30 caractères!";	
	}
	else { $message_erreur= 'Erreur, champs inexistant ou vide'; }

if(isset($_SESSION['login'])) 
	header('Location: index.php?module=dashboard');
   
include('../view/start.php');
include('../view/form-connexion.php');
include('../view/end.php');