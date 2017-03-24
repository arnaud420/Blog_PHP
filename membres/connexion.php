<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="/blog-ydays/container/css/main.css"
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/blog-ydays/container/css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Page de connexion</title>
</head>
<body>
<?php
require "../view/header.php";
require "../model/load.php";
?>
<div class="container section">
    <div class="row section">
        <form class="col s12 l6 offset-l3 card-panel" method="post" action="connexion-post.html">
            <h2 class="center-align">Connexion</h2>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="pseudo" name="pseudo" type="text" required>
                        <label for="pseudo">Pseudo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate" name="password" required>
                        <label for="pass">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <p>
                            <input type="checkbox" id="remember">
                            <label for="remember">Se souvenir de moi</label>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col m12">
                        <p class="right-align">
                            <button class="btn btn-large waves-effect waves-light" type="submit">Envoyer</button>
                        </p>
                    </div>
                </div>
        </form>
    </div>
</div>

<?php
require "../view/footer.php";
?>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/blog-ydays/container/js/materialize.min.js"></script>
<script type="text/javascript" src="/blog-ydays/container/js/main.js"></script>
</body>
</html>

