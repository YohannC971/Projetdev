<?php
include("./config.php");

// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ./index.php");
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
if (isset($_FILES['filedoss'])) {

    // Chemin vers le dossier de l'étudiant
    $nomDossier = 'Dossier' . $idcandidat_candidat . '_' . $nom_candidat . '_' . $prenom_candidat; // Nom du dossier
    $cheminDossier = './EnvoiDossier/' . $nomDossier . '/';

    // Créer le dossier s'il n'existe pas
    if (!is_dir($cheminDossier)) {
        mkdir($cheminDossier, 0777, true);
    }

    // Traitement du premier fichier
    $filedoss = $_FILES['filedoss'];
    $fileName1 = $filedoss['name'];
    $fileTmpName1 = $filedoss['tmp_name'];
    $targetFilePath1 = './' . $fileName1 . '/';

    // Déplacez le fichier temporaire vers le répertoire de destination
    if (move_uploaded_file($fileTmpName1, $targetFilePath1)) {

        // Mettre à jour le cheminComplet dans la base de données
        $sql_update_fichier1 = "UPDATE Candidat SET dossiervalidation_candidat='$targetFilePath1' WHERE idcandidat_candidat=$idcandidat_candidat";

        if ($conn->query($sql_update_fichier1) === TRUE) {
            echo "CheminComplet mis à jour avec succès dans la base de données.";
        } else {
            echo "Erreur lors de la mise à jour du CheminComplet : " . $conn->error;
        }
    }

    $conn->close();

    header("Location: index.php");
    exit;
}
?>
