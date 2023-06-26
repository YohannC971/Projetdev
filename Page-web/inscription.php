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
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $Pass = $_POST['Pass'];
    $role = 'etudiant';

    // Requête SQL pour insérer un nouvel utilisateur dans la base de données
    $sql = "
        INSERT INTO utilisateur (login_utilisateur, passe_utilisateur, role_utilisateur)
        VALUES ('" . $login . "','" . $Pass . "','" . $role . "');

        SET @id_utilisateur = LAST_INSERT_ID();

        INSERT INTO candidat (id_utilisateur, nom_candidat, prenom_candidat)
        VALUES (@id_utilisateur, '" . $nom . "', '" . $prenom . "');

        SET @id_candidat = LAST_INSERT_ID();

        INSERT INTO formulaire (candidat_idcandidat_candidat, email_formulaire)
        VALUES (@id_candidat, '" . $email . "');
    ";

    if ($conn->multi_query($sql) === TRUE) {
      echo "Nouvel utilisateur créé avec succès";
  
      // Création du dossier du candidat sur le serveur local
      $idCandidat = $conn->insert_id;
      $dossierCandidat = "EnvoiDossier/Dossier-" . $idCandidat . "-" . $nom . "-" . $prenom;
  
      if (!is_dir($dossierCandidat)) {
          if (mkdir($dossierCandidat, 0777, true)) {
              echo "Dossier du candidat créé avec succès";
  
              // Mise à jour du lien du dossier dans la table "candidat"
              $updateQuery = "UPDATE candidat SET dossiervalidation_candidat = '$dossierCandidat' WHERE idcandidat_candidat = $idCandidat";

  
              if ($conn->query($updateQuery) === TRUE) {
                  echo "Lien du dossier mis à jour dans la table 'Candidat'";
              } else {
                  echo "Échec de la mise à jour du lien du dossier dans la table 'Candidat': " . $conn->error;
              }
          } else {
              echo "Échec de la création du dossier du candidat";
          }
      } else {
          echo "Le dossier du candidat existe déjà";
      }
  
      header('Location: inscription_reussi.html');
  } else {
      echo "Erreur: " . $sql . "<br>" . $conn->error;
  }

    echo "Connexion réussie";
}

?>
