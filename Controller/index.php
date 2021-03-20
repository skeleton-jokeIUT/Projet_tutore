<?php

session_start();

require_once('../Model/DAO_Personne.php');
require_once('../Model/DTO_Personne.php');

$object = new DAOPersonne(); 

$p1=$object->getById(1);
$p2=$object->getById(2);

echo "Utilisateur : ".$p2->__get('id')." <br>nom : ".$p2->__get('nom')."<br>email : ".$p2->__get('mail');





