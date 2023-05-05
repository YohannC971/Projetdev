<?php
// Informations de connexion à la base de données
//$servername = "nom_du_serveur";
//$username = "nom_utilisateur";
//$password = "mot_de_passe";
//$dbname = "nom_base_de_donnees";

// Création de la connexion
$conn = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);

// Vérification de la connexion
if ($conn->connect_error) {
  die("Connexion échouée: " . $conn->connect_error);
}

// Récupération des données du formulaire d'inscription
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];

// Requête SQL pour insérer un nouvel utilisateur dans la base de données
$sql = "INSERT INTO Utilisateur (nom, prenom, email) VALUES ('" . $nom . "', '" . $prenom . "', '" . $email . "')";

if ($conn->query($sql) === TRUE) {
  echo "Nouvel utilisateur créé avec succès";
} else {
  echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// Fermeture de la connexion à la base de données
$conn->close();

?>