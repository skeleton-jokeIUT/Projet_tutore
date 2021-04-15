<?php
//session_start();
require_once('../model/Client_DAO.php');
require_once('../model/Personne_DAO.php');
$cDao=new Client_DAO();
$pDao=new Personne_DAO();
$message_deco="";
$message_erreur1='';
$message_erreur2='';
$message_erreur3='';
$message_erreur4='';
$valide=true;

if(isset($_SESSION['login']))
	{
		unset($_SESSION['login']); //navigater à cette page; forcer log out si un utilisateur déjà log in									
	}  
if(!isset($_GET['module']) || $_GET['module']!='inscription')
{
	header('Location: index.php'); //forcer un utilsateur à passer par la page d'accueil 
}

if(isset($_POST['btnValider']))
{
	if(!isset($_POST['nom']) || $_POST['nom'] == '')
	{
		$valide=false;
		$message_erreur1="champ invalide : Saisir votre nom";
	}
	if(!isset($_POST['prenom']) || $_POST['prenom'] == '')
	{
		$valide=false;
		$message_erreur2="champ invalide : Saisir votre prénom";
	}
	if(!isset($_POST['email']) || $_POST['email'] == '')
	{
		$valide=false;
		$message_erreur3="champ invalide : Saisir votre email";
	}
	else
	{
		if (strlen($_POST['email'])>30)
		{
			$valide=false;
			$message_erreur3="champ invalide : Email max. 30 caractères";	
		}
	}
	
	if(!isset($_POST['mdp']) || $_POST['mdp'] == '')
	{
		$valide=false;
		$message_erreur4="champ invalide : Mot de passe";
	}
	else
	{
		if(strlen($_POST['mdp'])<8)
		{
			$valide=false;
			$message_erreur4="champ invalide : Mot de passe min. 8 caractères";
		}
	}
	if($valide)
	{
		if (!$pDao->existPerson($_POST['email']))
			{
				$pDao->insertPerson($_POST['nom'],
									$_POST['prenom'],
									$_POST['email'],
									$_POST['age'],
									$_POST['nationalite'],
									$_POST['statut_marital'],
									$_POST['role'],
									$_POST['profession'],
									$_POST['revenu'],
									$_POST['ville']);
				
				if(!$cDao->existClient($_POST['email']))
				{
					$cDao->insertClient($_POST['email'],$_POST['mdp']);
					$_SESSION['login']=$_POST['email'];
					header('Location: index.php?module=dashboard');
				}			
			}
			else $message_erreur3="champ invalide : Cet email est déjà utilisé!";	
	}
	
}


include('../view/start.php');
include('../view/form-inscription.php');
include('../view/end.php');
