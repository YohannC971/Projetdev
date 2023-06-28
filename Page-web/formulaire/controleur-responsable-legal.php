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
        $nomparent1 = $_POST['nomparent1'];
        $prenomparent1 = $_POST['prenomparent1'];
        $numeroparent1 = $_POST['numeroparent1'];
        $nomparent2 = $_POST['nomparent2'];
        $prenomparent2 = $_POST['prenomparent2'];
        $numeroparent2 = $_POST['numeroparent2'];
        $nomresponsablelegal = $_POST['nomresponsablelegal'];
        $prenomresponsablelegal = $_POST['prenomresponsablelegal'];
        $numerorespnsablelegal = $_POST['numerorespnsablelegal'];

        $sql_select_candidat_id = "SELECT idcandidat_candidat FROM Candidat WHERE id_utilisateur=$id_utilisateur";
        $result_candidat_id = $conn->query($sql_select_candidat_id);

        if ($result_candidat_id->num_rows > 0) {
            $row_candidat_id = $result_candidat_id->fetch_assoc();
            $candidat_id = $row_candidat_id['idcandidat_candidat'];

           // Mettre à jour les informations dans la table Formulaire
            $sql_update_formulaire_id = "UPDATE Formulaire SET 
            nom_parent1='$nomparent1',
            prennom_parent1='$prenomparent1',
            numero_parent1=$numeroparent1,
            nom_parent2='$nomparent2',
            prennom_parent2='$prenomparent2',
            numero_parent2=$numeroparent2,
            nom_responsable_legale='$nomresponsablelegal',
            prenom_responsable_legale='$prenomresponsablelegal',
            numero_responsable_legale=$numerorespnsablelegal
            WHERE candidat_idcandidat_candidat=$candidat_id";

            if ($conn->query($sql_update_formulaire_id) !== TRUE) {
                echo "Erreur lors de la mise à jour de formulaire_id_formulaire dans la table Candidat : " . $conn->error;
                exit;
            }
            // Récupérer l'ID du formulaire mis à jour
            $id_formulaire = $conn->insert_id;

// Mettre à jour la colonne formulaire_id_formulaire dans la table Candidat
            $sql_update_candidat = "UPDATE Candidat
            SET formulaire_idformulaire_formulaire = (SELECT idformulaire_formulaire FROM Formulaire WHERE candidat_idcandidat_candidat = $candidat_id)
            WHERE idcandidat_candidat = $candidat_id";


            if ($conn->query($sql_update_candidat) !== TRUE) {
            echo "Erreur lors de la mise à jour de formulaire_idformulaire_formulaire : " . $conn->error;
            exit;
            }

            header("Location: responsable_legal.html");
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
