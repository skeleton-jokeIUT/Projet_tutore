<div>
	
	<form>
		<legend>Paramètres généraux</legend>
			<label>Titre<input type="text" name="nomQuestion"></label>
	</form>
</div>

<div>
	<form method="post">
		<legend>Champs Question</legend>
			<p>Un champs obligatoire (max6), les autres peuvent être laissé vide</p>
			<label>Champs 1 : <input type="text" name="champs1"></label>
			<br><label>Champs 2 : <input type="text" name="champs2"></label>
			<br><label>Champs 3 : <input type="text" name="champs3"></label>
			<br><label>Champs 4 : <input type="text" name="champs4"></label>
			<br><label>Champs 5 : <input type="text" name="champs5"></label>
			<br><label>Champs 6 : <input type="text" name="champs6"></label>
			<br><label>Ajout d'un champs commentaire : <input type="text" name="champs7"></label>
	</form>	

	<button name="sauvegarderQuestion"> <?= '<a href="index.php?nomSondage='.$_SESSION['nomSondage'].'"</a>' ?>Sauvegarder question</a></button>	
</div>