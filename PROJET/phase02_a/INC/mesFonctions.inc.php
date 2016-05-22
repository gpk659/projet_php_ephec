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
    function chargeConfig(){
        return include "./useConfig.php";
    }

    function traiteForm(){
        if(!isset($_GET['submit'])){
            return 'Impossible d\'identifier le formulaire';
        }switch($_GET['submit']){
            case 'config': $retour = saveConfig();
                break;
            default: $retour = getFormInfo();
        }
        return $retour;
    }
    function saveConfig(){
        //return getFormInfo();
        $array_ini =parse_ini_file("INC/config.ini.php", true);
        echo "<pre>";
        print_r($array_ini);
        echo "</pre>";

    }
    function getSession(){
        echo "<pre>";
        print_r($_SESSION);
       // echo SESSION_id();
        echo "</pre>";
    }

    function resetSession(){
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();
        echo "<pre>";
        print_r($_SESSION);
        echo "<pre>";
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
            case 'config': $contenu = chargeConfig();
                break;
            case 'testForm' : $contenu = traiteForm();
                break;
            case 'getSession' : $contenu = getSession();
                break;
            case 'resetSession' : $contenu = resetSession();
                break;
            default: $contenu= 'Requête inconnue : '.$rq;
        }
        return $contenu;
    }

?>