<?php

class DAOPersonne(){

	private $bdd; 

	public function __construct(){
		try{
   			$this->bdd= new PDO(
   				'mysql:host=localhost;dbname=joueur;charset=utf8',
   				'Johan',
   				'1234');
		}

		catch (Exception $e) {
     		die('Erreur'.$e->getMessage());
		}
	}

	public function getById($i) { #permet de récupérer une ligne d'une personne via l'ID
 		$sql = 'SELECT * FROM personne WHERE id_Personne=?';
		$req = $this->bdd->prepare($sql);
		$req->execute([$i]);
		$data = $req->fetch(); 
		$joueur = new DTOjoueur($i, $data['libelle'], $data['prix']);
		return $joueur;
	}
}