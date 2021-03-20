<?php

session_start();

require_once('../Model/DAO_Personne.php');
require_once('../Model/DAO_Client.php');

require_once('../Model/DTO_Personne.php');
require_once('../Model/DTO_Client.php');



$personne = new DAOPersonne(); 
$client= new DAOClient();


$p1=$personne->getById(1);
$p2=$personne->getById(2);

echo "Utilisateur : ".$p2->__get('id')." <br>nom : ".$p2->__get('nom')."<br>email : ".$p2->__get('mail')."<br>";

$c1=$client->getById(1);
$c2=$client->getById(2);

echo "ID Client : ".$c1->__get('idClient')." login : ".$c1->__get('login')." mdp : ".$c1->__get('mdp')."<br>";
echo "ID Client : ".$c2->__get('idClient')."<br>";







