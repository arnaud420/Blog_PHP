<?php
session_start();
?>
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
</head>
<body>
<?php
require "../view/header.php";
require "../model/load.php";
?>

<div class="container section">
    <div class="row section">
        <form class="col s12 l6 offset-l3 card-panel" method="post" action="inscription-post.html">
            <h2 class="center-align">Inscription</h2>
            <div class="row">
                <div class="input-field col s12">
                    <input name="pseudo" id="pseudo" type="text" required>
                    <label for="pseudo">Pseudo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" class="validate" name="email" required>
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="password" required>
                    <label for="password">Mot de passe</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="passwordVerif" type="password" class="validate" name="passwordVerif" required>
                    <label for="passwordVerif">Retapez le mot de passe</label>
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

