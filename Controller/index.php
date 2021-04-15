<?php

var_dump($_POST);
//var_dump($_SESSION);

session_start();

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
	unset($_SESSION);
}

if (isset($_POST['inscription'])) {

	$module='inscription';

}

if(isset($_POST['inscrire'])){

		if ( isset($_POST['login']) && isset($_POST['password']) && $_POST['login']!="" && $_POST['password']!=""){

				$client->inscription($_POST['login'], $_POST['password']);
				echo "string";
			}	
		else {

			$module='inscription';
			echo "<br>case pas renseignée";

		}
}

if (isset($_GET['creer_sondage'])){

	$module='sondage';
}

if ($module=='accueil'){

	include('accueil.html');
	
}

if ($module=='inscription'){

	if(isset($_POST['name']) && $_POST['name']!="") echo "page suivante";
	else include('inscription.html');
}

if($module=='sondage'){

	if(isset($_POST['valider'])){

		if(isset($_POST['nom']) && isset($_POST['dateDebut']) && $_POST['dateDebut']!="" && $_POST['nom']!=""){

			$sondage->creerSondage($_POST['nom'], $_POST['dateDebut'], $_POST['dateFin']);
			echo "le sondage a été créé";

		}
		else {

			echo "une case obligatoire n'a pas été renseignée";

		}

	}

	include('sondage.html');
}