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
    $idformation_formation = '1';

        // Récupérer les valeurs des champs de formulaire
        $autresFormations = $_POST['choix_candidate_a_autres_formations'];
        if ($autresFormations === 'oui') {
            $lesquelles = $_POST['input_autres_formation'];
           
        }
        else{
            $autresFormations === 'non';
        }

        $stagesEntreprise = $_POST['choix_stages_entreprise'];
        if ($stagesEntreprise === 'oui') {
            $quellesEntreprises = $_POST['input_quelle_entreprise'];
            $themesEntreprise = $_POST['theme_entreprise'];
       
        }
        else{
            $stagesEntreprise === 'non';
        }
     
        $sql_select_candidat_id = "SELECT idcandidat_candidat FROM Candidat WHERE id_utilisateur=$id_utilisateur";
        $result_candidat_id = $conn->query($sql_select_candidat_id);

        if ($result_candidat_id->num_rows > 0) {
            $row_candidat_id = $result_candidat_id->fetch_assoc();
            $candidat_id = $row_candidat_id['idcandidat_candidat'];

           // Mettre à jour les informations dans la table Formulaire
            $sql_update_1ercycle = "UPDATE Formulaire SET 
            choix_candidate_a_autres_formations_formulaire='$autresFormations',
            input_autres_formation_formulaire='$lesquelles',
            stagesEntreprise_formulaire='$stagesEntreprise',
            input_quelle_entreprise_formulaire='$quellesEntreprises',
            theme_entreprise_formulaire='$themesEntreprise',
            idformation_formation='$idformation_formation'
            WHERE candidat_idcandidat_candidat=$candidat_id";

            if ($conn->query($sql_update_1ercycle) !== TRUE) {
                echo "Erreur lors de la mise à jour de formulaire_id_formulaire dans la table Candidat : " . $conn->error;
                exit;
            }
            header("Location: piece_justificatif.php");
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
