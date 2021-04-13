<?php


Class DTOClient{

	private $idClient;
	private $idPersonne;
	private $login;
	private $mdp;

	public function __construct($idC, $idP, $login, $mdp){

		$this->idClient=$idC;
		$this->idPersonne=$idP;
		$this->login=$login;
		$this->mdp=$mdp;

	}

	public function __get($attribut){

		switch ($attribut) {
			case 'idClient':
				return $this->idClient;
				break;

			case 'idPersonne':
				return $this->idPersonne;
				break;
				
			case 'login':
				return $this->login;
				break;
			
			case 'mdp':
				return $this->mdp;
				break;		
			
			default:
				return "null";
				break;
		}

	}

	public function __set($attribut, $val){

		switch ($attribut){

			case 'idClient':
				$this->idClient=$val;
				break;

			case 'idPersonne':
				$this->idPersonne=$val;
				break;
				
			case 'login':
				$this->login=$val;
				break;
			
			case 'mdp':
				$this->mdp=$val;
				break;		
			
			default:
				return "null";
				break;

		}


	}

}
