<?php

require_once('../Model/DTO_Client.php');

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

	public function getById($i) { #permet de récupérer une ligne d'une personne via l'ID
 		$sql = 'SELECT * FROM client WHERE ID_Client=?';
		$req = $this->bdd->prepare($sql);
		$req->execute([$i]);
		$data = $req->fetch(); 
		$client = new DTOClient($data['ID_Client'], $data['ID_Personne'], $data['Login'], $data['MDP']);
		return $client;
	}

	public function inscription($login, $mdp){

		$sql = 'SELECT Login from client where login=?';
		$req = $this->bdd->prepare($sql);
		$req->execute([$login]);
		$data=$req->fetch();
		
		if($data['login']!=$login){
			
			$sql = 'INSERT INTO client (login, MDP) values ($login, $mdp)';
			$req = $this->bdd->prepare($sql);
			$req->execute();
		}
		else echo "ce pseudo existe déjà. Merci d'en saisir un autre.";	

	}

	public function connexion(){


	}

}