<?php
include("../config.php");

// Récupérer l'ID du candidat à refuser depuis le formulaire
if (isset($_POST['candidat_id'])) {
    $candidat_id = $_POST['candidat_id'];
    
    // Mettre à jour la base de données avec le refus de l'admission du candidat
    $conn = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }
    
    $sql = "UPDATE Candidat SET Etat_admission = 0 WHERE idcandidat_candidat = $candidat_id";

    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page affichercandi.php après avoir effectué la mise à jour
        header("Location: affichercandi.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour du refus d'admission : " . $conn->error;
    }
    
    $conn->close();
}
?>
