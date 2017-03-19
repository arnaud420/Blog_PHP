<?php
require "../model/load.php";
$req = $bdd->prepare('DELETE FROM billets WHERE id = :id');
$req->execute(array(
    'id' => $_GET['id']
));
$req->closeCursor();
header('location: ../admin/index.php#test3');