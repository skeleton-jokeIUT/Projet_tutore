<div class="reponse">
    <form>
    <?php
        foreach($questions as $data)
        {?>
            <p><?= $data->nomQuestion ?></p>
           <?php    
           $typeQ = $data->sousCategorie;
           for($i=1;$i<=$data->nbChamps;$i++)
           {
                $nb = "$i";
                $champ = "champ";
                $champ .= $nb;
                $nbchamp = $champ;
                switch($typeQ)
                {
                    case "qcm" :
                        ?>    
                            <label><?= $data->$nbchamp ?> : <input type="checkbox" name="champ[]" value=<?= $data->$nbchamp ?>></label>  
                        <?php
                        break;
                    case "qcu" :
                        ?> 
                        <label><?= $data->$nbchamp ?> <input type="radio" name="choix" value=<?= $data->$nbchamp ?>></label>
                        <?php
                        break;
                
                }    
           }
           switch($typeQ)
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