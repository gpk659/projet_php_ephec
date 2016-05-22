<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title id="title">
        <?php echo $title; ?>
    </title>
    <!-- La feuille de styles "base.css" doit être appelée en premier. -->
    <link rel="stylesheet" type="text/css" href="CSS/base.css" media="all" />
    <link rel="stylesheet" type="text/css" href="CSS/modele04.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="CSS/site.css" media="all"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/smoothness/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="JS/index.js"></script>
</head>

<body>
<div id="global">
    <header id="entete">
        <h1>
            <img id="logo" alt="<?php echo $_SESSION['altLogo'] ?>" src="<?php echo $_SESSION['logo'] ?>" />
            <span id="title"><?php echo $_SESSION['siteName'] ?></span>
        </h1>
        <nav id="menu" class="menu">
            <?php echo creeMenu($lesMenus['menu']);?>
        </nav><!-- #navigation -->
    </header><!-- #entete -->
        <nav id="sous-menu" class="menu">
            <?php echo creeMenu($lesMenus['sous-menu']);?>
        </nav><!-- #navigation -->
    <main id="contenu">
        <div id="contenu"><?php echo $contenu; ?></div>
        <div id="message"><?php  ?></div>
    </main><!-- #contenu -->
    <footer id="copyright">
        Mise en page par Grégory Pyck - Mars 2016
    </footer>

</div><!-- #global -->

</body>
</html>
