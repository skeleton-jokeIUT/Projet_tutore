<a href="ControllerAcceuil.php?module=index&deco" class="deco">Déconnexion</a>
<div class="form-jeu">
	<h3>Le jeu du roulette</h3>
	<div class="username">
	<?php 
		echo htmlspecialchars($_SESSION['username']); 
	?>
	</div>
	<form action="ControllerAcceuil.php?module=roulette" class="form-check-input" method="POST">
		<input type="text" name="mise" class="jeu-mise" placeholder="Votre mise">
		<hr>
		<div class="choix-jeu">
			<div>
				<label for="nombre" >Miser sur un nombre</label><br>
				<input type="number" name="nombre" min="1" max="36" step="1"> 
			</div>
			<div>
				<p>ou</p>
			</div>
			<div>
				<label for="parité">Miser sur la parité</label><br>
				<input type="radio" name="parité" value="pair"><label for="pair">Pair</label>
				<input type="radio" name="parité" value="impair"><label for="impair">Impair</label>
			</div>
		</div>
		<hr>
		<div class="valider-jeu">
			<button name="btnValider" class="btn-valider">Jouer</button>
		</div>
	</form>
</div>
<div class="tirage">
	<h3>Le tirage</h3>
	<?php if ($tirage) echo '<h4>'.$tirage.'</h4>'; ?>
</div>
<div class="resultat">
	<h3>Résultat</h3>
	<?= $message ?>
</div>
<h4>Registre de jeux (les 20 jeux derniers)</h4>
<p>Vous avez le solde du compte : <?= $solde ?> euro(s)</p>
<?php
	foreach($gameRec as $key =>$value){
		echo $gameRec[$key];
	}
?>