<?php
session_start();
require "../model/load.php";

if ($_SESSION['pseudo'] != true)
{
    echo "Tu dois être connécté pour pouvoir poster !";
}
elseif (!empty($_SESSION['pseudo']) AND !empty($_POST['commentaire']))
{
    $req = $bdd->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUE (:id_billet, :auteur, :commentaire, NOW())');
    $req->execute(array(
        'id_billet' => $_GET['article'],
        'auteur' => $_SESSION['pseudo'],
        'commentaire' => $_POST['commentaire']
    ));
}

header('Location: /blog-ydays/article-'.$_GET['article'] . '.html');