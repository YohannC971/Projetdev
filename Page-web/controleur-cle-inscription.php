<?php
include("config.php");
// Récupérer la clé d'inscription envoyée depuis le formulaire
$cle_inscription = $_POST['cle_inscription'];

$conn = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);

// Vérifier les erreurs de connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Requête SQL pour vérifier si la clé d'inscription existe dans la table `cle-inscription`
$sql = "SELECT * FROM `cle-inscription` WHERE cle = '$cle_inscription'";
$result = $conn->query($sql);

// Vérifier si la requête a retourné des résultats
if ($result->num_rows > 0) {
    // La clé d'inscription est valide, rediriger l'utilisateur vers la page d'inscription
    header("Location: inscription_responsable.html");
    exit();
} else {
    // La clé d'inscription est invalide, afficher un message d'erreur
    echo "Clé d'inscription invalide";
}

// Fermer la connexion à la base de données
$conn->close();
?>
