<?php

Class DTOReponse{

	private $idPersonne;
	private $idQuestion;
	private $reponse;
	private $commentaire;


	public function __construct($idPersonne, $idQuestion, $reponse, $commentaire){

		$this->idPersonne=$idPersonne;
		$this->idQuestion=$idQuestion;
		$this->reponse=$reponse;
		$this->commentaire=$commentaire;

	}

	public function __get($attribut){

		switch ($attribut) {
			case 'idPersonne':
				return $this->idPersonne;
				break;

			case 'idQuestion':
				return $this->idQuestion;
				break;

			case 'reponse':
				return $this->reponse;
				break;
				
			case 'commentaire':
				return $this->commentaire;
				break;
			default : 
                    return null;
		}

	}

	public function __set($attribut, $val){

		switch ($attribut){

			case 'idPersonne':
				$this->idPersonne=$val;
				break;
            case 'idQuestion' :
                $this->idQuestion=$val;
                break;
            case 'reponse' :
                $this->reponse=$val;
                break;
            case 'commentaire' :
                $this->commentaire=$val;
                break;
        }   
    }         

}    
          
    
