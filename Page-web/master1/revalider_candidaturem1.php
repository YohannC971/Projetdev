<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}
include("../config.php");

$conn = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

$login = $_SESSION['login'];

$sql_select = "SELECT id_utilisateur FROM Utilisateur WHERE login_utilisateur='$login'";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_utilisateur = $row['id_utilisateur'];

    // Vérifier si la colonne "datevalidation" est NULL pour l'utilisateur
    $sql_check_date = "SELECT datevalidation FROM Formulaire WHERE candidat_idcandidat_candidat=(SELECT idcandidat_candidat FROM Candidat WHERE id_utilisateur=$id_utilisateur)";
    $result_date = $conn->query($sql_check_date);

    if ($result_date->num_rows > 0) {
        $row_date = $result_date->fetch_assoc();
        $datevalidation = $row_date['datevalidation'];
        
         // Mettre à jour la colonne "datevalidation" avec la nouvelle date
        $datevalidation = date('Y-m-d');

        $sql_update_formulaire = "UPDATE Formulaire SET datevalidation='$datevalidation' WHERE candidat_idcandidat_candidat=(SELECT idcandidat_candidat FROM Candidat WHERE id_utilisateur=$id_utilisateur)";
        $sql_update_etat = "UPDATE Candidat SET Etat_admission = NULL, Etat_document_candidat = NULL WHERE id_utilisateur=$id_utilisateur";


        if ($conn->query($sql_update_formulaire) !== TRUE) {
                echo "Erreur lors de la mise à jour des informations dans le formulaire : " . $conn->error;
                exit;
        }
        if ($conn->query($sql_update_etat) !== TRUE) {
            echo "Erreur lors de la mise à jour des informations dans le Candidat : " . $conn->error;
            exit;
    }

    }
    // Redirection vers la page "recap.html"
    header("Location: recapm1.html");
    exit;
}

$conn->close();
?>
