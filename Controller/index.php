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


$p1=$personne->getById(1);
$p2=$personne->getById(2);

echo "Utilisateur : ".$p2->__get('id')." <br>nom : ".$p2->__get('nom')."<br>email : ".$p2->__get('mail')."<br>";

$c1=$client->getById(1);
$c2=$client->getById(2);

echo "<br> Client : <br>ID Client : ".$c1->__get('idClient')." login : ".$c1->__get('login')." mdp : ".$c1->__get('mdp')."<br>";
echo "ID Client : ".$c2->__get('idClient')."<br>";

$q1=$question->getById(1);
$q2=$question->getById(2);

echo "<br> Question  : <br>ID question : ".$q1->__get('idQuestion')." Sous-cat :  ".$q1->__get('sousCategorie')." champs : ".$q1->__get('nbChamps')." contenu : ".$q1->__get('contenu')."<br>";
echo "ID question : ".$q2->__get('idQuestion')." Sous-cat :  ".$q2->__get('sousCategorie')." champs : ".$q2->__get('nbChamps')." contenu : ".$q2->__get('contenu')."<br>";


$s1=$sondage->getByNumero(1);

echo "<br> Sondage : <br>ID Client : ".$s1->__get('idClient')." numero Sondage :  ".$s1->__get('numeroSondage')." nombre Question : ".$s1->__get('nombreQuestion')." Date debut ".$s1->__get('dateDebut')."Date Fin : ".$s1->__get('dateFin')."<br>";


$cor1=$correspondance->getById(1,1);
$cor2=$correspondance->getById(1,2);

echo "<br> Correspondance : <br>ID question : ".$cor1->__get('idQuestion')." numero Sondage :  ".$cor1->__get('numeroSondage')."<br>";
echo "ID question : ".$cor2->__get('idQuestion')." numero SOndage :  ".$cor2->__get('numeroSondage')."<br>";








