<?php
include("../config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newKey = $_POST["cle"];

    $conn = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Requête UPDATE pour mettre à jour la clé d'inscription
    $sql_update = "UPDATE `cle-inscription` SET `cle` = '$newKey'";
    if ($conn->query($sql_update) === TRUE) {
        echo "Clé d'inscription mise à jour avec succès.";
        header("Location: modifie-cle-inscription.php");

    } else {
        echo "Erreur lors de la mise à jour de la clé d'inscription : " . $conn->error;
    }

    $conn->close();
}
?>
