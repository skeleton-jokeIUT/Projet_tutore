<?php

require_once("../Model/DTO_Question.php");

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

	public function getById($i) { #permet de récupérer une ligne d'une personne via l'ID
 		$sql = 'SELECT * FROM question WHERE ID_Question=?';
		$req = $this->bdd->prepare($sql);
		$req->execute([$i]);
		$data = $req->fetch(); 
		$question = new DTOQuestion($data['ID_Question'], $data['Sous_categorie'], $data['nb_champs'], $data['contenu']);
		return $question;
	}

	public function creerQuestion($nomQuestion, $sousCat, $champs=array()){


		
		
	}

	public function ajoutChamps($cpt){

		return '<br><label>Champ '.$cpt.' :<input type="text" name="champ'.$cpt.'"</label>';
		
	}
	
}