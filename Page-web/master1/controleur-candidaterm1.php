<?php
// Vérifier si l'utilisateur est connecté
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

// Récupérer le login de l'utilisateur en session
$login = $_SESSION['login'];

// Requête SELECT pour récupérer l'ID de l'utilisateur
$sql_select = "SELECT id_utilisateur FROM Utilisateur WHERE login_utilisateur='$login'";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_utilisateur = $row['id_utilisateur'];

    // Récupérer l'intitulé de formation correspondant à id_formation_formation = 2
    $sql_select_formation = "SELECT intitule_formation FROM Formation WHERE idformation_formation = 2";
    $result_formation = $conn->query($sql_select_formation);

    if ($result_formation->num_rows > 0) {
        $row_formation = $result_formation->fetch_assoc();
        $intitule_formation = $row_formation['intitule_formation'];

        // Récupérer les autres valeurs à mettre à jour
        $nom_jeune_fille = $_POST['nom_jeune_fille'];
        $date_naissance = $_POST['date_naissance'];
        $lieu_naissance = $_POST['lieu_naissance'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $codePostal = $_POST['codePostal'];
        $telephone = $_POST['telephone'];
        $mobile = $_POST['mobile'];
        

        // Mettre à jour les informations dans la table Candidat
        $sql_update_candidat = "UPDATE Candidat SET nom_jeune_fille_candidat='$nom_jeune_fille', intitule_formation='$intitule_formation' WHERE id_utilisateur=$id_utilisateur";
        if ($conn->query($sql_update_candidat) !== TRUE) {
            echo "Erreur lors de la mise à jour du nom de Jeune Fille : " . $conn->error;
            exit;
        }

        // Mettre à jour les informations dans la table Formulaire
        $sql_update_formulaire = "UPDATE Formulaire SET datenaissance_formulaire='$date_naissance', lieu_naissance_formulaire='$lieu_naissance', ville='$ville', AdressePrincipal_formulaire='$adresse', codepostal=$codePostal, telephone=$telephone, mobile=$mobile WHERE candidat_idcandidat_candidat=(SELECT idcandidat_candidat FROM Candidat WHERE id_utilisateur=$id_utilisateur)";
        if ($conn->query($sql_update_formulaire ) !== TRUE) {
            echo "Erreur lors de la mise à jour des informations dans le formulaire : " . $conn->error;
            exit;
        }

        header("Location: responsable_legalm1.php");
    } else {
        echo "Formation non trouvée.";
        exit;
    }
} else {
    echo "Utilisateur non trouvé.";
    exit;
}

$conn->close();
?>

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

        // Fonction pour créer le dossier sur le serveur
        function creerDossier($idcandidat, $nom, $prenom) {
            // Chemin du dossier sur le serveur
            $cheminDossier = "../EnvoiDossier/Dossier{$idcandidat}_{$nom}_{$prenom}";

            // Vérifier si le dossier existe déjà
            if (!file_exists($cheminDossier)) {
                // Créer le dossier
                mkdir($cheminDossier, 0777, true);
                echo "Dossier créé avec succès.";
            } else {
                echo "Le dossier existe déjà.";
            }

            return $cheminDossier;
        }

        // Fonction pour mettre à jour le lien du dossier dans la table candidat de la base de données
        function mettreAJourLienDossier($idcandidat, $nom, $prenom, $lienDossier) {
            // Connexion à la base de données
            include("../config.php");
            $connexion = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);
            if (!$connexion) {
                die("Erreur de connexion à la base de données: " . mysqli_connect_error());
            }

            // Échapper les valeurs pour éviter les injections SQL
            $idcandidat = mysqli_real_escape_string($connexion, $idcandidat);
            $nom = mysqli_real_escape_string($connexion, $nom);
            $prenom = mysqli_real_escape_string($connexion, $prenom);
            $lienDossier = mysqli_real_escape_string($connexion, $lienDossier);

            // Requête SQL pour mettre à jour le lien du dossier
            $updateQuery = "UPDATE candidat SET dossiervalidation_candidat = '$lienDossier' WHERE idcandidat_candidat = $idcandidat";

            if (mysqli_query($connexion, $updateQuery)) {
                echo "Lien du dossier mis à jour avec succès.";
            } else {
                echo "Erreur lors de la mise à jour du lien du dossier: " . mysqli_error($connexion);
            }

            // Fermer la connexion à la base de données
            mysqli_close($connexion);
        }
        header("Location : responsable_legalm1.php");

        

        $lienDossier = creerDossier($idcandidat_candidat, $nom_candidat, $prenom_candidat);
        mettreAJourLienDossier($idcandidat_candidat, $nom_candidat, $prenom_candidat, $lienDossier);

        
    }
}

$result->close();
$conn->close();
?>
