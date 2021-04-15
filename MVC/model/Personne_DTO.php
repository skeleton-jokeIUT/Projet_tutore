<?php

Class Personne_DTO{

	private $idPersonne;
	private $nom;
	private $prenom;
	private $role;
	private $email;
	private $age;
	private $nationalite;
	private $statutMarital; 
	private $profession;
	private $revenu;
	private $ville;


	public function __construct($id, $nom, $prenom, $mail,$role,$age,$nationalite,$statutMarital,$profession,$revenu,$ville){

		$this->idPersonne=$id;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->email=$mail;
		$this->age=$age;
		$this->nationalite=$nationalite;
		$this->statutMarital=$statutMarital;
		$this->profession=$profession;
		$this->revenu=$revenu;
		$this->ville=$ville;


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
			return $this->email;
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

	public function __set($attribut, $val){

        switch ($attribut){

			case'id' : 
			$this->idPersonne=$val;
			break;

			case'nom' : 
			$this->nom=$val;
			break; 

			case'prenom' : 
			$this->prenom=$val;
			break; 

			case'age' : 
			$this->age==$val;
			break; 

			case'mail' : 
			$this->email=$val;
			break; 

			case'nationalite' : 
			$this->nationalite=$val;
			break; 

			case'statutMarital' : 
			$this->statutMarital=$val;
			break; 

			case'revenu' : 
			$this->revenu=$val;
			break; 

			case'ville' : 
			$this->ville=$val;
			break; 

			case'role' : 
			$this->role=$val;
			break; 

			case'profession' : 
			$this->profession=$val;
			break; 

		}
    }

    public function __toString(){
		return '<br>ID personne: '.$this->id.'<br>Nom: '.$this->nom.'<br>Prénom: '.$this->prenom.'<br>Email: '.$this->email.
        '<br>Age: '.$this->age.'<br>Nationalité: '.$this->nationalite.'<br>Statu marital: '.$this->statutMarital.'<br>Role: '
        .$this->role.'<br>Professon: '.$this->profession.'<br>Revenu: '.$this->revenu.' €<br>Ville : '.$this->ville.'<br>';
        
	}

}
