<?php

require_once('../Model/DTO_Reponse.php');

class DAOReponse{

	private $bdd; 

	public function __construct(){
		try{
   			$this->bdd= new PDO(
   				"mysql:host=localhost;dbname=surv'easy;charset=utf8",
   				'Johan',
   				'1234');
		}

		catch (Exception $e) {
     		die('Erreur'.$e->getMessage());
		}
	}
    
    public function insertReponse($idPersonne,$idQuestion,$reponse,$commentaire){
        $sql = 'INSERT INTO reponse (ID_Personne,ID_Question,Reponse,commentaire) VALUES (:t_idPersonne,:t_idQuestion,:t_reponse,:t_commentaire);';
		$req = $this->bdd->prepare($sql);
		$req->execute(array('t_idPersonne'=>$idPersonne,
                            't_idQuestion'=>$idQuestion,
                            't_reponse'=>$reponse,
                            't_commentaire'=>$commentaire));
    }

     public function getByIdQuestion($idQuestion){
         $sql = 'SELECT * FROM sondage WHERE ID_Question =?;';
         $req = $this->bdd->prepare($sql);
         $req->execute([$idQuestion]);
         $data = $req->fetchAll();
         $req->closeCursor();
         $reponse=[];
        foreach($data as $ligne =>$col)
        {
            $reponse[$ligne] = new DTOReponse($col['ID_Personne'],$col['ID_Question'],$col['Reponse'],$col['commentaire']);
        }
        return $reponse;
     }
}
