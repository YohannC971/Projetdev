<?php

include("../config.php");

// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}



$conn = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupérer le login de l'utilisateur en session
$login = $_SESSION['login'];


// Requête SELECT pour récupérer l'ID de l'utilisateur
$sql_select = "SELECT id_utilisateur FROM Utilisateur WHERE login_utilisateur='$login'";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_utilisateur = $row['id_utilisateur'];


    //informations du candidat
    //informations du candidat
    $req_nomjeunefille = "SELECT nom_candidat, prenom_candidat, nom_jeune_fille_candidat FROM Candidat WHERE id_utilisateur=$id_utilisateur";
    $result2 = $conn->query($req_nomjeunefille);
    if($result2->num_rows>0){
        $row = $result2->fetch_assoc();
        $nom_candidat = $row['nom_candidat']; 
        $prenom_candidat = $row['prenom_candidat']; 
        $nom_jeune_fille = $row['nom_jeune_fille_candidat']; 

    }

    //
    $req_form = "SELECT datenaissance_formulaire,
    lieu_naissance_formulaire,
    AdressePrincipal_formulaire,
    ville,
    codepostal,
    telephone,
    mobile,
    nom_parent1,
    prennom_parent1,
    numero_parent1,
    nom_parent2,
    prennom_parent2,
    numero_parent2,
    nom_responsable_legale,
    prenom_responsable_legale,
    numero_responsable_legale,
    seriebac_formulaire,
    mentionbac_formulaire,
    lieubac_formulaire,
    anneebac_formulaire,
    intituleannee1_formulaire,
    anneeobtention1_formulaire,
    lieuobtention1_formulaire,
    moyenneannee1_formulaire,
    intituleannee2_formulaire,
    anneeobtention2_formulaire,
    lieuobtention2_formulaire,
    moyenneannee2_formulaire,
    autre_diplome_obtenu_formulaire,
    annee_autres_diplome_formulaire,
    moyenne_autres_diplome_formulaire,
    lieu_autre_diplome_formulaire,
    etablissement_autre_diplome_formulaire,
    choix_candidate_a_autres_formations_formulaire,
    input_autres_formation_formulaire,
    stagesEntreprise_formulaire,
    input_quelle_entreprise_formulaire,
    theme_entreprise_formulaire,
    choix_contacts_entreprise_formulaire,
    input_contacts_entreprise_formulaire
    FROM Formulaire WHERE candidat_idcandidat_candidat=(SELECT idcandidat_candidat FROM Candidat WHERE id_utilisateur=$id_utilisateur)";
    $resform = $conn->query($req_form);
    if($resform->num_rows>0){
        $row = $resform->fetch_assoc();
        
        $datenaissance_formulaire = $row['datenaissance_formulaire'];
        $lieu_naissance = $row['lieu_naissance_formulaire'];
        $adressePrincipal = $row['AdressePrincipal_formulaire'];
        $ville = $row['ville'];
        $codepostal = $row['codepostal'];
        $telephone = $row['telephone'];
        $mobile = $row['mobile'];
        //responsable legal
        $nomparent1 = $row['nom_parent1'];
        $prenomparent1 = $row['prennom_parent1'];
        $numeroparent1 = $row['numero_parent1'];
        $nomparent2 = $row['nom_parent2'];
        $prenomparent2 = $row['prennom_parent2'];
        $numeroparent2 = $row['numero_parent2'];
        $nomresponsablelegal = $row['nom_responsable_legale'];
        $prenomresponsablelegal = $row['prenom_responsable_legale'];
        $numeroresponsablelegal = $row['numero_responsable_legale'];
        //Baccalauréat
        $seriebac = $row['seriebac_formulaire'];
        $mentionbac = $row['mentionbac_formulaire'];
        $lieubac = $row['lieubac_formulaire'];
        $anneebac = $row['anneebac_formulaire'];
        //Ier CYCLE
        $intituleannee1 = $row['intituleannee1_formulaire'];
        $anneeobtention1 = $row['anneeobtention1_formulaire'];
        $lieuobtention1 = $row['lieuobtention1_formulaire'];
        $moyenneannee1 = $row['moyenneannee1_formulaire'];
        $intituleannee2 = $row['intituleannee2_formulaire'];
        $anneeobtention2 = $row['anneeobtention2_formulaire'];
        $lieuobtention2 = $row['lieuobtention2_formulaire'];
        $moyenneannee2 = $row['moyenneannee2_formulaire'];
        //Autre(s) diplôme(s) obtenue(s)
        $autre_diplome_obtenu = $row['autre_diplome_obtenu_formulaire'];
        $annee_autres_diplome = $row['annee_autres_diplome_formulaire'];
        $moyenne_autres_diplome = $row['moyenne_autres_diplome_formulaire'];
        $lieu_autre_diplome = $row['lieu_autre_diplome_formulaire'];
        $etablissement_autre_diplome = $row['etablissement_autre_diplome_formulaire'];
        //Vie professionnelle
        $choix_candidate_autres_formations = $row['choix_candidate_a_autres_formations_formulaire'];
        $input_autres_formation = $row['input_autres_formation_formulaire'];
        $stagesEntreprise = $row['stagesEntreprise_formulaire'];
        $input_quelle_entreprise = $row['input_quelle_entreprise_formulaire'];
        $theme_entreprise = $row['theme_entreprise_formulaire'];
        $choix_contacts_entreprise = $row['choix_contacts_entreprise_formulaire'];
        $input_contacts_entreprise = $row['input_contacts_entreprise_formulaire'];        
        //$genre_candidat = $row['genre_candidat'];         
    }

}

