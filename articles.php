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
</head>

<body>
<?php
require "view/header.php";
require "model/load.php";

$req = $bdd->prepare('SELECT id, titre, image, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['article']));
$donnees = $req->fetch();
?>
<!--recuperer les articles-->
<div class="container section">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable">
                <h2 class="center section"><?php echo htmlspecialchars($donnees['titre']); ?></h2>
                <div class="card-image">
                    <?php echo '<img src="container/image/' . $donnees['image'] . '">'; ?>
                </div>
                <div class="card-content">
                    <p class="flow-text">
                        <?php echo wordwrap(htmlspecialchars($donnees['contenu']), 800, "," . '</br>', true); //wordrap permet le retour à la ligne ?>
                    </p>
                </div>
                <div class="card-action">
                    <a href="index.html">Revenir à la liste d'article</a>
                    <em class="right">posté le <?php echo htmlspecialchars($donnees['date_creation_fr']); ?></em>
                </div>
            </div>
        </div>
    </div>

    <!--ajout de commentaires-->
    <h3 class="section">Ajoute ton commentaire :</h3>
    <div class="row">
        <form class="col s12 m6 l6" action="controller/article_post.php?article=<?php echo htmlspecialchars($donnees['id']); ?>" method="post">
            <div class="input-field col s12">
                <?php
                if ($_SESSION == true) {
                    echo '<label for="commentaire">Commentaire</label>  <textarea name="commentaire" type="text" id="commentaire" class="materialize-textarea"></textarea>';
                }
                else {
                    echo '<label for="commentaire">Connecte toi pour poster ton commentaire</label>  <textarea name="commentaire" type="text" id="commentaire" class="materialize-textarea"></textarea>';
                }
                ?>
            </div>
        <input type="submit" value="Envoyer" class="btn waves-effect waves-light right">
        </form>
    </div>
    <?php
    $req->closeCursor();
    ?>

    <div class="row">
        <div class="col s10 offset-s1">
            <h4><i class="material-icons prefix small left">mode_edit</i>Commentaires :</h4>
            <?php
            // recuperer les commentaires
            $req = $bdd->prepare('SELECT id, id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') date_creation_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
            $req->execute(array($_GET['article']));
            while ($donnees = $req->fetch())
            { ?>
            <div class="card-panel teal">
                <p class="white-text"><strong><?php echo htmlspecialchars($donnees['auteur']) . " " . "le " . htmlspecialchars($donnees['date_creation_fr']); ?></strong></p>
                <p class="white-text"><i class="tiny material-icons left">play_arrow</i>
                    <?php echo htmlspecialchars($donnees['commentaire']); ?>
                </p>
            </div>
                <?php
            }
            $req->closeCursor();
            ?>
        </div>
    </div>
</div>

<div class="row">
    <a class="cyan accent-4 btn-floating btn-medium waves-effect waves-light hide-on-med-only hide-on-small-only" style="position: fixed; bottom: 1%; right: 10%;" href="#"><i class="material-icons">arrow_upward</i></a>
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
