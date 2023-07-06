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

// Récupérer le login de l'utilisateur en session
$login = $_SESSION['login'];

// Requête SELECT pour récupérer l'ID de l'utilisateur
$sql_select = "SELECT id_utilisateur FROM Utilisateur WHERE login_utilisateur='$login'";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_utilisateur = $row['id_utilisateur'];

    $sql_select_candidat = "SELECT idcandidat_candidat, nom_candidat, prenom_candidat FROM Candidat WHERE id_utilisateur=$id_utilisateur";
    $result = $conn->query($sql_select_candidat);

    if ($result === FALSE) {
        echo "Erreur lors de la récupération des informations du formulaire : " . $conn->error;
        exit;
    }

    if ($result->num_rows > 0) {
        // Récupérer la première ligne de résultat
        $row = $result->fetch_assoc();

        // Accéder aux valeurs des colonnes du formulaire
        $idcandidat_candidat = $row["idcandidat_candidat"];
        $nom_candidat = $row["nom_candidat"];
        $prenom_candidat = $row["prenom_candidat"];
    }
}
$result->close();

// Vérifiez si des fichiers ont été soumis
if (isset($_FILES['file1']) && isset($_FILES['file2']) && isset($_FILES['file3']) && isset($_FILES['file4']) && isset($_FILES['file5']) && isset($_FILES['file6']) && isset($_FILES['file7'])) {

    // Chemin vers le dossier de l'étudiant
    $nomDossier = 'Dossier' . $idcandidat_candidat . '_' . $nom_candidat . '_' . $prenom_candidat; // Nom du dossier
    $cheminDossier = '../EnvoiDossier/' . $nomDossier . '/';

    // Créer le dossier s'il n'existe pas
    if (!is_dir($cheminDossier)) {
        mkdir($cheminDossier, 0777, true);
    }

    // Traitement du premier fichier
    $file1 = $_FILES['file1'];
    $fileName1 = $file1['name'];
    $fileTmpName1 = $file1['tmp_name'];
    $targetFilePath1 = $cheminDossier . $fileName1;

    // Déplacez le fichier temporaire vers le répertoire de destination
    if (move_uploaded_file($fileTmpName1, $targetFilePath1)) {

        // Mettre à jour le cheminComplet dans la base de données
        $sql_update_fichier1 = "UPDATE Candidat SET photo_candidat='$targetFilePath1' WHERE idcandidat_candidat=$idcandidat_candidat";

        if ($conn->query($sql_update_fichier1) === TRUE) {
            echo "CheminComplet mis à jour avec succès dans la base de données.";
        } else {
            echo "Erreur lors de la mise à jour du CheminComplet : " . $conn->error;
        }
    }

    // Traitement du deuxième fichier
    $file2 = $_FILES['file2'];
    $fileName2 = $file2['name'];
    $fileTmpName2 = $file2['tmp_name'];
    $targetFilePath2 = $cheminDossier . $fileName2;

    // Déplacez le fichier temporaire vers le répertoire de destination
    if (move_uploaded_file($fileTmpName2, $targetFilePath2)) {

        // Mettre à jour le cheminComplet dans la base de données
        $sql_update_fichier2 = "UPDATE Candidat SET cv_candidat='$targetFilePath2' WHERE idcandidat_candidat=$idcandidat_candidat";

        if ($conn->query($sql_update_fichier2) === TRUE) {
            echo "CheminComplet mis à jour avec succès dans la base de données.";
        } else {
            echo "Erreur lors de la mise à jour du CheminComplet : " . $conn->error;
        }
    }

    // Traitement du troisième fichier
    $file3 = $_FILES['file3'];
    $fileName3 = $file3['name'];
    $fileTmpName3 = $file3['tmp_name'];
    $targetFilePath3 = $cheminDossier . $fileName3;

    // Déplacez le fichier temporaire vers le répertoire de destination
    if (move_uploaded_file($fileTmpName3, $targetFilePath3)) {

        // Mettre à jour le cheminComplet dans la base de données
        $sql_update_fichier3 = "UPDATE Candidat SET lettredemotivation_candidat='$targetFilePath3' WHERE idcandidat_candidat=$idcandidat_candidat";

        if ($conn->query($sql_update_fichier3) === TRUE) {
            echo "CheminComplet mis à jour avec succès dans la base de données.";
        } else {
            echo "Erreur lors de la mise à jour du CheminComplet : " . $conn->error;
        }
    }

    // Traitement du quatrième fichier
    $file4 = $_FILES['file4'];
    $fileName4 = $file4['name'];
    $fileTmpName4 = $file4['tmp_name'];
    $targetFilePath4 = $cheminDossier . $fileName4;

    // Déplacez le fichier temporaire vers le répertoire de destination
    if (move_uploaded_file($fileTmpName4, $targetFilePath4)) {

        // Mettre à jour le cheminComplet dans la base de données
        $sql_update_fichier4 = "UPDATE Candidat SET releve_candidat='$targetFilePath4' WHERE idcandidat_candidat=$idcandidat_candidat";

        if ($conn->query($sql_update_fichier4) === TRUE) {
            echo "CheminComplet mis à jour avec succès dans la base de données.";
        } else {
            echo "Erreur lors de la mise à jour du CheminComplet : " . $conn->error;
        }
    }

    // Traitement du cinquième fichier
    $file5 = $_FILES['file5'];
    $fileName5 = $file5['name'];
    $fileTmpName5 = $file5['tmp_name'];
    $targetFilePath5 = $cheminDossier . $fileName5;

    // Déplacez le fichier temporaire vers le répertoire de destination
    if (move_uploaded_file($fileTmpName5, $targetFilePath5)) {

        // Mettre à jour le cheminComplet dans la base de données
        $sql_update_fichier5 = "UPDATE Candidat SET diplome_candidat='$targetFilePath5' WHERE idcandidat_candidat=$idcandidat_candidat";

        if ($conn->query($sql_update_fichier5) === TRUE) {
            echo "CheminComplet mis à jour avec succès dans la base de données.";
        } else {
            echo "Erreur lors de la mise à jour du CheminComplet : " . $conn->error;
        }
    }

    // Traitement du sixième fichier
    $file6 = $_FILES['file6'];
    $fileName7 = $file6['name'];
    $fileTmpName6 = $file6['tmp_name'];
    $targetFilePath6 = $cheminDossier . $fileName7;

    // Déplacez le fichier temporaire vers le répertoire de destination
    if (move_uploaded_file($fileTmpName6, $targetFilePath6)) {

        // Mettre à jour le cheminComplet dans la base de données
        $sql_update_fichier6 = "UPDATE Candidat SET justificatifpro_candidat='$targetFilePath6' WHERE idcandidat_candidat=$idcandidat_candidat";

        if ($conn->query($sql_update_fichier6) === TRUE) {
            echo "CheminComplet mis à jour avec succès dans la base de données.";
        } else {
            echo "Erreur lors de la mise à jour du CheminComplet : " . $conn->error;
        }
    }

    // Traitement du 7ème fichier
    $file7 = $_FILES['file7'];
    $fileName7 = $file7['name'];
    $fileTmpName7 = $file7['tmp_name'];
    $targetFilePath7 = $cheminDossier . $fileName7;

    // Déplacez le fichier temporaire vers le répertoire de destination
    if (move_uploaded_file($fileTmpName7, $targetFilePath7)) {

        // Mettre à jour le cheminComplet dans la base de données
        $sql_update_fichier7 = "UPDATE Candidat SET dossierval_candidat='$targetFilePath7' WHERE idcandidat_candidat=$idcandidat_candidat";

        if ($conn->query($sql_update_fichier7) === TRUE) {
            echo "CheminComplet mis à jour avec succès dans la base de données.";
        } else {
            echo "Erreur lors de la mise à jour du CheminComplet : " . $conn->error;
        }
    }

    $conn->close();

    header("Location: questionnaire.php");
    exit;
}
?>
