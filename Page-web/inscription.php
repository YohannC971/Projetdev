<?php

require 'config.php';

// Connexion à la base de données
$conn = mysqli_connect($HOST, $LOGINBDD, $PASSBDD, $BDD);


// Vérification de la connexion
if (!$conn) {
    die("La connexion a échoué: " . mysqli_connect_error());
    
}
else{
  // Récupération des données du formulaire d'inscription
$login = $_POST['login'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$Pass = $_POST['Pass'];

// Requête SQL pour insérer un nouvel utilisateur dans la base de données
$sql = "INSERT INTO utilisateur (login,nom, prenom, email, Pass) VALUES ('" . $login . "','" . $Pass . "')";
$sql2 = "INSERT INTO candidats (login,nom, prenom, email) VALUES ('" . $login . "','" . $nom . "', '" . $prenom . "', '" . $email . "')";

if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
  echo "Nouvel utilisateur créé avec succès";

  header('Location: inscription_reussi.html');

} else {
  echo "Erreur: " . $sql . "<br>" . $conn->error;
}
  echo "Connexion réussie";
}

?>
