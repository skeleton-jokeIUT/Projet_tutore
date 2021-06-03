<?php
require_once('Client_DTO.php');
require_once('Personne_DAO.php');

class Client_DAO{
	private $bdd;
	private $host='localhost';
    private $dbname='projet_tutore';
    private $user='root';
    private $password='';
    

	public function __construct(){
		 try {
            $this->bdd=new PDO(
                'mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8',
                $this->user,//username
                $this->password //Password
            );
        }	
            catch(Exception $e) {
                die('ERROR !!! : '.$e->getMessage());
        } 
	}

	 public function connectUser($login,$mdp){

        $requete ='select * from client where Login=?;';
		$reponse = $this->bdd->prepare($requete);
		$reponse->execute(array($login));
		$data = $reponse ->fetch();
        $reponse->closeCursor();	
        if($login == $data['Login'] && $mdp == $data['MDP'])
        {
            return true;
        }
        else return false;      
    }

	public function getByLogin($login){

			$requete='SELECT * from client where Login=?;';
			$reponse=$this->bdd->prepare($requete);
			$reponse->execute(array($login));
			$data=$reponse->fetch();
			$reponse->closeCursor();	
			$user=new Client_DTO($data['ID_Client'],$data['ID_Personne'],$data['Login'],$data['MDP']);
			return $user;	
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
	public function insertClient($email,$mdp){

			$p_dao=new Personne_DAO();
			$profil=$p_dao->getByEmail($email);	
			$requete='INSERT into Client (ID_Personne,Login,MDP) VALUES (:t_id_personne,:t_login,:t_mdp);';
			$req=$this->bdd->prepare($requete);
			$req->execute(array('t_id_personne'=>$profil->id, 't_login'=>$email,'t_mdp'=>$mdp));
		
	}
      

    /*public function updatePlayer($sum,$id){

		$requete='UPDATE player SET money=:t_sum where id=:t_id;';
		$req=$this->bdd->prepare($requete);
		$req->execute(array('t_sum'=>$sum, 't_id'=>$id));
    }
*/

}