require('../fpdf/fpdf.php'); // Inclure la bibliothèque FPDF


// Créer un nouveau document PDF
$pdf = new FPDF();
$pdf->AddPage();


$pdf->SetFont('Arial', 'B', 13);

// Logo miage
$logo_miage ='../logo/logo-miage.png';
$pdf-> Image($logo_miage, 30, 10, 30);

// Logo université
$logo_universite ='../logo/logo-universite.jpg';
$pdf-> Image($logo_universite, 70, 8, 30);

// Logo GRETA
$logo_greta ='../logo/logo-greta.png';
$pdf-> Image($logo_greta, 110, 8, 80);


// Ajouteun trait de séparation
$lineY = $pdf->GetY() + 30; // Coordonnée Y de la ligne
$lineXStart = 10; // Coordonnée X de début de la ligne
$lineXEnd = $pdf->GetPageWidth() - 10; // Coordonnée X de fin de la ligne
$lineWidth = 0.5; // Largeur de la ligne en millimètres
$pdf->SetLineWidth($lineWidth);
$pdf->Line($lineXStart, $lineY, $lineXEnd, $lineY);

$pdf->Ln(30); // Ajoute un saut de ligne de 10 unités 


$pdf->Cell(0, 10, utf8_decode('Récapitulatif inscription en M1'), 0, 1, 'C');

$pdf->SetFont('Arial', 'I', 12); // définit la police en italique
//$pdf->Cell(0, 10, utf8_decode('Cher(e) :  ' . $nom . ' ' . $prenom), 0, 1,'C');
$pdf->Cell(0, 10, utf8_decode('Nous sommes ravis de vous confirmer votre inscription via notre plateforme en ligne.'), 0, 1,'C');
$pdf->Cell(0, 1, utf8_decode('Veuillez trouver ci-dessous un récapitulatif de votre inscription :'), 0, 1,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 13); // réinitialise la police à la valeur par défaut

$pdf->Cell(0, 10, 'Nom : ' . $nom_candidat, 0, 1);
$pdf->Cell(0, 10, utf8_decode('Prénom : '. $prenom_candidat), 0, 1);

$pdf->Ln(10);

$pdf->Cell(0, 10, 'Nom de jeune fille : ' . $nom_jeune_fille, 0, 1);
$pdf->Cell(0, 10, utf8_decode('Né(e) le : '.  $datenaissance_formulaire), 0, 1);
$pdf->Cell(0, 10, utf8_decode('à : '. $lieu_naissance), 0, 1);
$pdf->Cell(0, 10, 'Adresse : '. $adressePrincipal, 0, 1);
$pdf->Cell(0, 10, 'Ville : '. $ville, 0, 1);
$pdf->Cell(0, 10, 'Code postal : '. $codepostal, 0, 1);
$pdf->Cell(0, 10, utf8_decode('Téléphone : '. $telephone), 0, 1);
$pdf->Cell(0, 10, 'Mobile : '. $mobile, 0, 1);

