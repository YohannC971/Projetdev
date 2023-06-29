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

        // Récupérer les valeurs des champs de formulaire
        $intitule_1ere_annee = $_POST['intitule_1ere_annee'];
        $annee_obtention_1ere_annee = $_POST['annee_obtention_1ere_annee'];
        $lieu_1ere_annee = $_POST['lieu_1ere_annee'];
        $moyenne_1ere_annee = $_POST['moyenne_1ere_annee'];
        /***************************************************** */
        $intitule_2eme_annee = $_POST['intitule_2eme_annee'];
        $annee_obtention_2eme_annee = $_POST['annee_obtention_2eme_annee'];
        $lieu_2eme_annee = $_POST['lieu_2eme_annee'];
        $moyenne_2eme_annee = $_POST['moyenne_2eme_annee'];
     
        $sql_select_candidat_id = "SELECT idcandidat_candidat FROM Candidat WHERE id_utilisateur=$id_utilisateur";
        $result_candidat_id = $conn->query($sql_select_candidat_id);

        if ($result_candidat_id->num_rows > 0) {
            $row_candidat_id = $result_candidat_id->fetch_assoc();
            $candidat_id = $row_candidat_id['idcandidat_candidat'];

           // Mettre à jour les informations dans la table Formulaire
            $sql_update_1ercycle = "UPDATE Formulaire SET 
            intituleannee1_formulaire='$intitule_1ere_annee',
            anneeobtention1_formulaire='$annee_obtention_1ere_annee',
            lieuobtention1_formulaire='$lieu_1ere_annee',
            moyenneannee1_formulaire='$moyenne_1ere_annee',
            intituleannee2_formulaire='$intitule_2eme_annee',
            anneeobtention2_formulaire='$annee_obtention_2eme_annee',
            lieuobtention2_formulaire='$lieu_2eme_annee',
            moyenneannee2_formulaire='$moyenne_2eme_annee'
            WHERE candidat_idcandidat_candidat=$candidat_id";

            if ($conn->query($sql_update_1ercycle) !== TRUE) {
                echo "Erreur lors de la mise à jour de formulaire_id_formulaire dans la table Candidat : " . $conn->error;
                exit;
            }
            header("Location: diplome.html");
        } else {
            echo "Identifiant du candidat non trouvé.";
            exit;
        }
} else {
    echo "Utilisateur non trouvé.";
    exit;
}

$conn->close();
?>
