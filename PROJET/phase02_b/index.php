<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
$_SESSION['sessionId']= SESSION_id();
$_SESSION['sessionName'] = 'ephec';
if (!isset($_SESSION['ouverture'])) {
    $_SESSION['ouverture'] = date('d')." ".date('M')." ".date('Y')." à ".date('H')."h".date('i')."'".date('s')."\"";
}



$titre = 'Accueil';
$nomSite = 'Nom de mon site';
$nom_image = 'logo';
$image = 'IMG/04.png';
$contenu = 'Bienvenue';

$lesMenus=['menu'=>['Accueil'=>'accueil.html',
                    'Contact'=>'contact.html',
                    'Profil'=>'profil.html',
                    'Inscription'=>'newAccount.html',
                    'Connexion'=>'login.html',
                    'Administration'=>'admin.html'
                    ],

            'sous-menu'=>['Bienvenue'=>''
                        ]
           ];
require 'INC/mesFonctions.inc.php';

//envoi vers AJAX
if(isset($_GET['rq'])){
    $_SESSION['rqLog'][time()]=$_GET['rq'];
    $envoi=[];
   traiteRequest($_GET['rq']);
    die(json_encode($envoi));
}
$contenu = traiteRequest('accueil');

require 'INC/layout.html.inc.php';

include('config.php');

$conf = new Config();
$nomSite = $conf->getData('site','name');
$imageFolder = $conf->getData('image','folder');
$logoName = $conf->getData('logo','name');
$logo = $imageFolder.'/'.$logoName;
$altLogo = $conf->getData('logo','alt');

?>