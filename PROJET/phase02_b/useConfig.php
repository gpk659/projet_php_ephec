<?php
/**
 * Created by PhpStorm.
 * User: Grégory
 * Date: 28-04-16
 * Time: 12:23
 */
$array_ini =parse_ini_file("INC/config.ini.php", true);
/*$contenu_form.= "<pre>";
print_r($array_ini);
$contenu_form.= "</pre>";*/


function affich_config($type_section){
    foreach($type_section as $titre => $value){
        switch($titre) {
            case 'comment' : $contenu_form= "<p class=\"commentaire\">$value</p>";
                break;
            case 'type' :   $contenu_form.= "<p><label for='$titre'>$titre</label>";
                            foreach($type_section['type'] as $type => $value) {
                                    if(in_array($value, $type_section['choix'])) {
                                        $contenu_form.="<input type='radio' name='$type' id='$type' value='$value' checked disabled=\"disabled\">$value";
                                    }else {$contenu_form.="<input type='radio' name='$type' id='$type' value='$value' disabled=\"disabled\">$value";}
                            }$contenu_form.= "</p>";
                break;
            case 'choix': $contenu_form.="";
                break;
            case 'size': $contenu_form.= "<p><label for='$titre'>$titre</label>";
                         if($type_section['min'] == $type_section['max']){
                             $contenu_form.= "<input type='number' step='1' min='".$type_section['min'] ."'  max='".$type_section['max']."' name='$titre' id='$titre' value='$value' disabled=\"disabled\">(nom modifiable)";
                         }else{ if($type_section['min']){
                                 $contenu_form.= "<input type='number' step='1' min='".$type_section['min'] ."' max='".$type_section['max']."' name='$titre' id='$titre' value='$value'>min(".$type_section['min'].") max(".$type_section['max'].") step(1)";
                                }else{
                                 $contenu_form.= "<input type='number' step='1' min='0'  max='".$type_section['max']."' name='$titre' id='$titre' value='$value'>min(".$type_section['min'].") max(".$type_section['max'].") step(1)";
                                }
                         }$contenu_form.=" </p>";
                break;
            case 'min' :    $contenu_form.= "";
                        /*$contenu_form.= "<p><label for='$titre'>$titre</label>
                                <input type='number' disabled=\"disabled\" name='$titre' id='$titre' value='$value'></p>";
                */break;
            case 'max' :    $contenu_form.= "";
                        /*$contenu_form.= "<p><label for='$titre'>$titre</label>
                                <input type='number' disabled=\"disabled\" name='$titre' id='$titre' value='$value'></p>";
               */ break;
            default : $contenu_form.= "<p><label for='$titre'>$titre</label>
                                <input type='text' name='$titre' id='$titre' value='$value'></p>";
        }
    }
}

$contenu_form = "<div id=\"f_config\" class=\"config\">";
$contenu_form.= "<form method=\"post\" name=\"config\" action=\"testForm.php\">";
debut_config($array_ini,$contenu_form);
$contenu_form.= "<p><input type=\"submit\" name=\"config\" id=\"config\" value=\"Sauvegarder\"></p>";
$contenu_form.= "</form>";
$contenu_form.= "</div>";
return $contenu_form;

function debut_config($nom, $variable){
    foreach($nom as $nom_tab => $value_tab){
        if($nom_tab == 'erreur'){ //on affiche pas le message d'erreur
            $variable.= "";
        }else { $variable.= "<fieldset><legend>$nom_tab</legend>";
            affich_config($nom[$nom_tab]);
            $variable.= "</fieldset>"; }
    }

}



?>

