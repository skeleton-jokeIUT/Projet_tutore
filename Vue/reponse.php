<div class="reponse">
    <form action="index.php?reponse=" method="POST">
    <?php
        foreach($questions as $ligne => $data)
        {
            $typeQ[$ligne] = $data->sousCategorie;
            ?>
           <input type="hidden" value="<?= $data->idQuestion?>" name="idQuestion[]" />
           <input type="hidden" value="<?= $data->sousCategorie;?>" name="typeQ[]" />
            <p><?= $data->nomQuestion ?></p>
           <?php    
           for($i=1;$i<=$data->nbChamps;$i++)
           {
                $nb = "$i";
                $champ = "champ";
                $champ .= $nb;
                $nbchamp = $champ;
                switch($typeQ[$ligne])
                {
                    case "qcm" :
                        ?>    
                            <label><?= $data->$nbchamp ?> : <input type="checkbox" name="reponseQcm[]" value=<?= $data->$nbchamp ?>></label>  
                        <?php
                        break;
                    case "qcu" :
                        ?> 
                        <label><?= $data->$nbchamp ?> <input type="radio" name="reponseQcu" value=<?= $data->$nbchamp ?>></label>
                        <?php
                        break;
                
                }                
                   
           }
         
           switch($typeQ[$ligne])
           {
               case "echelle" :
                ?>
                <?= $data->champ1 ?><input type="range" name="echelle" id="echelle" min=<?= $data->champ3 ?> max=<?= $data->champ4 ?> step=<?= $data->champ5?>> <?= $data->champ2 ?><br>
                <?php
                break;
                case "zonetext" :
                ?>
                    <textarea id="zonetext" name="zonetext" rows="10" cols="100"></textarea><br>    
                <?php
           }
           if($data->commentaire=="oui")
           {?>
                 <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br>    
           <?php
           }
        }         
    ?> 
        <button name="btnvalider" class="btn-valider">Valider</button>
    </form>   
</div>