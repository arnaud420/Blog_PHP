<?php
require ('../model/load.php');

$password_hache = sha1($_POST['password']);

$req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = ? AND password = ?');
$req->execute(array(
    $_POST['pseudo'],
    $password_hache
));

$donnees = $req->fetch();

if (htmlspecialchars(!$donnees)) {
    echo "Mauvais mot de passe !";
}
else {
    session_start();
    $_SESSION['id'] = htmlspecialchars($donnees['id']);
    $_SESSION['pseudo'] = htmlspecialchars($_POST['pseudo']);
    header('location: connexion-reussi.html');
}