	<p>Créer votre question</p>

	<?php echo $message ?>

	<form method="POST" action="index.php?nomSondage=<?php echo $_SESSION['nomSondage'] ?>" >
		<legend>Types de question</legend>
			<label>QCM<input type="radio" id="QCM" name="question" value="qcm"></label>
			<label>QCU<input type="radio" id="QCU" name="question" value="qcu"></label>
			<legend>Echelle<input type="radio" id="Echelle" name="question" value="echelle"></legend>
			<label>Zone de texte<input type="radio" id="Commentaire" name="question" value="commentaire"></label>

		<div id="QCM_QCU">

				<legend>Paramètres généraux</legend>

				<label><br>Question a poser : <input type="text" name="nomQuestionQCM"></label>

				<legend>Champs Question</legend>
					<p>Un champs obligatoire (max6), les autres peuvent être laissé vide</p>
					<label>Champs 1 : <input type="text" name="champs1"></label>
					<br><label>Champs 2 : <input type="text" name="champs2"></label>
					<br><label>Champs 3 : <input type="text" name="champs3"></label>
					<br><label>Champs 4 : <input type="text" name="champs4"></label>
					<br><label>Champs 5 : <input type="text" name="champs5"></label>
					<br><label>Champs 6 : <input type="text" name="champs6"></label>
					<br><label>commentaire : Oui<input type="radio" value="oui" id="ouiCommentaire" name="commentaire"> Non<input type="radio" id="nonCommentaire" value="non" name="commentaire"></label>
					<button name="sauvegarderQuestion">Sauvegarder question</button>
			
		</div>

		<div id="COMMENTAIRE">
					<legend>Paramètres généraux</legend>
					<label>Question a poser : <input type="text" name="nomQuestionCommentaire"></label>
					<button name="sauvegarderQuestion">Sauvegarder question</button>
		</div>

		<div id="ECHELLE">

				<legend>Paramètres généraux</legend>
					<label>Question a poser : <input type="text" name="nomQuestionEchelle"></label>

				<legend>Champs Question</legend>
					<p>Veuillez préciser la valeur de début et celle de fin ainsi que l'écart en chaque valeur</p>
					<label> Label min <input type="text" id="label-min" name="label-min"></label>
					<label> Label max <input type="text" id="label-max" name="label-max"></label>
					<label>Valeur minimum : <input type="number" id="min" name="min"></label>
					<br><label>Valeur Maximum : <input type="number" id="max" name="max"></label>
					<br><label>Incrément : <input type="number" id="increment" name="increment"></label>

					<br><label>commentaire : Oui<input type="radio" value="oui" id="oui" name="commentaire"> Non<input type="radio" id="non" value="non" name="commentaire"></label>
					<button name="sauvegarderQuestion">Sauvegarder question</button>
				
		</div>

	</form>
		


	<a href="index.php">Sauvegarder et retourner à l'acceuil</a>
	
</body>
</html>

<script type="text/javascript">
	
	var paramQCM_QCU= document.getElementById("QCM_QCU");
	var paramCOMMENTAIRE= document.getElementById("COMMENTAIRE");
	var paramECHELLE = document.getElementById("ECHELLE");

	paramQCM_QCU.style.display="none";
	paramCOMMENTAIRE.style.display="none";
	paramECHELLE.style.display="none";


	var radioQCM = document.getElementById("QCM");
	radioQCM.addEventListener("click",verifierValeurRadio);

	var radioQCU = document.getElementById("QCU");
	radioQCU.addEventListener("click",verifierValeurRadio);

	var radioEchelle = document.getElementById("Echelle");
	radioEchelle.addEventListener("click",verifierValeurRadio);

	var radioCommentaire = document.getElementById("Commentaire");
	radioCommentaire.addEventListener("click",verifierValeurRadio);

	var radioEchelle = document.getElementById("Echelle");
	radioEchelle.addEventListener("click",verifierValeurRadio);

	function verifierValeurRadio(){

		if(radioQCM.checked){	
			paramCOMMENTAIRE.style.display="none";
			paramQCM_QCU.style.display="block";
			paramECHELLE.style.display="none";
		}
		else if(radioQCU.checked){
			paramCOMMENTAIRE.style.display="none";
			paramQCM_QCU.style.display="block";
			paramECHELLE.style.display="none";
		}
		else if(radioCommentaire.checked){
			paramCOMMENTAIRE.style.display="block";
			paramQCM_QCU.style.display="none";
			paramECHELLE.style.display="none";	
		}
		else if(radioEchelle.checked){
			paramCOMMENTAIRE.style.display="none";
			paramQCM_QCU.style.display="none";
			paramECHELLE.style.display="block";	
		}
		else{
			paramCOMMENTAIRE.style.display="none";
			paramQCM_QCU.style.display="none";
			paramECHELLE.style.display="none";	
		}
	}

</script>