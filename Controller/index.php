<?php

session_start();

var_dump($_POST);
var_dump($_SESSION);
var_dump($_GET);

require_once('../Model/DAO_Personne.php');
require_once('../Model/DAO_Client.php');
require_once('../Model/DAO_Question.php');
require_once('../Model/DAO_Sondage.php');
require_once('../Model/DAO_Correspondance.php');

unset($_SESSION['message']);

$personne = new DAOPersonne(); 
$client= new DAOClient();
$question = new DAOQuestion();
$sondage = new DAOSondage();
$correspondance = new DAOCorrespondance();

$module = 'accueil';
$message="";


if (isset($_GET['deco'])){
	unset($_SESSION['login']);
	unset($_SESSION['id']);
}

if(isset($_SESSION['login'])){

	$module="compte";	
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

			$sondage->creerSondage($_POST['nom'], $_SESSION['id'], $_POST['dateDebut'], $_POST['dateFin']);
			$_SESSION['nomSondage']=$_POST['nom'];
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

if(isset($_GET['creer_question']) || isset($_POST['ajoutQuestion'])){

	if(!isset($_SESSION['login'])){

		header("location: index.php");
	}
	else $module='question';
}

if(isset($_POST['parametreQuestion']) || isset($_GET['ajoutChamp'])){

	if(!isset($_SESSION['login'])){

		header("location: index.php");
	}
	else $module='parametreQuestion';

}

if(isset($_GET['liste_sondage'])){

	if(!isset($_SESSION['login'])){

		header("location: index.php");
	}
	else {
		$module='listeSondage';
		unset($_SESSION['nomSondage']);
	}


}

if(isset($_GET['nomSondage'])){

	if(!isset($_SESSION['login'])){

		header("location: index.php");
	}
	else {
		$module='infoSondage';
		$_SESSION['nomSondage']=$_GET['nomSondage'];
	}
}	

//Gestion des traitements associés à la création de question
if(isset($_GET['ajoutQuestion']) || isset($_POST['sauvegarderQuestion'])){

	$module="question";

	if(isset($_POST['sauvegarderQuestion'])){

		if((isset($_POST['nomQuestionQCM']) && $_POST['nomQuestionQCM']!="") || (isset($_POST['nomQuestionCommentaire']) && $_POST['nomQuestionCommentaire']!="") || (isset($_POST['nomQuestionEchelle']) && $_POST['nomQuestionEchelle']!="") && isset($_POST['commentaire'])){

			//traitement de la création de qcm et qcu
			if($_POST['question']=="qcm" || $_POST['question']=="qcu"){

				$champs=array();

				$cpt=0;

				for($cptChamp=1;$cptChamp<7;$cptChamp++){

				
					if ($_POST['champs'.$cptChamp]!=""){

						$champs[$cpt]=$_POST['champs'.$cptChamp];
						$cpt++;				
					}

				}		

				if (sizeof($champs)==0){

					 $message="aucune case champs renseignée";
					 $module="question";
				}
				else {

					$nom=$sondage->getByIDclientAndNom($_SESSION['id'], $_SESSION['nomSondage']);
					$numero=$nom->__get('numeroSondage');
					if($_POST['question']=="qcm") $question->creerQCM($_POST['nomQuestionQCM'], $numero, 'qcm',$champs, $_POST['commentaire']);
					else $question->creerQCM($_POST['nomQuestionQCM'], $numero, 'qcu',$champs, $_POST['commentaire']);
					$module='infoSondage';
				}
			}
			
			//traitement de la création d'échelle
			else if($_POST['question']=="echelle"){

				$nom=$sondage->getByIDclientAndNom($_SESSION['id'], $_SESSION['nomSondage']);
				$numero=$nom->__get('numeroSondage');
				$question->creerQuestionEchelle($_POST['nomQuestionEchelle'], $numero, 'echelle',$_POST['min'], $_POST['max'], $_POST['increment'], $_POST['commentaire']);
				$module='infoSondage';

			}
			//traitement de la création de texte
			else if($_POST['question']=="commentaire"){

				echo "COMMENT";

				$nom=$sondage->getByIDclientAndNom($_SESSION['id'], $_SESSION['nomSondage']);
				$numeroSondage=$nom->__get('numeroSondage');
				$question->creerQuestionCommentaire($_POST['nomQuestionCommentaire'], $numeroSondage, 'commentaire');
				$module='infoSondage';

			}
		}
		else {

			$message= "Les cases titres et/ou commentaires n'ont pas été renseignée. Merci de recommencer";
			$module='question';
		}
	}
}



if ($module=='accueil'){

	include('../Vue/start.php');
	include('../Vue/home.php');
	include('../Vue/end.php');
	
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

if($module=='listeSondage'){

	include('../Vue/start.php');
	include('../Vue/listeSondage.php');
	include('../Vue/end.php');

}

if($module=='sondage'){

	include('../Vue/start.php');
	include('../Vue/sondage.php');
	include('../Vue/end.php');
}

if($module=='infoSondage'){

	include('../Vue/start.php');
	include('../Vue/infoSondage.php');
	include('../Vue/end.php');
}

if($module=='connexion'){

	include('../Vue/start.php');
	include('../Vue/form-connexion.php');
	include('../Vue/end.php');
}

if($module=='question'){

	include('../Vue/start.php');
	include('../Vue/question.php');
	include('../Vue/end.php');

}

if($module=='parametreQuestion'){

	include('../Vue/start.php');
	include('../Vue/parametreQuestionCaseACocher.php');
	include('../Vue/end.php');

}

$nom=$sondage->getByIDclientAndNom(3, 'test4');
$test=$nom->__get('numeroSondage');
echo $test;


var_dump($module);