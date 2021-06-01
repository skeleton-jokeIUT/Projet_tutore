 <?php
 require_once('Personne_DTO.php');


 class Personne_DAO{

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


    public function getByEmail($email){

        $req='SELECT * from personne where email=?;';
        $response=$this->bdd->prepare($req);
        $response->execute(array($email));
        $data=$response->fetch();
        $response->closeCursor();
        $profil=new Personne_DTO($data['id_personne'],
                                $data['nom'],
                                $data['prenom'],
                                $data['email'],
                                $data['role'],
                                $data['age'],
                                $data['nationalite'],
                                $data['statut_marital'],
                                $data['profession'],
                                $data['revenu'],
                                $data['ville']);
        return $profil;
    }  
    
 	public function existPerson($email){

        $requete='select * from personne;';
		$reponse=$this->bdd->query($requete);
        	while ($data=$reponse ->fetch())
				{
					if ($email==$data['email'])
					{
						$reponse->closeCursor();
                        return true;
                    }
				}
        $reponse->closeCursor();
		return false;

    }  

    public function insertPersonDefault($nom,$prenom,$email){

        $requete='INSERT into personne (nom,prenom,email) VALUES (:t_nom, :t_prenom, :t_email);';
        $req=$this->bdd->prepare($requete);
        $req->execute(array('t_nom'=>$nom,
                            't_prenom'=>$prenom, 
                            't_email'=>$email));
    }

    public function insertPersonComplet($nom,$prenom,$email,$age,$nationalite,$statutMarital,$role,$profession,$revenu,$ville){

        $requete='INSERT into personne (nom,prenom,email,age,nationalite,statut_marital,role,profession,revenu,ville) 
        VALUES (:t_nom, :t_prenom, :t_email, :t_age, :t_nationalite, :t_statut_marital, :t_role, :t_profession, :t_revenu, :t_ville);';
        $req=$this->bdd->prepare($requete);
        $req->execute(array('t_nom'=>$nom,
                            't_prenom'=>$prenom, 
                            't_email'=>$email, 
                            't_age'=>$age,
                            't_nationalite'=>$nationalite,
                            't_statut_marital'=>$statutMarital,
                            't_role'=>$role,
                            't_profession'=>$profession,
                            't_revenu'=>$revenu,
                            't_ville'=>$ville));
    }

    public function updatePerson($attribut,$val,$email){
        
        $requete='';
        switch ($attribut){
            case 'age'          : 
                                    $requete='UPDATE personne SET age = :t_val where email= :t_email;';
                                    break;
            case 'nationalite'  :
                                    $requete='UPDATE personne SET nationalite = :t_val where email= :t_email;';
                                    break;
            case 'statut_marital':
                                    $requete='UPDATE personne SET statut_marital = :t_val where email= :t_email;';
                                    break;
            case 'role'         :
                                    $requete='UPDATE personne SET role = :t_val where email= :t_email;';
                                    break;  
            case 'profession'   :
                                    $requete='UPDATE personne SET profession = :t_val where email= :t_email;';
                                    break; 
            case 'revenu'       :
                                    $requete='UPDATE personne SET revenu = :t_val where email= :t_email;';
                                    break;     
            case 'ville'       :
                                    $requete='UPDATE personne SET ville = :t_val where email= :t_email;';
                                                                         
        }
        $req=$this->bdd->prepare($requete);
        $req->execute(array('t_val'=>$val,'t_email'=>$email));
    
    }

 }




