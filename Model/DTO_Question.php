<?php

Class DTOQuestion{

	private $idQuestion;
	private $sousCategorie;
	private $nbChamps;
	private $contenu;

	public function __construct($idQ, $sousCategorie, $nbChamps, $contenu){

		$this->idQuestion=$idQ;
		$this->sousCategorie=$sousCategorie;
		$this->nbChamps=$nbChamps;
		$this->contenu=$contenu;

	}

	public function __get($attribut){

		switch ($attribut) {
			case 'idQuestion' : 
				return $this->idQuestion;
				break;

			case 'sousCategorie':
				return $this->sousCategorie;
				break;
				
			case 'nbChamps':
				return $this->nbChamps;
				break;
			
			case 'contenu':
				return $this->contenu;
				break;		
			
			default:
				return -1;
				break;
		}

	}

	public function __set($attribut, $val){

		switch ($attribut){

			case 'idQuestion':
				$this->idQuestion=$val;
				break;

			case 'sousCategorie':
				$this->sousCategorie=$val;
				break;
				
			case 'nbChamps':
				$this->nbChamps=$val;
				break;
			
			case 'contenu':
				$this->contenu=$val;
				break;		
			
			default:
				return -1;
				break;

		}


	}

}
