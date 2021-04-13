<?php

require_once('../Model/DTO_Sondage.php');

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

	public function getByNumero($i) { #permet de récupérer une ligne d'une personne via l'ID
 		$sql = 'SELECT * FROM sondage WHERE numero_sondage=?';
		$req = $this->bdd->prepare($sql);
		$req->execute([$i]);
		$data = $req->fetch(); 
		$sondage = new DTOSondage($data['numero_sondage'], $data['ID_client'], $data['nombre_question'], $data['Date_Creation'], $data['Date_fin']);
		return $sondage;
	}
}