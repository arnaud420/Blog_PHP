<?php
require "../model/load.php";

$req = $bdd->prepare('UPDATE billets SET titre = ?, resume = ?, contenu = ? WHERE id = ?');
$req->execute(array(
    $_POST['titre'],
    $_POST['resume'],
    $_POST['contenu'],
    $_GET['id']
));
$req->closeCursor();
header('location: ../admin/index.php#test2');