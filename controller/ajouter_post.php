<?php
require "../model/load.php";

if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0 AND !empty($_POST['titre']) AND !empty($_POST['resume']) AND !empty($_POST['contenu']))
{
    if ($_FILES['image']['size'] <= 1000000)
    {
        $infosfichier = pathinfo($_FILES['image']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
        if (in_array($extension_upload, $extensions_autorisees))
        {
            move_uploaded_file($_FILES['image']['tmp_name'], '../container/image/' . basename($_FILES['image']['name']));
            $req = $bdd->prepare('INSERT INTO billets (titre, contenu, resume, image, date_creation) VALUE (:titre, :contenu, :resume, :image, NOW())');
            $req->execute(array(
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'resume' => $_POST['resume'],
                'image' => $_FILES['image']['name']
            ));
            header('location: ../admin/index.php');
        }
        else {
            echo "Format non autorisé";
        }
    }
    else {
        echo "Image trop volumineuse";
    }
}
else
{
    echo "Il faut écrire un titre, un résumé avec un contenu et upload une image !";
}