$pdf->Ln(10);

$pdf->Cell(0, 10, 'Nom du parent 1 : '. $nomparent1, 0, 1);
$pdf->Cell(0, 10, utf8_decode('Prénom du parent 1 : '. $prenomparent1), 0, 1);
$pdf->Cell(0, 10, utf8_decode('Numéro du parent 1 : '. $numeroparent1), 0, 1);
$pdf->Cell(0, 10, 'Nom du parent 2 : '. $nomparent2, 0, 1);
$pdf->Cell(0, 10, utf8_decode('Prénom du parent 1 : '. $prenomparent2), 0, 1);
$pdf->Cell(0, 10, utf8_decode('Numéro du parent 1 : '. $numeroparent2), 0, 1);
$pdf->Cell(0, 10, 'Nom du responsable legal : '. $nomresponsablelegal, 0, 1);
$pdf->Cell(0, 10, utf8_decode('Prénom du responsable legal : '. $prenomresponsablelegal), 0, 1);
$pdf->Cell(0, 10, utf8_decode('Numéro du responsable : '. $numeroresponsablelegal), 0, 1);

$pdf->Ln(10);

$pdf->Cell(0, 10, utf8_decode('Série : '. $seriebac), 0, 1);
$pdf->Cell(0, 10, 'Mention : '. $mentionbac, 0, 1);
$pdf->Cell(0, 10, "Lieu d'obtention : ". $lieubac, 0, 1);
$pdf->Cell(0, 10, utf8_decode("Année d'obtention : ". $anneebac), 0, 1);

$pdf->Ln(10);

$pdf->Cell(0, 10, utf8_decode("Intitule année 1 : ". $intituleannee1), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Année d'obtention 1 : ". $anneeobtention1), 0, 1);
$pdf->Cell(0, 10, "Lieu d'obtention 1 : ". $lieuobtention1, 0, 1);
$pdf->Cell(0, 10, "Moyenne 1 : ". $moyenneannee1, 0, 1);
$pdf->Cell(0, 10, utf8_decode("Intitule année 2 : ". $intituleannee2), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Année d'obtention 2 : ". $anneeobtention2), 0, 1);
$pdf->Cell(0, 10, "Lieu d'obtention 2 : ". $lieuobtention2, 0, 1);
$pdf->Cell(0, 10, "Moyenne 2 : ". $moyenneannee2, 0, 1);

$pdf->Ln(10);

$pdf->Cell(0, 10, "Autre diplome obtenue : ". $autre_diplome_obtenu, 0, 1);
$pdf->Cell(0, 10, utf8_decode("Annnée d'obtention autre diplôme : ". $annee_autres_diplome), 0, 1);
$pdf->Cell(0, 10, "Moyenne autre diplome : ". $moyenne_autres_diplome, 0, 1);
$pdf->Cell(0, 10, "lieu d'obtention autre diplome : ". $lieu_autre_diplome, 0, 1);
$pdf->Cell(0, 10, utf8_decode("Etablissement d'obtention d'autre diplôme : ". $etablissement_autre_diplome), 0, 1);

$pdf->Ln(10);

$pdf->Cell(0, 10, utf8_decode("Avez vous candidaté à d’autres formations ? : ". $choix_candidate_autres_formations), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Lesquelles : ". $input_autres_formation), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Avez vous effectué des stages en entreprise ? : ". $stagesEntreprise), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Lesquelles : ". $input_autres_formation), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Avez vous effectué des stages en entreprise? : ". $stagesEntreprise), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Si oui, quelle(s) entreprise(s) : ". $input_quelle_entreprise), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Sur quel(s) thème(s) : ". $theme_entreprise), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Avez vous déjà des contacts en entreprise? : ". $choix_contacts_entreprise), 0, 1);
$pdf->Cell(0, 10, utf8_decode("Si oui, quels sont vos contacts: ". $input_contacts_entreprise), 0, 1);

// Enregistrer le PDF dans un fichier
$pdf->Output('recapm1.pdf', 'F');

// Redirection vers le fichier PDF généré
header('Location: recapm1.pdf');
exit();
?>