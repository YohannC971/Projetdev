<?php

/*

// Connexion à la base de données
$connexion = mysqli_connect('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base_de_donnees');

// Vérification de la connexion
if (!$connexion) {
    die('Erreur de connexion à la base de données: ' . mysqli_connect_error());
}

// Traitement des valeurs des cases à cocher pour chaque candidat
$requete = "SELECT * FROM candidats";
$resultat = mysqli_query($connexion, $requete);

if (!$resultat) {
    die('Erreur lors de l\'exécution de la requête: ' . mysqli_error($connexion));
}

while ($row = mysqli_fetch_assoc($resultat)) {
    $idCandidat = $row['id'];

    // Récupération de la valeur de la case à cocher pour les documents
    $candidatDocument = isset($_POST['candidat_document_'.$idCandidat]) ? 1 : 0;

    // Récupération de la valeur de la case à cocher pour la candidature
    $candidatCandidature = isset($_POST['candidat_candidature_'.$idCandidat]) ? 1 : 0;

    // Mettre à jour la base de données avec les valeurs des cases à cocher
    $updateRequete = "UPDATE candidats SET document = $candidatDocument, candidature = $candidatCandidature WHERE id = $idCandidat";
    $updateResultat = mysqli_query($connexion, $updateRequete);

    if (!$updateResultat) {
        die('Erreur lors de la mise à jour de la base de données: ' . mysqli_error($connexion));
    }
}

// Fermeture de la connexion à la base de données
mysqli_close($connexion);

*/

?>
