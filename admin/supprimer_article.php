<div class="container">
    <h2 class="center">Supprime un article</h2>

    <div class="row">
        <ul class="collection with-header">
            <li class="collection-header"><h4 class="center">Titres des articles</h4></li>
            <?php
            $req = $bdd->prepare('SELECT id, titre, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') date_creation_fr FROM billets ORDER BY date_creation DESC');
            $req->execute();
            while ($donnees = $req->fetch()) {
                ?>
            <li class="collection-item dismissable">
                <div>
                    <strong><?php echo htmlspecialchars($donnees['titre']) . " " . "le" . " " . htmlspecialchars($donnees['date_creation_fr']); ?></strong>
                    <a href="../controller/supprimer_post.php?id=<?php echo htmlspecialchars($donnees['id']); ?>"
                       class="secondary-content red-text text-lighten-1"><i class="material-icons right red-text text-lighten-1">send</i>Supprimer</a>
                </div>
            </li>
            <?php
            }
                ?>
            </ul>
        </div>
</div>