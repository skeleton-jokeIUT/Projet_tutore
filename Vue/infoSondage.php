<div>
	<p>Information : <br><a><?= $sondage->afficherSondage($_SESSION['id'],$_SESSION['login'],$_SESSION['idSondage'])?></p>
</div>

<div>
	<p>Liste questions : créer la fonction "afficherlisteQuestion" après avoir ajouté la possibilité de créer des questions et trigger sur table correspondance
	</p>
	<form method="GET" action="index.php?creerQuestion">
		<button name="ajoutQuestion">Ajoutez question</button>
		<button name="listeQuestion">Voir la liste des questions</button>
		<button name="listeReponse">Voir les réponses</button>
	</form>
</div>	