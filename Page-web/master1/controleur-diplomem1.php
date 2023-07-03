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
        $autres_diplome_obtenu = $_POST['autres_diplome_obtenu'];
        $annee_autres_diplome = $_POST['annee_autres_diplome'];
        $moyenne_autres_diplome = $_POST['moyenne_autres_diplome'];
        $lieu_autre_diplome = $_POST['lieu_autre_diplome'];
        $etablissement_autre_diplome = $_POST['etablissement_autre_diplome'];

     
        $sql_select_candidat_id = "SELECT idcandidat_candidat FROM Candidat WHERE id_utilisateur=$id_utilisateur";
        $result_candidat_id = $conn->query($sql_select_candidat_id);

        if ($result_candidat_id->num_rows > 0) {
            $row_candidat_id = $result_candidat_id->fetch_assoc();
            $candidat_id = $row_candidat_id['idcandidat_candidat'];

           // Mettre à jour les informations dans la table Formulaire
            $sql_update_1ercycle = "UPDATE Formulaire SET 
            autre_diplome_obtenu_formulaire='$autres_diplome_obtenu',
            annee_autres_diplome_formulaire='$annee_autres_diplome',
            moyenne_autres_diplome_formulaire='$moyenne_autres_diplome',
            lieu_autre_diplome_formulaire='$lieu_autre_diplome',
            etablissement_autre_diplome_formulaire='$etablissement_autre_diplome'
            WHERE candidat_idcandidat_candidat=$candidat_id";

            if ($conn->query($sql_update_1ercycle) !== TRUE) {
                echo "Erreur lors de la mise à jour de formulaire_id_formulaire dans la table Candidat : " . $conn->error;
                exit;
            }
            header("Location: viepro.php");
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
