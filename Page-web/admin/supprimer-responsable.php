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
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Supprimer le responsable de la base de données
    $sql = "DELETE FROM responsables WHERE idres_responsables = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Le responsable a été supprimé avec succès.";
        header("Location: liste-responsable.php");
    } else {
        echo "Erreur lors de la suppression du responsable : " . $conn->error;
    }

    $stmt->close();
} else {
    echo "ID du responsable non spécifié.";
}

$conn->close();
?>
