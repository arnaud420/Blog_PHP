<div class="container">
    <div class="row">
        <h2 class="center">Ajoute un article</h2>
    </div>

    <div class="row card-panel">
        <div class="col s12">
            <form action="../controller/ajouter_post.php" method="post" enctype="multipart/form-data">

                <div class="input-field col s6 offset-s3">
                    <textarea type="text" name="titre" id="titre" class="validate materialize-textarea"></textarea> <label for="titre">Titre</label>
                </div>

                <div class="input-field col s12">
                    <textarea type="text" name="resume" id="resume" class="validate materialize-textarea"></textarea> <label for="resume">Résumé</label>
                </div>

                <div class="input-field col s12">
                    <textarea name="contenu" id="contenu" class="materialize-textarea validate"></textarea>
                    <label for="contenu">Contenu</label>
                </div>

                <div class="col s12">
                    <input type="file" name="image">
                    <label>Upload ton image</label>
                </div>

                <div class="col s12">
                    <input type="submit" value="Poster" class="btn waves-light right red lighten-1">
                </div>
            </form>
        </div>
    </div>

</div>