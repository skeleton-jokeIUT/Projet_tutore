<?php

require_once('../Model/DTO_Question.php');

class DAOQuestion{

	private $bdd; 

	public function __construct(){
		try{
   			$this->bdd= new PDO(
   				"mysql:host=localhost;dbname=surv'easy;charset=utf8",
   				'Johan',
   				'1234');
		}

		catch (Exception $e) {
     		die('Erreur'.$e->getMessage());
		}
	}

	public function getByIdSondage($idS) { //permet de récupérer des question d'un sondage indiqué
 		$sql = 'SELECT * FROM question WHERE ID_Sondage=?';
		$req = $this->bdd->prepare($sql);
		$req->execute([$idS]);
		$data = $req->fetchAll(); 
		$req->closeCursor();
		$questions=[];
		foreach($data as $ligne =>$col)
		{
			$questions[$ligne] = new DTOQuestion($col['ID_Question'],$col['ID_Sondage'],$col['nomQuestion'],
								$col['Sous_categorie'], $col['nb_champs'], $col['champ1'],$col['champ2'],$col['champ3'],
		  						$col['champ4'],$col['champ5'],$col['champ6'],$col['commentaire']);
		}
		
		return $questions;
	}

	public function creerQCM($nomQuestion, $numeroSondage, $sousCat, $champs, $commentaire){

		if($commentaire=="") $commentaire="non";

		switch (sizeof($champs)) {
			case '1':
				$sql='INSERT into question (nomQuestion, ID_Sondage, nb_champs, Sous_categorie, champ1, commentaire)
							values (:t_nomQuestion, :t_ID_sondage, :t_nb_champs, :t_sousCat, :t_champ1, :t_commentaire)';
				$req=$this->bdd->prepare($sql);
				$req->execute(array(
						't_nomQuestion'=>$nomQuestion,
						't_ID_sondage'=>$numeroSondage,
						't_nb_champs'=>1,
						't_sousCat'=>$sousCat,
						't_champ1'=>$champs[0],
						't_commentaire'=>$commentaire));
				break;

			case '2':
				$sql='INSERT into question (nomQuestion, ID_Sondage, nb_champs, Sous_categorie, champ1, champ2, commentaire)
							values (:t_nomQuestion, :t_ID_sondage, :t_nb_champs, :t_sousCat, :t_champ1, :t_champ2, :t_commentaire)';
				$req=$this->bdd->prepare($sql);
				$req->execute(array(
						't_nomQuestion'=>$nomQuestion,
						't_ID_sondage'=>$numeroSondage,
						't_nb_champs'=>2,
						't_sousCat'=>$sousCat,
						't_champ1'=>$champs[0],
						't_champ2'=>$champs[1],
						't_commentaire'=>$commentaire));
				break;
			
			case '3':
				$sql='INSERT into question (nomQuestion, ID_Sondage, nb_champs, Sous_categorie, champ1, champ2, champ3, commentaire)
							values (:t_nomQuestion, :t_ID_sondage, :t_nb_champs, :t_sousCat, :t_champ1, :t_champ2, :t_champ3, :t_commentaire)';
				$req=$this->bdd->prepare($sql);
				$req->execute(array(
						't_nomQuestion'=>$nomQuestion,
						't_ID_sondage'=>$numeroSondage,
						't_nb_champs'=>3,
						't_sousCat'=>$sousCat,
						't_champ1'=>$champs[0],
						't_champ2'=>$champs[1],
						't_champ3'=>$champs[2],
						't_commentaire'=>$commentaire));
				break;

			case '4':
				$sql='INSERT into question (nomQuestion, ID_Sondage, nb_champs, Sous_categorie, champ1, champ2, champ3, champ4, commentaire)
							values (:t_nomQuestion, :t_ID_sondage, :t_nb_champs, :t_sousCat, :t_champ1, :t_champ2, :t_champ3, :t_champ4, :t_commentaire)';
				$req=$this->bdd->prepare($sql);
				$req->execute(array(
						't_nomQuestion'=>$nomQuestion,
						't_ID_sondage'=>$numeroSondage,
						't_nb_champs'=>4,
						't_sousCat'=>$sousCat,
						't_champ1'=>$champs[0],
						't_champ2'=>$champs[1],
						't_champ3'=>$champs[2],
						't_champ4'=>$champs[3],
						't_commentaire'=>$commentaire));	
				break;
				
			case '5':
				$sql='INSERT into question (nomQuestion, ID_Sondage, nb_champs, Sous_categorie, champ1, champ2, champ3, champ4, champ5, commentaire)
							values (:t_nomQuestion, :t_ID_sondage, :t_nb_champs, :t_sousCat, :t_champ1, :t_champ2, :t_champ3, :t_champ4, :t_champ5, :t_commentaire)';
				$req=$this->bdd->prepare($sql);
				$req->execute(array(
						't_nomQuestion'=>$nomQuestion,
						't_ID_sondage'=>$numeroSondage,
						't_nb_champs'=>5,
						't_sousCat'=>$sousCat,
						't_champ1'=>$champs[0],
						't_champ2'=>$champs[1],
						't_champ3'=>$champs[2],
						't_champ4'=>$champs[3],
						't_champ5'=>$champs[4],
						't_commentaire'=>$commentaire));
				break;
				
			case '6':
				$sql='INSERT into question (nomQuestion, ID_Sondage, nb_champs, Sous_categorie, champ1, champ2, champ3, champ4, champ5, champ6, commentaire)
							values (:t_nomQuestion, :t_ID_sondage, :t_nb_champs, :t_sousCat, :t_champ1, :t_champ2, :t_champ3, :t_champ4, :t_champ5, :t_champ6, :t_commentaire)';
				$req=$this->bdd->prepare($sql);
				$req->execute(array(
						't_nomQuestion'=>$nomQuestion,
						't_ID_sondage'=>$numeroSondage,
						't_nb_champs'=>6,
						't_sousCat'=>$sousCat,
						't_champ1'=>$champs[0],
						't_champ2'=>$champs[1],
						't_champ3'=>$champs[2],
						't_champ4'=>$champs[3],
						't_champ5'=>$champs[4],
						't_champ6'=>$champs[5],
						't_commentaire'=>$commentaire));
				break;					
			
			default:
				echo "probleme";
				break;
		}

	}

