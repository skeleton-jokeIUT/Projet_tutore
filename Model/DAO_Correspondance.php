<?php

require_once('../Model/DTO_Correspondance.php');

class DAOCorrespondance{

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

	public function getById($numeroSondage, $idQuestion) { 
 		$sql = 'SELECT * FROM correspondance WHERE ID_Question=? and numero_sondage =? ';
		$req = $this->bdd->prepare($sql);
		$req->execute([$idQuestion, $numeroSondage]);
		$data = $req->fetch(); 
		$correspondance = new DTOCorrespondance($data['ID_Question'], $data['numero_sondage']);
		return $correspondance;
	}
}