<?php

require_once('../Model/DTO_Correspondance.php');

class DAOClient{

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

	public function getById($idQuestion, $numero_sondage) { 
 		$sql = 'SELECT * FROM correspondance WHERE ID_Question=? and numero_sondage =? ';
		$req = $this->bdd->prepare($sql);
		$req->execute([$idQuestion], [$numero_sondage]);
		$data = $req->fetch(); 
		$correspondance = new DTOClient($data['ID_Question'], $data['numero_sondage']);
		return $correspondance;
	}
}