<?php

$titre = 'Accueil';
$nomSite = 'Nom de mon site';
$nom_image = 'logo';
$image = 'IMG/04.png';
$contenu = 'Bienvenue';

$lesMenus=['menu'=>['accueil'=>'accueil.html',
                    'contact'=>'contact.html',
                    'profil'=>'profil.html',
                    'inscription'=>'newAccount.html',
                    'connexion'=>'login.html'
                    ],

            'sous-menu'=>['bienvenue'=>''
                
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

?>