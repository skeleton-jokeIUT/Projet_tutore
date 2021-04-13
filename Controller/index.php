<?php

session_start();

require_once('../Model/DAO_Personne.php');
require_once('../Model/DAO_Client.php');
require_once('../Model/DAO_Question.php');
require_once('../Model/DAO_Sondage.php');
require_once('../Model/DAO_Correspondance.php');


$personne = new DAOPersonne(); 
$client= new DAOClient();
$question = new DAOQuestion();
$sondage = new DAOSondage();
$correspondance = new DAOCorrespondance();

$module = 'accueil';

if (isset($_POST['inscription']) $module='inscription';

if ($module=='accueil'){

	include('accueil.html');
}

if ($module=='inscription'){
	include('inscription.html');
}





