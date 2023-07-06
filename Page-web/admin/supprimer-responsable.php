<?php
include("../config.php");

// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}


$conn = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Vérifier si l'ID du responsable est passé en paramètre
if (isset($_GET["idres"]) && ($_GET["idutilisateur"])) {
    $id = $_GET["idres"];
    $iduti = $_GET["idutilisateur"];


    // Supprimer le responsable de la base de données
    $sql_responsable = "DELETE FROM responsables WHERE idres_responsables = ?";
    $stmt_responsable = $conn->prepare($sql_responsable);
    $stmt_responsable->bind_param("i", $id);

    // Supprimer l'utilisateur associé dans la table utilisateur
    $sql_utilisateur = "DELETE FROM utilisateur WHERE id_utilisateur = ?";
    $stmt_utilisateur = $conn->prepare($sql_utilisateur);
    $stmt_utilisateur->bind_param("i", $iduti);

    if ($stmt_responsable->execute() && $stmt_utilisateur->execute()) {
        echo "Le responsable et l'utilisateur associé ont été supprimés avec succès.";
        header("Location: liste-responsable.php");
    } else {
        echo "Erreur lors de la suppression du responsable et de l'utilisateur : " . $conn->error;
    }

    $stmt_responsable->close();
    $stmt_utilisateur->close();
} else {
    echo "ID du responsable non spécifié.";
}

$conn->close();

?>
