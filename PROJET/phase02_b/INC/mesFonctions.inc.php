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
        $form_info= "<pre>";
        $form_info.=print_r(array('_GET'=>$_GET,'_POST'=>$_POST,'_FILES'=>$_FILES), true);
        $form_info.="</pre>";
        return $form_info;
    }
    function chargeConfig(){
        return include './useConfig.php';
        //return $contenu_config;
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
        return getFormInfo();
    }
    function getSession(){
        $contenu_sesion = "Contenu de la variable de session : ";
        $contenu_sesion .= "<pre>";
        $contenu_sesion .= print_r($_SESSION, true);
        $contenu_sesion .= "</pre>";
        return $contenu_sesion;
    }

    function resetSession(){
        $destroy_sess="Effacement de la session :";
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();
        $destroy_sess .= "<pre>";
        $destroy_sess.=print_r($_SESSION, true);
        $destroy_sess.="<pre>";
        return $destroy_sess;
    }

    function sendMenuAdmin(){
        $envoi['sous-menu']= ['Administation'=>'',
                                    'Config'=>'config.html',
                                    'Affiche Session'=>'getSession.html',
                                    'Efface Session'=>'resetSession.html'
                                    ];
        return creeMenu($envoi['sous-menu']);
    }
    function accueilAdmin(){
        return '<p><h1>Bienvenue</h1><br>dans le zone d\'<b>administration</b></p>';
    }

    function afficheTitreSousMenu($titre){
        $envoi['sous-menu']= [$titre=>''];
        return creeMenu($envoi['sous-menu']);
    }
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
            case 'config': $envoi['contenu'] = chargeConfig();
                           $envoi['sous-menu']= afficheTitreSousMenu('Config');
                break;
            case 'admin': $envoi['sous-menu']= sendMenuAdmin();
                          $envoi['contenu']= accueilAdmin();
                break;
            case 'testForm' : $envoi['contenu'] = traiteForm();
                break;
            case 'getSession' : $envoi['contenu'] = getSession();
                break;
            case 'resetSession' : $envoi['contenu'] = resetSession();
                break;
            default: $envoi['contenu'] = 'Requête inconnue : '.$rq;
        }

    }

?>