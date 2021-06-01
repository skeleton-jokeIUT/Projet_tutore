<?php

Class DTOQuestion{

	private $idQuestion;
	private $idSondage;
	private $nomQuestion;
	private $sousCategorie;
	private $nbChamps;
	private $champ1;
	private $champ2;
	private $champ3;
	private $champ4;
	private $champ5;
	private $champ6;
	private $commentaire;

	public function __construct($idQ, $idSondage, $nomQuestion, $sousCategorie,
							 	$nbChamps, $champ1,$champ2,$champ3,$champ4,$champ5,$champ6,$commentaire){

		$this->idQuestion=$idQ;
		$this->idSondage=$idSondage;
		$this->nomQuestion=$nomQuestion;
		$this->sousCategorie=$sousCategorie;
		$this->nbChamps=$nbChamps;
		$this->champ1=$champ1;
		$this->champ2=$champ2;
		$this->champ3=$champ3;
		$this->champ4=$champ4;
		$this->$champ5=$champ5;
		$this->champ6=$champ6;
		$this->commentaire=$commentaire;
	}

	public function __get($attribut){

		switch ($attribut) {
			case 'idQuestion' : 
				return $this->idQuestion;
				break;
			case 'idSondage' : 
				return $this->idSondage;
				break;			
			case 'nomQuestion' : 
				return $this->nomQuestion;
				break;
			case 'sousCategorie':
				return $this->sousCategorie;
				break;	
			case 'nbChamps':
				return $this->nbChamps;
				break;				
			case 'champ1':
				return $this->champ1;
				break;
			case 'champ2':
				return $this->champ2;
				break;
			case 'champ3':
				return $this->champ3;
				break;
			case 'champ4':
				return $this->champ4;
				break;
			case 'champ5':
				return $this->champ5;
				break;				
			case 'champ6':
				return $this->champ6;
				break;		
			case 'commentaire':
				return $this->commentaire;
				break;		
			default:
				return null;
		}

	}

	public function __set($attribut, $val){

		switch ($attribut){

			case 'idQuestion':
				$this->idQuestion=$val;
				break;
			case 'idSondage':
				$this->idSondage=$val;
				break;
			case 'nomQuestion':
				$this->nomQuestion=$val;
				break;
	
			case 'sousCategorie':
				$this->sousCategorie=$val;
				break;
				
			case 'nbChamps':
				$this->nbChamps=$val;
				break;
			case 'champ1':
				$this->champ1=$val;
				break;
			case 'champ2':
				$this->champ2=$val;
				break;	
			case 'champ3':
				$this->champ3=$val;
				break;	
			case 'champ4':
				$this->champ4=$val;
				break;
			case 'champ5':
				$this->champ1=$val;
				break;	
			case 'champ6':
				$this->champ1=$val;
				break;	
			case 'commentaire':
				$this->commentaire=$val;
				break;	
			
				
		}


	}

}
