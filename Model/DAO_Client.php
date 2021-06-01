<?php

require_once('../Model/DTO_Client.php');

class DAOClient{

	private $bdd; 

	public function __construct(){
		try{
   			$this->bdd= new PDO(
   				"mysql:host=localhost;dbname=surv'easy;charset=utf8",
   				'util',
   				'Util1234!');
		}

		catch (Exception $e) {
     		die('Erreur'.$e->getMessage());
		}
	}

	public function getById($i) { #permet de récupérer une ligne d'une personne via l'ID
 		$sql = 'SELECT * FROM client WHERE ID_Client=?';
		$req = $this->bdd->prepare($sql);
		$req->execute([$i]);
		$data = $req->fetch(); 
		$client = new DTOClient($data['ID_Client'], $data['ID_Personne'], $data['Login'], $data['MDP']);
		return $client;
	}

	public function getByLogin($i) { #permet de récupérer une ligne d'une personne via l'ID
 		$sql = 'SELECT * FROM client WHERE login=?';
		$req = $this->bdd->prepare($sql);
		$req->execute([$i]);
		$data = $req->fetch(); 
		$client = new DTOClient($data['ID_Client'], $data['ID_Personne'], $data['login'], $data['MDP']);
		return $client;
	}

	public function connexion($login,$mdp){

        $requete ='select * from client where login=?;';
		$reponse = $this->bdd->prepare($requete);
		$reponse->execute(array($login));
		$data = $reponse ->fetch();
        $reponse->closeCursor();	
        if($login == $data['login'] && $mdp == $data['MDP'])
        {
            return true;
        }
        else return false;      
    }

    public function existClient($email){
		
        $requete='select * from client;';
		$reponse=$this->bdd->query($requete);
        	while ($data=$reponse ->fetch())
				{
					if ($email==$data['Login'])
					{
						$reponse->closeCursor();
                        return true;
                    }
				}
        $reponse->closeCursor();
		return false;
	}

		//insert user dans la table Cleint 
	public function inscription($login,$email,$mdp){

			//une personne pas forcément un client.
			//$profil=$p_dao->getByEmail($email);	
			$requete='INSERT into Client (login, MDP, email) VALUES (:t_login, :t_mdp, :t_email);';
			$req=$this->bdd->prepare($requete);
			$req->execute(array('t_login'=>$login, 't_mdp'=>$mdp, ':t_email'=>$email));
		
	}
}