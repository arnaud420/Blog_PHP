<?php
session_start();
if ($_SESSION != true)
{

?>
    <!DOCTYPE html>
    <html>
    <head>
        <link type="text/css" rel="stylesheet" href="/blog-ydays/container/css/main.css"
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="/blog-ydays/container/css/materialize.min.css" media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
    <?php
    require "header.php";
    ?>

    <div class="container">
        <h2 class="center">Félicitation, vous êtes inscrit !</h2>
        <p><a href="connexion.html">Connectez-vous pour pouvoir poster des commentaires</a></p>
    </div>
<?php
}
else
{
    echo "Erreur";
}
?>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/blog-ydays/container/js/materialize.min.js"></script>
<script type="text/javascript" src="/blog-ydays/container/js/main.js"></script>
</body>
</html>