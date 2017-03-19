<div class="container">
    <h2 class="center">Modifie un article</h2>
    <?php
    require "../model/load.php";

    $req = $bdd->prepare('SELECT id, titre, resume, contenu FROM billets ORDER BY date_creation DESC');
    $req->execute();
    while ($reponse = $req->fetch()) {
        ?>
        <div class="row section card-panel">
            <div class="col s12 section">
                <form action="../controller/modifier_post.php?id=<?php echo htmlspecialchars($reponse['id']); ?>" method="post">
                    <div class="input-field col s12">
                        <label for="titre">Titre</label> <textarea name="titre" type="text" id="titre" class="materialize-textarea"><?php echo htmlspecialchars($reponse['titre']); ?></textarea>
                    </div>

                    <div class="input-field col s12">
                        <label for="resume">Résumé</label> <textarea name="resume" type="text" id="resume" class="materialize-textarea"><?php echo htmlspecialchars($reponse['resume']); ?></textarea>
                    </div>

                    <div class="input-field col s12">
                        <label for="contenu">Contenu</label> <textarea name="contenu" type="text" id="contenu" class="materialize-textarea"><?php echo htmlspecialchars($reponse['contenu']); ?></textarea>
                    </div>

                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($reponse['id']); ?>"/>
                    <input type="submit" value="Modifier" class="btn waves-light right red lighten-1">
                </form>
            </div>
        </div>
        <?php
    }
    ?>
</div>