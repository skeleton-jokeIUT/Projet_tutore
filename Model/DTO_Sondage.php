<?php

Class DTOClient{

	private $numero_sondage;
	private $ID_client;
	private $nombre_question;
	private $date_creation;
	private $date_fin;

	public function __construct($numSondage, $idClient, $nbQuestion, $dateCreation, $dateFin){

		$this->numero_sondage=$numSondage;
		$this->ID_client=$idClient;
		$this->nombre_question=$nbQuestion;
		$this->date_creation=$dateCreation;
		$this->date_fin=$dateFin;

	}

	public function __get($attribut){

		switch ($attribut) {
			case 'numSondage':
				return $this->numero_sondage;
				break;

			case 'idClient':
				return $this->ID_client;
				break;
				
			case 'nbQuestion':
				return $this->nombre_question;
				break;
			
			case 'dateCreation':
				return $this->date_creation;
				break;	

			case 'dateFin':
				return $this->date_fin;
				break;			
			
			default:
				return "null";
				break;
		}

	}

	public function __set($attribut, $val){

		switch ($attribut){

			case 'numSondage':
				$this->numero_sondage=$val;
				break;

			case 'idClient':
				$this->ID_client=$val;
				break;
				
			case 'nbQuestion':
				$this->nombre_question=$val;
				break;
			
			case 'dateCreation':
				$this->date_creation=$val;
				break;	

			case 'dateFin' :
				$this->date_fin=$val;
				break; 		
			
			default:
				return "null";
				break;

		}


	}

}
