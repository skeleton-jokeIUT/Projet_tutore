<?php

Class DTOClient{

	private $idQuestion;
	private $numeroSondage;
	
	public function __construct($idQuestion, $numeroSondage){

		$this->idQuestion=$idQuestion;
		$this->numeroSondage=$numeroSondage;
		

	}

	public function __get($attribut){

		switch ($attribut) {
			case 'idQuestion':
				return $this->idQuestion;
				break;

			case 'numeroSondage':
				return $this->numeroSondage;
				break;
			
			default:
				return "null";
				break;
		}

	}

	public function __set($attribut, $val){

		switch ($attribut){

			case 'idQuestion':
				$this->idQuestion=$val;
				break;

			case 'numeroSondage':
				$this->numeroSondage=$val;
				break;
			
			default:
				return "null";
				break;

		}


	}

}
