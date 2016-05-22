<?php
/**
 * Created by PhpStorm.
 * User: Grégory
 * Date: 21-05-16
 * Time: 12:40
 */
session_start();

require "inc/config.inc.php";

if (!isset($_SESSION['ouverture'])) {
    $_SESSION['sessionId']= SESSION_id();
    $_SESSION['ouverture'] = date('d')." ".date('M')." ".date('Y')." à ".date('H')."h".date('i')."'".date('s')."\"";
    $_SESSION['sessionName'] = 'ephec';
    $conf = new Config();
    $_SESSION['siteName'] = $conf->getData('site','name');
    $_SESSION['logo']=$conf->getData('image','folder')."/".$conf->getData('logo','name');
    $_SESSION['altLogo'] = $conf ->getData('logo','alt');
}

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
$title = "Accueil";
require 'inc/mesFonctions.inc.php';
//envoi vers AJAX
if(isset($_GET['rq'])){
    $_SESSION['rqLog'][time()]=$_GET['rq'];
    $envoi=[];
    traiteRequest($_GET['rq']);
    die(json_encode($envoi));
}
$contenu = traiteRequest('accueil');

require 'inc/layout.html.inc.php';

?>