<div>
	<p>Information : <br><a><?= $sondage->afficherSondage($_SESSION['id'],$_SESSION['login'],$_SESSION['nomSondage'])?></p>
</div>

<div>
	<p>Liste questions : créer la fonction "afficherlisteQuestion" après avoir ajouté la possibilité de créer des questions et trigger sur table correspondance
	</p>
	<form method="post" action="index.php">
		<button name="ajoutQuestion">Ajoutez question</button>
	</form>
</div>	