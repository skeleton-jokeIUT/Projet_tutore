
<div class="content">
    <div class="left"></div>
    <div class="middle" id="form_login">
			<form class="form-check-input" action="index.php?module=login" method="POST">
				<h3>Connexion</h3>
				<label>Login (votre email): </label>
				<input type="text"  name="login">
				<label>Mot de passe : </label>
				<input type="password" name="mdp">
				<button type="reset" name="btnReset" class="btn-reset">Effacer</button>
				<button name="btnValider" class="btn-valider">Valider</button>
				<p><a href="">Mot de passe oublié</a></p>
			</form>
		<?= $message_erreur ?>
	</div>
    <div class="right"></div>
</div>

	