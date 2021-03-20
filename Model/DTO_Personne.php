<?php

Class DTOPersonne(){

	private $idPersonne;
	private $nom;
	private $prenom;
	private $role;
	private $mail;
	private $age;
	private $nationalite;
	private $statutMarital; 
	private $profession;
	private $revenu;
	private $ville;

	public function __construct($id){

		$this->idPersonne=$id;
	
	}

	public function __construct($id, $name, $prenom, $mail){

		$this->idPersonne=$id;
		$this->nom=$name
		$this->prenom=$prenom;
		$this->mail=$mail;


	}

	public function __get($attribut){

		switch ($attribut){

			case'id' : 
			return $this->idPersonne;
			break; 

			case'nom' : 
			return $this->nom;
			break; 

			case'prenom' : 
			return $this->prenom;
			break; 

			case'age' : 
			return $this->age;
			break; 

			case'mail' : 
			return $this->mail;
			break; 

			case'nationalite' : 
			return $this->nationalite;
			break; 

			case'statutMarital' : 
			return $this->statutMarital;
			break; 

			case'revenu' : 
			return $this->revenu;
			break; 

			case'ville' : 
			return $this->ville;
			break; 

			case'role' : 
			return $this->role;
			break; 

			case'profession' : 
			return $this->profession;
			break; 

		}
	}
		

}