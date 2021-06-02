<?php

require_once('../Model/DTO_Sondage.php');

class DAOSondage{

	private $bdd; 

	public function __construct(){
		try{
   			$this->bdd= new PDO(
   				"mysql:host=localhost;dbname=surv'easy;charset=utf8",
   				'util',
   				'Util1234!');
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
		$sondage = new DTOSondage($data['numero_sondage'], $data['ID_client'], $data['nomSondage'], $data['nombre_question'], $data['Date_creation'], $data['Date_fin']);
		return $sondage;
	}

	public function getByIDclientAndNom($idClient, $nomSondage) { #permet de récupérer une ligne d'une personne via l'ID
 		$sql = 'SELECT * FROM sondage WHERE ID_client = ? and nomSondage=?';
		$req = $this->bdd->prepare($sql);
		$req->execute([$idClient, $nomSondage]);
		$data = $req->fetch(); 
		$sondage = new DTOSondage($data['numero_sondage'], $data['ID_client'], $data['nomSondage'], $data['nombre_question'], $data['Date_creation'], $data['Date_fin']);
		return $sondage;
	}


	public function choixSondage(){

	}

	public function creerSondage($nom, $idClient, $dateDebut, $dateFin){

		if($dateFin!=""){

			$sql='INSERT INTO sondage(nomSondage, ID_client, Date_creation, Date_fin) values(:t_nom, :t_ID_client :t_debut, :t_fin)';
			$req=$this->bdd->prepare($sql);
			$req->execute(array('t_nom' =>$nom ,
								't_ID_client'=>$idClient,
								't_debut'=>$dateDebut,
								't_fin'=>$dateFin));

		}
		else{

			$sql='INSERT INTO sondage(nomSondage, ID_client, Date_creation) values(:t_nom, :t_ID_client, :t_debut)';
			$req=$this->bdd->prepare($sql);
			$req->execute(array('t_nom' =>$nom ,
								't_ID_client'=>$idClient,
								't_debut'=>$dateDebut));

		}
	}

	public function afficherListeSondage($idClient){

		$sql='SELECT * FROM sondage where ID_client = ?';
		$req=$this->bdd->prepare($sql);
		$req->execute([$idClient]);
		
		while($data=$req->fetch()){
			echo '<a href="index.php?nomSondage='.$data['nomSondage'].'">'.$data['nomSondage'].'</a><br>';
		}
	}

	public function afficherSondage($idClient, $login, $nomSondage){

		$sql='SELECT * FROM sondage where ID_client = ? and nomSondage= ? ';
		$req=$this->bdd->prepare($sql);
		$req->execute([$idClient, $nomSondage]);
		
		$data=$req->fetch();

		echo "Nom Sondage : ".$data['nomSondage']."<br>Créateur : ".$login."<br>Nombre de question : ".$data['nombre_question'];
	}

	

	
}
