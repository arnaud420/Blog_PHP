<?php
require ('../model/load.php');

$password_hache = sha1($_POST['password']);

$req = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = ?');
$req->execute(array(
    $_POST['pseudo']
));
$pseudo = $req->fetch();

if (strtolower(htmlspecialchars($_POST['pseudo'])) == (htmlspecialchars(strtolower($pseudo['pseudo'])))) //vérifie si le pseudo existe deja dans la bdd
{
    ?> <h3 style='text-align: center'>Ce nom d'utilisateur est déjà utilisé.</h3>
    <a href="inscription.html">Revenir à la page d'inscription</a>
    <?php
}
elseif (strlen($_POST['password']) < 7)
{
    echo "Mot de passe trop court";
}
elseif ($_POST['password'] != $_POST['passwordVerif'])
{
    echo "Le mot de passe n'est pas identique dans les 2 champs";
}
else
{
    $req = $bdd->prepare('INSERT INTO membres(pseudo, password, email, date_inscription) VALUES (:pseudo, :password, :email, NOW())');
    $req->execute(array(
        "pseudo" => $_POST['pseudo'],
        "password" => $password_hache,
        "email" => $_POST['email']
    ));
    header('location: inscription-reussi.html');
}
