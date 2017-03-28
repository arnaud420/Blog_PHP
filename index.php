<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter|Raleway" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="container/css/main.css"
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="container/css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Bienvenu sur mon blog</title>
</head>

<?php
require "view/header.php";
require "model/load.php";
?>
<body>

<div class="container section">
    <!--presentation grand ecran-->
    <div class="row hide-on-small-only hide-on-med-only">
        <div class="col s12">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="https://upload.wikimedia.org/wikipedia/fr/7/71/Quebec_citadelles_200x200.png">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="card-title flow-text" id="auteur">A propos de l'auteur :</div>
                        <blockquote style="border-left-color: #00b8d4" class="cyan-text text-accent-4 flow-text">Vestibulum et tincidunt quam. Suspendisse vehicula diam quis eros ullamcorper, in finibus metus tempus. Sed euismod nisl ut tellus molestie, ac commodo ante congue. Mauris interdum nec orci eu imperdiet. Aliquam ac aliquam purus. Nulla facilisi. Cras luctus neque non quam volutpat malesuada.</blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--presentation smartphone - tablette-->
    <div class="row hide-on-large-only">
        <div class="col s12">
            <ul id="about" class="collapsible">
                <li>
                    <div class="collapsible-header flow-text"><i class="material-icons">mood</i>A propos de l'auteur</div>
                    <div class="collapsible-body white">
                        <blockquote style="border-left-color: #00b8d4" class="cyan-text text-accent-4 flow-text">Vestibulum et tincidunt quam. Suspendisse vehicula diam quis eros ullamcorper, in finibus metus tempus. Sed euismod nisl ut tellus molestie, ac commodo ante congue. Mauris interdum nec orci eu imperdiet. Aliquam ac aliquam purus. Nulla facilisi. Cras luctus neque non quam volutpat malesuada.</blockquote>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <h2 class="center card-panel cyan accent-4 white-text"><i class="medium material-icons left">flight_takeoff</i>Mes derniers voyages ...</h2>
    </div>

    <?php
    //systeme de pagination

    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $limite = 6; // nombres d'articles max par page

    $debut = ($page - 1) * $limite;

    $nombreTotalArticle = $bdd->query('SELECT COUNT(id) AS nb FROM billets'); //compte le nombres d'articles par l'id
    $colonnesArticle = $nombreTotalArticle->fetch(); //renvoi sous forme de tableau
    $total = $colonnesArticle['nb'];

    $nombrePages = ceil($total / $limite); //arrondi le nombres de pages nécessaire en fonction du nombre d'articles

    $nombreTotalArticle->closeCursor();
    ?>
    <!--recuperer les articles-->
    <div class="row">
        <?php
        $req = $bdd->prepare('SELECT id, titre, contenu, resume, image, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :debut, :limite');
        $req->bindValue(':debut', $debut, PDO::PARAM_INT);
        $req->bindValue(':limite', $limite, PDO::PARAM_INT);
        $req->execute();
        while ($donnees = $req->fetch()) // affichage des données
        {
            ?>
        <div class="col s12 m6 l6">
            <div class="card large hoverable">
                <div class="card-image">
                    <?php echo '<img class="materialboxed responsive-img" src="container/image/' . htmlspecialchars($donnees['image']) . '">'; ?>
                </div>
                <div class="card-content">
                    <h3 class="card-title black-text"><?php echo htmlspecialchars($donnees['titre']); ?></h3>
                    <p>
                        <?php echo htmlspecialchars($donnees['resume']); ?>
                    </p>
                </div>
                <div class="card-action">
                    <a href="article-<?php echo htmlspecialchars($donnees['id']); ?>.html">Lire l'article</a>
                    <em class="right">posté le <?php echo htmlspecialchars($donnees['date_creation_fr']); ?></em>
                </div>
            </div>
        </div>
        <?php
        }
        $req->closeCursor();
        ?>
    </div>

    <?php
        if ($page > $nombrePages) //si la page n'existe pas retourne une erreur
        {
            return require ('view/erreur.php');
        }
    ?>

    <!--affichage de la pagination-->
    <div class="row center">
        <ul class="pagination">
            <?php
            if ($page > 1)
            {
                ?>
                <li class="waves-effect">
                    <a href="page-<?php echo htmlspecialchars($page) - 1 ?>.html"><i class="material-icons">chevron_left</i></a>
                </li>
                <?php
            }
            for ($i = 1; $i <= $nombrePages; $i++)
            {
                ?>
                <li class="waves-effect">
                    <a href="page-<?php echo htmlspecialchars($i); ?>.html"><?php echo htmlspecialchars($i); ?></a>
                </li>
                <?php
            }
            ?>
            <?php
            if ($page < $nombrePages)
            {
                ?>
                <li class="waves-effect">
                    <a href="page-<?php echo htmlspecialchars($page) + 1 ?>.html"><i class="material-icons">chevron_right</i></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="row">
        <a class="cyan accent-4 btn-floating btn-medium waves-effect waves-light hide-on-small-only hide-on-med-only" style="position: fixed; bottom: 1%; right: 10%;" href="#header"><i class="material-icons">arrow_upward</i></a>
    </div>
</div>

<?php
require "view/footer.php";
?>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="container/js/materialize.min.js"></script>
<script type="text/javascript" src="container/js/main.js"></script>
</body>
</html>
