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

    // Récupérer l'intitulé de formation correspondant à id_formation_formation = 1
    $sql_select_formation = "SELECT intitule_formation FROM Formation WHERE idformation_formation = 1";
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
        $sql_update_formulaire = "UPDATE Formulaire SET datenaissance_formulaire='$date_naissance', ville='$ville', codepostal=$codePostal, telephone=$telephone, mobile=$mobile WHERE candidat_idcandidat_candidat=(SELECT idcandidat_candidat FROM Candidat WHERE id_utilisateur=$id_utilisateur)";
        if ($conn->query($sql_update_formulaire ) !== TRUE) {
            echo "Erreur lors de la mise à jour des informations dans le formulaire : " . $conn->error;
            exit;
        }

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
