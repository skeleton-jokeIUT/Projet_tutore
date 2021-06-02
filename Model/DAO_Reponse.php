<?php

require_once('../Model/DTO_Reponse.php');

class DAOReponse{

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

	public function afficherReponse($idSondage){

		$sql ='SELECT * from question where ID_Sondage=?';
		$req= $this->bdd->prepare($sql);
		$req->execute([$idSondage]);

		while($data=$req->fetch()){

			echo '<p>Question : '.$data['nomQuestion'].'</p> 
			<table>
				<tbody>';

			$sql2 ='SELECT * from reponse where ID_Question=?';
			$req2= $this->bdd->prepare($sql2);
			$req2->execute([$data['ID_Question']]);

			$i=1;

			while($data2=$req2->fetch()){

				echo '<tr>
						<td></td>
						<td>Reponse '.$i.' : '.$data2['Reponse'].'</td>
					  </tr>';

				$i++;

			}

			echo '</tbody></table>';
		}
	}


}