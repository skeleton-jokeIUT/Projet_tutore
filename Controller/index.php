<?php

session_start();

var_dump($_POST);
var_dump($_SESSION);

require_once('../Model/DAO_Personne.php');
require_once('../Model/DAO_Client.php');
require_once('../Model/DAO_Question.php');
require_once('../Model/DAO_Sondage.php');
require_once('../Model/DAO_Correspondance.php');


$personne = new DAOPersonne(); 
$client= new DAOClient();
$question = new DAOQuestion();
$sondage = new DAOSondage();
$correspondance = new DAOCorrespondance();

$module = 'accueil';

if (isset($_GET['deco'])){
	unset($_SESSION['login']);
}

if (isset($_GET['inscription'])) {

	if(isset($_SESSION['login'])){

		$module='compte';
	}
	else if(isset($_POST['btnValider'])){

		if ( isset($_POST['login']) && isset($_POST['mdp']) && $_POST['login']!="" && $_POST['mdp']!=""){

				$client->inscription($_POST['login'], $_POST['email'], $_POST['mdp']);
				$clientInscrit=$client->getByLogin($_POST['login']);
				$_SESSION['login']=$clientInscrit->__get('login');
				$_SESSION['id']=$clientInscrit->__get('idClient');

				echo "inscription réussie";			
			}	
		else {

			$module='inscription';
			echo "<br>case pas renseignée";

		}
	}
	else $module='inscription';

}

if(isset($_GET['login'])){

	if(isset($_SESSION['login'])){
		$module='compte';
	}
	else if(isset($_POST['btnValider'])){

		if(isset($_POST['login']) && isset($_POST['mdp']) && $_POST['login']!="" && $_POST['mdp']!=""){

			$clientConnecté=$client->connexion($_POST['login'], $_POST['mdp']);
			echo $clientConnecté;

			if ($clientConnecté==true) {
				
				$clientConnecté=$client->getByLogin($_POST['login']);
				$_SESSION['login']=$clientConnecté->__get('login');
				$_SESSION['id']=$clientConnecté->__get('idClient');
			}
			else echo "combo login / mdp erroné";
			$module='connexion';

		}
		else{
			echo "case pas renseignée";
			$module='connexion';
		}
	}
	else $module='connexion';

}

if (isset($_GET['creer_sondage'])){
	
	if(!isset($_SESSION['login'])){

		header("location: index.php");
	}
	else if(isset($_POST['valider'])){

		if(isset($_POST['nom']) && isset($_POST['dateDebut']) && $_POST['dateDebut']!="" && $_POST['nom']!=""){

			$sondage->creerSondage($_POST['nom'], $_POST['dateDebut'], $_POST['dateFin']);
			$module='question';
			echo "le sondage a bien été créé";

		}
		else {

			echo "une case obligatoire n'a pas été renseignée";
			/*echo"Liste Sondage : <br>";
			$sondage->afficherListeSondage(2);*/
			$module='sondage';
		}
	}
	else {
		$module='sondage';
	}

}


if ($module=='inscription'){
	
		include('../Vue/start.php');
		include('../Vue/form-inscription.php');
		include('../Vue/end.php');
	
	}

if ($module=='compte'){
	
		include('../Vue/start.php');
		include('../Vue/dashboard_content.php');
		include('../Vue/end.php');
	
	}

if($module=='sondage'){

	
		
		include('../Vue/start.php');
		include('sondage.html');
		include('../Vue/end.php');
	}

if($module=='connexion'){

	include('../Vue/start.php');
	include('../Vue/form-connexion.php');
	include('../Vue/end.php');
}

if($module=='question'){

	include('../Vue/start.php');
	include('question.html');
	include('../Vue/end.php');

}

if ($module=='accueil'){

	include('../Vue/start.php');
	include('../Vue/home.php');
	include('../Vue/end.php');
	
}