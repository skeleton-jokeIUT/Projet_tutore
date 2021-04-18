<div>
	
	<form>
		
	</form>
</div>

<div>
	<form method="post" <?= 'action="index.php?nomSondage='.$_SESSION['nomSondage'].'"' ?>
		<legend><legend>Paramètres généraux</legend>
			<label>Titre<input type="text" name="nomQuestion"></label>

		<legend>Champs Question</legend>
			<p>Un champs obligatoire (max6), les autres peuvent être laissé vide</p>
			<label>Champs 1 : <input type="text" name="champs1"></label>
			<br><label>Champs 2 : <input type="text" name="champs2"></label>
			<br><label>Champs 3 : <input type="text" name="champs3"></label>
			<br><label>Champs 4 : <input type="text" name="champs4"></label>
			<br><label>Champs 5 : <input type="text" name="champs5"></label>
			<br><label>Champs 6 : <input type="text" name="champs6"></label>
			<br><label>commentaire : Oui<input type="radio" value="oui" id="oui" name="commentaire"> Non<input type="radio" id="non" value="non" name="commentaire"></label>
			<button name="sauvegarderQuestion">Sauvegarder question</button>
	</form>	

		
</div>