<?php
/**
 * Created by PhpStorm.
 * User: Grégory
 * Date: 21-05-16
 * Time: 14:32
 */

fputs($monfichier, "[erreur]");
fputs($monfichier, "\n");
fputs($monfichier, "interdit = \"<?php echo 'Vous n'êtes pas autorisé à voir ce contenu.\"'; exit; ?>\"");
fputs($monfichier, "\n");
fputs($monfichier, "comment = \"; Les commentaires commencent par ';', comme dans php.ini\"");
fputs($monfichier, "\n");
fputs($monfichier, "\n");
fputs($monfichier, '[SITE]');
fputs($monfichier, "\n");
fputs($monfichier, 'titre = '.$_POST['titre']);
fputs($monfichier, "\n");
fputs($monfichier, 'images = '.$_POST['images']);
fputs($monfichier, "\n");
fputs($monfichier, 'logo = '.$_POST['logo']);
fputs($monfichier, "\n");
fputs($monfichier, 'taille = '.$_POST['SITEtaille']);
fputs($monfichier, "\n");
fputs($monfichier, 'min = 150');
fputs($monfichier, "\n");
fputs($monfichier, 'max = 250');
fputs($monfichier, "\n");
fputs($monfichier, "\n");
fputs($monfichier, '[DB]');
fputs($monfichier, "\n");
fputs($monfichier, 'host = '.$_POST['host']);
fputs($monfichier, "\n");
fputs($monfichier, 'user = '.$_POST['user']);
fputs($monfichier, "\n");
fputs($monfichier, 'pswd = '.$_POST['pswd']);
fputs($monfichier, "\n");
fputs($monfichier, 'dbname = '.$_POST['dbname']);
fputs($monfichier, "\n");
fputs($monfichier, "\n");
fputs($monfichier, '[AVATAR]');
fputs($monfichier, "\n");
fputs($monfichier, 'dossier = '.$_POST['dossier']);
fputs($monfichier, "\n");
fputs($monfichier, 'anonyme = '.$_POST['anonyme']);
fputs($monfichier, "\n");
fputs($monfichier, 'taille = '.$_POST['AVATARtaille']);
fputs($monfichier, "\n");
fputs($monfichier, 'min = 100');
fputs($monfichier, "\n");
fputs($monfichier, 'max = 200');
fputs($monfichier, "\n");
fputs($monfichier, 'type[] = jpg');
fputs($monfichier, "\n");
fputs($monfichier, 'type[] = gif');
fputs($monfichier, "\n");
fputs($monfichier, 'type[] = png');
fputs($monfichier, "\n");
if(isset($_POST['jpg'])){
    fputs($monfichier, 'choix[] = jpg');
    fputs($monfichier, "\n");
}
if(isset($_POST['gif'])){
    fputs($monfichier, 'choix[] = gif');
    fputs($monfichier, "\n");
}
if(isset($_POST['png'])){
    fputs($monfichier, 'choix[] = png');
    fputs($monfichier, "\n");
}

?>