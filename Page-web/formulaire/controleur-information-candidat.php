<?php
include("../config.php");
// Connexion à la base de données

$conn = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données: " . $conn->connect_error);
}

// Récupération des données du formulaire en POST
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$nomJeuneFille = $_POST['nom_jeune_fille'];
$dateNaissance = $_POST['date_naissance'];
$lieuNaissance = $_POST['lieu_naissance'];
$adresse = $_POST['adresse'];
$ville = $_POST['ville'];
$codePostal = $_POST['codePostal'];
$telephone = $_POST['telephone'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];

// Vérification de l'e-mail existant dans la table `Formulaire`
$requeteVerification = $conn->prepare("SELECT email_formulaire FROM Formulaire WHERE email_formulaire = ?");
$requeteVerification->bind_param("s", $email);
$requeteVerification->execute();
$resultatVerification = $requeteVerification->get_result()->fetch_assoc();

if ($resultatVerification && $resultatVerification['email_formulaire'] === $email) {
    // L'e-mail correspond à celui enregistré dans la table `Formulaire`, effectuer l'insertion
    $requeteInsertion = $conn->prepare("UPDATE Formulaire SET nom_formulaire = ?, prenom_formulaire = ?, nom_jeune_fille_formulaire = ?, datenaissance_formulaire = ?, lieu_naissance_formulaire = ?, AdressePrincipal_formulaire = ?, ville_formulaire = ?, code_postal_formulaire = ?, telephone_formulaire = ?, mobile_formulaire = ? WHERE email_formulaire = ?");
$requeteInsertion->bind_param("sssssssssss", $nom, $prenom, $nomJeuneFille, $dateNaissance, $lieuNaissance, $adresse, $ville, $codePostal, $telephone, $mobile, $email);

    
    if (!$requeteInsertion) {
        die("Erreur lors de la préparation de la requête d'insertion: " . $conn->error);
    }

    
    if ($requeteInsertion->execute()) {
        if ($requeteInsertion->affected_rows > 0) {
            echo "Les données ont été enregistrées avec succès.";
        } else {
            echo "L'e-mail ne correspond pas à celui enregistré.";
        }
    } else {
        echo "Erreur lors de l'enregistrement des données: " . $requeteInsertion->error;
    }
} else {
    echo "L'e-mail ne correspond pas à celui enregistré.";
}

$conn->close();
?>
