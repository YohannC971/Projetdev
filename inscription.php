<?php


// Informations de connexion
$servername = "localhost";
$username = "user";
$password = "root";
$dbname = "prog_full_stack";

// Connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("La connexion a échoué: " . mysqli_connect_error());
    
}
else{
  // Récupération des données du formulaire d'inscription
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];

// Requête SQL pour insérer un nouvel utilisateur dans la base de données
$sql = "INSERT INTO utilisateur (nom, prenom, email) VALUES ('" . $nom . "', '" . $prenom . "', '" . $email . "')";

if ($conn->query($sql) === TRUE) {
  echo "Nouvel utilisateur créé avec succès";
  header('Location: index.php');
} else {
  echo "Erreur: " . $sql . "<br>" . $conn->error;
}
  echo "Connexion réussie";
  header('Location: index.php');
}

?>
