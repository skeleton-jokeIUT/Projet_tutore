<?php

session_start();

require_once('../Model/DAO_Personne.php');
require_once('../Model/DAO_Client.php');
require_once('../Model/DAO_Question.php');


$personne = new DAOPersonne(); 
$client= new DAOClient();
$question = new DAOQuestion();


$p1=$personne->getById(1);
$p2=$personne->getById(2);

echo "Utilisateur : ".$p2->__get('id')." <br>nom : ".$p2->__get('nom')."<br>email : ".$p2->__get('mail')."<br>";

$c1=$client->getById(1);
$c2=$client->getById(2);

echo "ID Client : ".$c1->__get('idClient')." login : ".$c1->__get('login')." mdp : ".$c1->__get('mdp')."<br>";
echo "ID Client : ".$c2->__get('idClient')."<br>";

$q1=$question->getById(1);
$q2=$question->getById(2);

echo "ID question : ".$q1->__get('idQuestion')." Sous-cat :  ".$q1->__get('sousCategorie')." champs : ".$q1->__get('nbChamps')." contenu : ".$q1->__get('contenu')."<br>";
echo "ID question : ".$q2->__get('idQuestion')." Sous-cat :  ".$q2->__get('sousCategorie')." champs : ".$q2->__get('nbChamps')." contenu : ".$q2->__get('contenu')."<br>";







