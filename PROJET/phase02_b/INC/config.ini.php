; phase 2
; fichier de configuration protégé

[erreur]
interdit = "<?php echo 'vous n\'êtes pas autorisé à voir ce contenu"'; exit; ?>"
comment = "; Les commentaires commencent par ';' comme dans php.ini"


[SITE]
comment = "Nom de votre site affiché dans l'entête"
name="Ohhh mon beau site"

[IMAGE]
comment="Nom du dossier contenant les images"
folder = "IMG"

[LOGO]
comment="Nom du fichier<br>ce fichier doit se trouver dans le dossier des images"
size = 100
name = 04.png
alt ="mon beau logo"
min = 100
max = 100


[AVATAR]
comment="Les avatars se trouveront dans le dossier repris ci-dessous qui sera dans le dossier des images.<br>
        Le nom de l'avatar par défaut sera celui désigné ci dessous.<br>
        La taille des avatars sera dans la fourchette min-max.<br>
        Les avatars pourront avoir une des extensions reprises en choix parmi les types listés."
type[] = jpg
type[] = gif
type[] = png
choix[] = jpg
choix[] = png
size = 150
min = 100
max = 150
folder = "AVATAR"
default= "unknow.png"


[DATABASE]
comment="Donnez ici les paramètres nécessaires pour se connecter à la base de données depuis le site web."
host = localhost
user = student
pswd = 2TI
dbname = world
