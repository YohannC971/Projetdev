<!-- 

<!DOCTYPE html>
<html>
<head>
    <title>Liste des candidats</title>
</head>
<body>
    <h1>Liste des candidats</h1>

    <form method="POST" action="traitement.php">
    <?php
    /*
    // Connexion à la base de données
    $connexion = mysqli_connect('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base_de_donnees');

    // Vérification de la connexion
    if (!$connexion) {
        die('Erreur de connexion à la base de données: ' . mysqli_connect_error());
    }

    // Exécution de la requête SQL
    $requete = "SELECT * FROM candidats";
    $resultat = mysqli_query($connexion, $requete);

    // Vérification du résultat de la requête
    if (!$resultat) {
        die('Erreur lors de l\'exécution de la requête: ' . mysqli_error($connexion));
    }

    // Affichage de la liste des candidats
    while ($row = mysqli_fetch_assoc($resultat)) {
        $idCandidat = $row['id']; // id pour récupérer la valeur des checkbox
        echo '<p>
                Nom : ' . $row['nom'] . ' 
                <label for="checkbox_doc_'.$idCandidat.'">Valider les documents :</label>
                <input type="checkbox" id="checkbox_doc_'.$idCandidat.'" name="candidat_document_'.$idCandidat.'" value="'.$idCandidat.'">

                <label for="checkbox_cand_'.$idCandidat.'">Valider la candidature :</label>
                <input type="checkbox" id="checkbox_cand_'.$idCandidat.'" name="candidat_candidature_'.$idCandidat.'" value="'.$idCandidat.'">
                </p>';

        echo '<p>Prenom : ' . $row['prenom'] . '</p>';
    }

    // Fermeture de la connexion à la base de données
    mysqli_close($connexion);
    */
    ?>

    <button type="submit">Enregistrer</button>
    </form>
</body>
</html>


-->