<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="../container/css/main.css"
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../container/css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<header>
    <nav class="nav-extended">
        <div class="container">
            <div class="nav-wrapper">
                <a href="index.php" class="brand-logo center">Espace ADMIN</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/blog-ydays/index.html">Blog</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="/blog-ydays/index.html">Blog</a></li>
                </ul>
            </div>
            <div class="nav-content">
                <ul class="tabs tabs-transparent">
                    <li class="tab"><a class="active" href="#test1">Ajouter un article</a></li>
                    <li class="tab"><a href="#test2">Modifier un article</a></li>
                    <li class="tab"><a href="#test3">Supprimer un article</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div id="test1" class="col s12">
    <?php require "ajout_article.php" ?>
</div>
<div id="test2" class="col s12">
    <?php require "modifier_article.php" ?>
</div>
<div id="test3" class="col s12">
    <?php require "supprimer_article.php" ?>
</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../container/js/materialize.min.js"></script>
<script type="text/javascript" src="../container/js/main.js"></script>
</body>
</html>