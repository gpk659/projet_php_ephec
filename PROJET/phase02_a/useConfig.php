<?php
/**
 * Created by PhpStorm.
 * User: Grégory
 * Date: 28-04-16
 * Time: 12:23
 */
$array_ini =parse_ini_file("INC/config.ini.php", true);
echo "<pre>";
print_r($array_ini);
echo "</pre>";


function affich_config($type_section){
    foreach($type_section as $titre => $value){

        switch($titre) {
            case 'comment' :
                echo "<p class=\"commentaire\">$value</p>";
                break;
            case 'type' :
                echo "<p><label for='$titre'>$titre</label>";
                            foreach($type_section['type'] as $type => $value) {
                                    if(in_array($value, $type_section['choix'])) {
                                        echo"<input type='radio' name='$type' id='$type' value='$value' checked disabled=\"disabled\">$value";
                                    }else {
                                        echo"<input type='radio' name='$type' id='$type' value='$value' disabled=\"disabled\">$value";
                                    }
                            }
                echo "</p>";
                break;
            case 'choix': echo"";
                break;
            case 'size': echo "<p><label for='$titre'>$titre</label>";
                         if($type_section['min'] == $type_section['max']){
                             echo "<input type='number' step='1' min='".$type_section['min'] ."'  max='".$type_section['max']."' name='$titre' id='$titre' value='$value' disabled=\"disabled\">(nom modifiable)";

                         }else{
                             if($type_section['min']){
                                 echo "<input type='number' step='1' min='".$type_section['min'] ."' max='".$type_section['max']."' name='$titre' id='$titre' value='$value'>min(".$type_section['min'].") max(".$type_section['max'].") step(1)";
                             }else{
                                 echo "<input type='number' step='1' min='0'  max='".$type_section['max']."' name='$titre' id='$titre' value='$value'>min(".$type_section['min'].") max(".$type_section['max'].") step(1)";
                             }
                         }


                          echo" </p>";
                break;
            case 'min' :echo "";
                        /*echo "<p><label for='$titre'>$titre</label>
                                <input type='number' disabled=\"disabled\" name='$titre' id='$titre' value='$value'></p>";
                */break;
            case 'max' :echo "";
                        /*echo "<p><label for='$titre'>$titre</label>
                                <input type='number' disabled=\"disabled\" name='$titre' id='$titre' value='$value'></p>";
               */ break;
            default : echo "<p><label for='$titre'>$titre</label>
                                <input type='text' name='$titre' id='$titre' value='$value'></p>";
        }
    }
}
?>

<div id="f_config" class="config">
    <form method="post" name="config" action="testForm.php">
            <?php
            foreach($array_ini as $nom_tab => $value_tab){
                if($nom_tab == 'erreur'){
                    //on affiche pas le message d'erreur
                    echo "";
                }else {
                    echo "<fieldset><legend>$nom_tab</legend>";
                    affich_config($array_ini[$nom_tab]);
                    echo "</fieldset>";
                }
            }
            ?>
            <p><input type="submit" name="config" id="config" value="Sauvegarder"></p>
    </form>
</div>