	public function creerQuestionEchelle($nomQuestion, $numeroSondage, $sousCat, $min, $max, $increment, $commentaire){

		$sql='INSERT into question (nomQuestion, ID_Sondage, nb_champs, Sous_categorie, champ1, champ2, champ3, commentaire)
							values (:t_nomQuestion, :t_ID_sondage, :t_nb_champs, :t_sousCat, :t_champ1, :t_champ2, :t_champ3, :t_commentaire)';
				$req=$this->bdd->prepare($sql);
				$req->execute(array(
						't_nomQuestion'=>$nomQuestion,
						't_ID_sondage'=>$numeroSondage,
						't_nb_champs'=>3,
						't_sousCat'=>$sousCat,
						't_champ1'=>$min,
						't_champ2'=>$max,
						't_champ3'=>$increment,
						't_commentaire'=>$commentaire));

	}

	public function creerQuestionCommentaire($nomQuestion, $numeroSondage, $sousCat){

		echo $nomQuestion.' '.$numeroSondage.' '.$sousCat;

		$sql='INSERT into question (nomQuestion, ID_Sondage, nb_champs, champ1, Sous_categorie)
							values (:t_nomQuestion, :t_ID_sondage, :t_nb_champs, :t_champ1, :t_sousCat)';
		$req=$this->bdd->prepare($sql);
		$req->execute(array(
						't_nomQuestion'=>$nomQuestion,
						't_ID_sondage'=>$numeroSondage,
						't_nb_champs'=>1,
						't_champ1'=>"",
						't_sousCat'=>$sousCat));
	}

	public function remplirTableau(){

	}


	public function ajoutChamps($cpt){

		return '<br><label>Champ '.$cpt.' :<input type="text" name="champ'.$cpt.'"</label>';
		
	}
	
}