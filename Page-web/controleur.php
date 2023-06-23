<?php
session_start();
include("model.php");

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
} else {
    // Les paramètres n'ont pas été envoyés
    $_SESSION['error'] = "Veuillez remplir tous les champs";
    header("Location: index.php"); // Rediriger vers la page de connexion avec un message d'erreur
    exit();
}
?>