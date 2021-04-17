
	<p>Bonjour, ici vous pouvez créer votre sondage</p>

	<form method="post" action="index.php?creer_sondage">
		<legend>Option générale</legend>
		<label>Nom sondage : <input type="text" name="nom"></label>
		<br><label>Date de création : <input type="date" name="dateDebut"></label>
		<br><label>Date de fin de diffusion (optionnel) : <input type="date" name="dateFin"></label>
		<button name="valider">Créer</button>
	</form>
