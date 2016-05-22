<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title id="title">
        <?php echo $titre; ?>
    </title>
    <!-- La feuille de styles "base.css" doit être appelée en premier. -->
    <link rel="stylesheet" type="text/css" href="CSS/base.css" media="all" />
    <link rel="stylesheet" type="text/css" href="CSS/modele04.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="CSS/site.css" media="all"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="JS/index.js"></script>
</head>

<body>
<div id="global">
    <header id="entete">
        <h1>
            <img alt="<?php echo $nom_image; ?>" src="<?php echo $image; ?>" />
            <?php echo $nomSite; ?>
        </h1>
        <nav id="menu" class="menu">
            <?php echo creeMenu($lesMenus['menu']);?>
        </nav><!-- #navigation -->
    </header><!-- #entete -->
        <nav id="sous-menu" class="menu">
            <?php echo creeMenu($lesMenus['sous-menu']);?>
        </nav><!-- #navigation -->
    <main id="contenu">
        <?php echo $contenu; ?>
    </main><!-- #contenu -->
    <footer id="copyright">
        Mise en page par Grégory Pyck - Mars 2016
    </footer>

</div><!-- #global -->

</body>
</html>
