<?php

require_once('../Model/DTO_Personne.php');

class DAOPersonne{

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
 		$sql = 'SELECT * FROM personne WHERE ID_personne=?';
		$req = $this->bdd->prepare($sql);
		$req->execute([$i]);
		$data = $req->fetch(); 
		$personne = new DTOPersonne($i, $data['Nom'], $data['Prenom'], $data['mail'],$data['Role'], $data['Age'], $data['Nationalite'], $data['Statut_marital'] ,$data['Profession'] ,$data['revenu'], $data['ville']);
		return $personne;
	}
}