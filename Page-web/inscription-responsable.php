<?php

include('config.php');

// Connexion à la base de données
$conn = mysqli_connect($HOST, $LOGINBDD, $PASSBDD, $BDD);

// Vérification de la connexion
if (!$conn) {
    die("La connexion a échoué: " . mysqli_connect_error());
} else {
    // Récupération des données du formulaire d'inscription
    $login = $_POST['login'];
    $Pass = $_POST['Pass'];
    $role = 'responsable';

    // Requête SQL pour insérer un nouvel utilisateur dans la base de données
    $sql = "
        INSERT INTO utilisateur (login_utilisateur, passe_utilisateur, role_utilisateur)
        VALUES ('" . $login . "','" . $Pass . "','" . $role . "');


    ";

    if ($conn->multi_query($sql) === TRUE) {
      echo "Nouvel utilisateur créé avec succès";
  
      header('Location: inscription_reussi.html');
  } else {
      echo "Erreur: " . $sql . "<br>" . $conn->error;
  }

    echo "Connexion réussie";
}

?>
