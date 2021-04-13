<?php

Class DTOSondage{

	private $numero_sondage;
	private $ID_client;
	private $nombre_question;
	private $date_creation;
	private $date_fin;

	public function __construct($numeroSondage, $idClient, $nombreQuestion, $dateCreation, $dateFin){

		$this->numero_sondage=$numeroSondage;
		$this->ID_client=$idClient;
		$this->nombre_question=$nombreQuestion;
		$this->date_creation=$dateCreation;
		$this->date_fin=$dateFin;

	}

	public function __get($attribut){

		switch ($attribut) {
			case 'numeroSondage':
				return $this->numero_sondage;
				break;

			case 'idClient':
				return $this->ID_client;
				break;
				
			case 'nombreQuestion':
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

			case 'numeroSondage':
				$this->numero_sondage=$val;
				break;

			case 'idClient':
				$this->ID_client=$val;
				break;
				
			case 'nombreQuestion':
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
