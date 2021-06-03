<?php
session_start();
$message_deco="";

if (isset($_GET['module']))
{
    $module=$_GET['module'];
	if (file_exists($module.'.php'))
	{
    	include($module.'.php');
	}
	else
	{
    include('../view/error.php');
	}
}
else
{
	include('../view/start.php');
	include('../view/home.php');
	include('../view/end.php');
}


if(isset($_GET['deco'])) 
{
	unset($_SESSION['login']);  //log out si passer par le lien "déconnxion"	
}




