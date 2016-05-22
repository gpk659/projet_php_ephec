<?php
    function creeMenu($menu_param){
    //version 3
        $string = '<ul>';
        foreach($menu_param as $cle => $element){
            $string .= "<li id=\"o_$cle\">";
            if($element ===''){
                $string .= "<h1>$cle</h1>";
            } else {
                $string .= "<a href='$element' onclick='return false'>$cle</a>";
            }
            $string .= "</li>";
        }
        return $string;
    }
    function chargeAccueil(){return '<p>Bonjour voici un peu plus de texte...</p>';}

    function chargeTemplate($t){
        $file=file('INC/'.$t.'.template.inc.php');
        return implode('',$file);
    }

    function getFormInfo(){
        echo "<pre>";
        $liste=['_GET'=>$_GET,'_POST'=>$_POST,'_FILES'=>$_FILES];
        return print_r($liste);
        echo "</pre>";
    }

    function getContenu($rq){
        $contenu="";
        switch($rq){
            case 'accueil': $contenu = chargeAccueil();
                break;
            case 'profil':$contenu = chargeTemplate($rq);
                break;
            case 'contact': $contenu = chargeTemplate($rq);
                break;
            case 'newAccount': $contenu = chargeTemplate($rq);
            break;
            case 'login': $contenu = chargeTemplate($rq);
                break;
            case 'testForm' : $contenu = getFormInfo();
                break;
            default: $contenu = 'Requête inconnue : '.$rq;
        }
       return $contenu;
    }

?>