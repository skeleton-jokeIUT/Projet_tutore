<div class="content">
    <div class="left"></div>
    <div class="middle">
        <div class="dashboard">
            <div class="middle_left">    
                <span><a href="index.php?creer_sondage">Créer questionnaire</a></span>
                <span></span>
                <span>Consulter Questionnaire</span>
                <span></span>
                <span>Paramètres</span>
                <span></span>    
            </div>
            <div class="middle_right">
                <div>
                    info principale du compte<br>
                    Login : <?= htmlspecialchars($_SESSION["login"]) ?><br>
                    Liste Sondage : <br> 
                    $sondage->afficherListeSondage(2)

                </div>
            </div>
        </div>    
    </div>
    <div class="right"></div>
</div>