<?php

require_once('../Model/DTO_Sondage.php');

class DAOSondage{

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
		$sondage = new DTOSondage($data['numero_sondage'], $data['ID_client'], $data['nombre_question'], $data['Date_creation'], $data['Date_fin']);
		return $sondage;
	}


	public function choixSondage(){

	}

	public function creerSondage($nom, $dateDebut, $dateFin){

		if($dateFin!=""){

			$sql='INSERT INTO sondage(nomSondage, Date_creation, Date_fin) values(:t_nom, :t_debut, :t_fin)';
			$req=$this->bdd->prepare($sql);
			$req->execute(array('t_nom' =>$nom ,
								't_debut'=>$dateDebut,
								't_fin'=>$dateFin));

		}
		else{

			$sql='INSERT INTO sondage(nomSondage, Date_creation) values(:t_nom, :t_debut)';
			$req=$this->bdd->prepare($sql);
			$req->execute(array('t_nom' =>$nom ,
								't_debut'=>$dateDebut));

		}
	}

	public function afficherListeSondage($idClient){

		$sql='SELECT * FROM sondage where ID_client = ?';
		$req=$this->bdd->prepare($sql);
		$req->execute([$idClient]);
		
		while($data=$req->fetch()){
			echo $data['nomSondage']."<br>";
		}
	}
	
}
