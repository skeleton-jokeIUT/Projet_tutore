<div class="content">
    <div class="left"></div>
    <div class="middle" id="form_inscription">
			<div class="error">
					<?= $message_erreur1 ?><br>
					<?= $message_erreur2 ?><br>
					<?= $message_erreur3 ?><br>
					<?= $message_erreur4 ?><br>				
			</div>
			<form class= "form-inscription" action="index.php?module=inscription" method="POST">
				<fieldset>
					<legend>S'inscrire</legend>
					<div class="fieldset_content"> 
					<label>Nom*:</label><input type="text" name="nom">
					<label>Prénom*:</label><input type="text" name="prenom">
					<label>Email*:</label><input type="text" name="email">
					<label>Mot de passe*:</label><input type="text" name="mdp">
					<label>Age:</label><input type="text" name="age">
					<label>Nationalité:</label><input type="text" name="nationalite">
					<label>Statut marital:</label><input type="text" name="statut_marital">
					<label>Role:</label><input type="text" name="role">
					<label>Profession:</label><input type="text" name="profession">
					<label>Revenu (€):</label><input type="text" name="revenu">
					<label>Ville:</label><input type="text" name="ville">
					</div>
				</fieldset>
					<h4>*champs obligatoires</h4>
					<p>
						En cliquant sur "Créer un compte " ci-dessous, vous acceptez nos <a href="">Conditions Générales de Vente</a> 
						et nos <a href="">Politique de confidentialité</a>.
					</p>
					<button name="btnValider" class="btn-valider">Créer un compte</button>
			</form>
	</div>
    <div class="right"></div>
</div>

