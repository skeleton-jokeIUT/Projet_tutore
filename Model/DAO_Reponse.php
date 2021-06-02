<?php

require_once('../Model/DTO_Reponse.php');

class DAOQuestion{

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