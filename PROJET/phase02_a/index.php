<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
$_SESSION['sessionId']= SESSION_id();
$_SESSION['sessionName'] = 'yolo32';
if (!isset($_SESSION['ouverture'])) {
    $_SESSION['ouverture'] = date('d')." ".date('M')." ".date('Y')." à ".date('H')."h".date('i')."'".date('s')."\"";
}



$titre = 'Accueil';
$nomSite = 'Nom de mon site';
$nom_image = 'logo';
$image = 'IMG/04.png';
$contenu = 'Bienvenue';

$lesMenus=['menu'=>['accueil'=>'accueil.html',
                    'contact'=>'contact.html',
                    'profil'=>'profil.html',
                    'inscription'=>'newAccount.html',
                    'connexion'=>'login.html',
                    'config'=>'config.html'
                    ],

            'sous-menu'=>['bienvenue'=>'',
                            'Affiche Session'=>'getSession.html',
                            'Efface Session'=>'resetSession.html'
                        ]
           ];
require 'INC/mesFonctions.inc.php';

//envoi vers AJAX
if(isset($_GET['rq'])){
    $contenu = getContenu($_GET['rq']);
    die($contenu);

}
$contenu=getContenu('accueil');

require 'INC/layout.html.inc.php';

include('config.php');

$conf = new Config();
$nomSite = $conf->getData('site','name');
$imageFolder = $conf->getData('image','folder');
$logoName = $conf->getData('logo','name');
$logo = $imageFolder.'/'.$logoName;
$altLogo = $conf->getData('logo','alt');

?>