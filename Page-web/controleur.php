<?php
session_start();
include("model.php");

if(!isset($_POST))
{
    include("index.php");
    return;
}

if(!isset($_POST["Login"]) || !isset($_POST["Pass"]))
{
    include("index.php");
    return;
}

if (strlen($_POST["Login"])==0 || strlen($_POST["Pass"])==0) {
    include("index.php");
    return;
}

// Vérification des paramètres envoyés
if (isset($_POST['Login']) && isset($_POST['Pass'])) {
    $login = $_POST['Login'];
    $password = $_POST['Pass'];

    // Appel de la fonction de connexion
    $result = connexion($login, $password);

    if ($result == 1) {
        // Connexion réussie
        header("Location: accueil.html"); // Rediriger vers la page de tableau de bord après la connexion
        exit();
    } else {
        // Connexion échouée
        $_SESSION['error'] = "Identifiant ou mot de passe incorrect";
        header("Location: index.php"); // Rediriger vers la page de connexion avec un message d'erreur
        exit();
    }
}
?>