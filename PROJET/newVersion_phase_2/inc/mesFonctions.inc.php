<?php
/*
 *  Fichier ou il y a toutes mes fonctions
 *  By Grégory Pyck - EPHEC LLN
 *  2015-2016
 *  Copyright
 *
 */

    /*
     * Fonction qui crée les menus,
     *  => si pas de lien on met le texte en titre
     */
    function creeMenu($menu_param){
        $string = '<ul>';
        foreach($menu_param as $cle => $element){
            $string .= "<li id=\"o_$cle\">";
            if($element ===''){ $string .= "<h1>$cle</h1>";}
            else {$string .= "<a href='$element' onclick='return false'>$cle</a>";}
            $string .= "</li>";
        }return $string;
    }

    function sendMenuAdmin(){
        $envoi['sous-menu']= [  'Administation'=>'',
                                'Config'=>'config.html',
                                'Affiche Session'=>'getSession.html',
                                'Efface Session'=>'resetSession.html'
                             ];
        return creeMenu($envoi['sous-menu']);
    }

    //fonction qui affiche les titres des sous-menus
    function afficheTitreSousMenu($titre){
        $envoi['sous-menu']= [$titre=>''];
        return creeMenu($envoi['sous-menu']);
    }

    // les fonctions chargement de textes
    function chargeAccueil(){return '<p>Bonjour voici un peu plus de texte...</p>';}

    function accueilAdmin(){return '<p><h1>Bienvenue</h1><br>dans le zone d\'<b>administration</b></p>';}

    //fonctions qui chargent les fichiers
    function chargeTemplate($t){
        $file=file('INC/'.$t.'.template.inc.php');
        return implode('',$file);
    }
    function chargeConfig(){return include './useConfig.php';}

    //affichage de l'envoi des formulaires
    function getFormInfo(){
        $form_info= "<pre>";
        $form_info.=print_r(array('_GET'=>$_GET,'_POST'=>$_POST,'_FILES'=>$_FILES), true);
        $form_info.="</pre>";
        return $form_info;
    }

    //fonctions pour la config
    function configForm(){
        $conf = new Config();
        return $conf->getForm();
    }

    function saveConfig(){
        $config = new Config();
        $save_conf = $config->writeConfig();
        $_SESSION['siteName'] = $config->getData('site', 'name');
        $_SESSION['logo'] = $config->getData('image', 'folder')."/".$config->getData('logo', 'name');
        $_SESSION['altLogo'] = $config->getData('logo', 'alt');
        return $save_conf;
    }

    //fonction pour la session /affichage et /destroy
    function getSession(){
        $contenu_sess = "!--- Affichage du contenu de la session ---!";
        $contenu_sess .= "<pre>";
        $contenu_sess .= print_r($_SESSION, true);
        $contenu_sess .= "</pre>";
        return $contenu_sess;
    }

    function resetSession(){
        $destroy_sess="!--- Destruction de la session en cours ---!";
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();
        $destroy_sess .= "<pre>";
        $destroy_sess.=print_r($_SESSION, true);
        $destroy_sess.="<pre>";
        return $destroy_sess;
    }

    //fonction qui gère les requetes
    function traiteRequest($rq){
        global $envoi;
        switch($rq){
            case 'accueil': $envoi['contenu'] = chargeAccueil();
                            $envoi['sous-menu']= afficheTitreSousMenu('Bienvenue');
                break;
            case 'profil':$envoi['contenu'] = chargeTemplate($rq);
                          $envoi['sous-menu']= afficheTitreSousMenu('Profil');
                break;
            case 'contact': $envoi['contenu'] = chargeTemplate($rq);
                            $envoi['sous-menu']= afficheTitreSousMenu('Contact');
                break;
            case 'newAccount': $envoi['contenu'] = chargeTemplate($rq);
                               $envoi['sous-menu']= afficheTitreSousMenu('NewAccount');
                break;
            case 'login': $envoi['contenu'] = chargeTemplate($rq);
                          $envoi['sous-menu']= afficheTitreSousMenu('Connexion');
                break;
            case 'config': $envoi['contenu'] = ConfigForm();
                           $envoi['sous-menu']= afficheTitreSousMenu('Config');
                break;
            case 'admin': $envoi['sous-menu']= sendMenuAdmin();
                          $envoi['contenu']= accueilAdmin();
                break;
            case 'testForm' : $envoi['contenu'] = getFormInfo();
                break;
            case 'inc/writeConfig':
                $envoi['siteName']=$_SESSION['siteName'];
                $envoi['logo']=$_SESSION['logo'];
                $envoi['altLogo']=$_SESSION['altLogo'];
                break;
            case 'getSession' : $envoi['contenu'] = getSession();
                break;
            case 'resetSession' : $envoi['contenu'] = resetSession();
                break;
            default: $envoi['contenu'] = 'Requête inconnue : '.$rq;
        }
    }

//ancienne fonction
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
?>