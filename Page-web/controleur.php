<?php
session_start();
include("model.php");

if (!isset($_POST)) {
    include("index.php");
    return;
}

if (!isset($_POST["Login"]) || !isset($_POST["Pass"])) {
    include("index.php");
    return;
}

if (strlen($_POST["Login"]) == 0 || strlen($_POST["Pass"]) == 0) {
    include("index.php");
    return;
}

//Enregistrement des login et mdp des utilisateurs connectés.
$_SESSION["login"] = $_POST['Login'];
$_SESSION["pass"] = $_POST['Pass'];

// Vérification des paramètres envoyés
if (isset($_POST['Login']) && isset($_POST['Pass'])) {
    $login = $_POST['Login'];
    $password = $_POST['Pass'];

    // Appel de la fonction de connexion
    $result = connexion($login, $password);
    $role = $_SESSION["role"];

    //Si l'utilisateur est un étudiant, connexion à accueil.html
    if ($result == 1 && $role == "etudiant") {
        // Connexion réussie
        header("Location: accueil.html"); // Rediriger vers la page d'accueil après la connexion
        exit();
    }
    //Si l'utilisateur est un responsable, connexion à professeur/affichercandi.php
    elseif ($result == 1 && $role == "responsable") {
        // Connexion réussie
        header("Location: professeur/affichercandi.php"); // Rediriger vers la page de gestion des candidatures
        exit();
    } else {
        // Connexion échouée
        $_SESSION['error'] = "Identifiant ou mot de passe incorrect";
        header("Location: index.php"); // Rediriger vers la page de connexion avec un message d'erreur
        exit();
    }
}
?>
