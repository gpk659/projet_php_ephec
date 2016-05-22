[erreur]
interdit = "<?php echo 'Vous n\'êtes pas autorisé à voir ce contenu."'; exit; ?>"
comment = "; Les commentaires commencent par ';', comme dans php.ini"

[site]
name = "Baribal - Monster Truck"
comment = "Nom de votre site affiché dans l'entête"

[image]
folder = "img"
comment = "nom du dossier contenant les images"

[logo]
name = "logo.jpg"
alt = "mon beau logo oooooooh"
size = 100
min = 100
max = 100
comment = "Nom du fichier contenant le logo ce fichier doit se trouver dans le dossier des images"

[avatar]
dossier = "avatar"
anonyme = "unknow.png"
taille = 150
min = 100
max = 200
type[] = "jpg"
type[] = "gif"
type[] = "png"
choix[] = "jpg"
choix[] = "png"
comment = "Les avatars se trouveront dans le dossier repris ci-dessous qui sera dans le dossier des images.Le nom de l'avatar par défaut sera celui désigné ci dessous.La taille des avatars sera dans la fourchette min-maxLes avatars pourront avoir une des extensions reprises en choix parmi les types listés"

[db]
host = "localhost"
user = "student"
pswd = "2TI"
dbname = "world"
comment = "donnez ici les paramètres nécessaires pour se connecter à la base de données depuis le site web"