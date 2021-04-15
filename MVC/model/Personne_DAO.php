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

        $req='SELECT * from personne where Email=?;';
        $response=$this->bdd->prepare($req);
        $response->execute(array($email));
        $data=$response->fetch();
        $response->closeCursor();
        $profil=new Personne_DTO($data['ID_Personne'],
                                $data['Nom'],
                                $data['Prenom'],
                                $data['Email'],
                                $data['Role'],
                                $data['Age'],
                                $data['Nationalite'],
                                $data['Statut_marital'],
                                $data['Profession'],
                                $data['Revenu'],
                                $data['Ville']);
        return $profil;
    }  
    
 	public function existPerson($email){

        $requete='select * from personne;';
		$reponse=$this->bdd->query($requete);
        	while ($data=$reponse ->fetch())
				{
					if ($email==$data['Email'])
					{
						$reponse->closeCursor();
                        return true;
                    }
				}
        $reponse->closeCursor();
		return false;

    }  

    

    public function insertPerson($nom,$prenom,$email,$age,$nationalite,$statutMarital,$role,$profession,$revenu,$ville){

        $requete='INSERT into personne (Nom,Prenom,Email,Age,Nationalite,Statut_marital,Role,Profession,Revenu,Ville) 
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

 }




