<?php
require('fpdf/fpdf.php'); // Inclure la bibliothèque FPDF

// Récupérer les valeurs des champs du formulaire
//information du candidat
$nom_jeune_fille = $_POST['nom_jeune_fille']; 
$datenaissance= $_POST['datenaissance'];
$datenaissance = $_POST['datenaissance'];
$lieu_naissance = $_POST['lieu_naissance'];
$adressePrincipal = $_POST['adressePrincipal'];
$ville = $_POST['ville'];
$codepostal = $_POST['codepostal'];
$telephone = $_POST['telephone'];
$mobile = $_POST['mobile'];
//responsable legal
$nomparent1 = $_POST['nomparent1'];
$prenomparent1 = $_POST['prenomparent1'];
$numeroparent1 = $_POST['numeroparent1'];
$nomparent2 = $_POST['nomparent2'];
$prenomparent2 = $_POST['prenomparent2'];
$numeroparent2 = $_POST['numeroparent2'];
$nomresponsablelegal = $_POST['nomresponsablelegal'];
$prenomresponsablelegal = $_POST['prenomresponsablelegal'];
$numeroresponsablelegal = $_POST['numeroresponsablelegal'];
//Baccalauréat
$seriebac = $_POST['seriebac'];
$mentionbac = $_POST['mentionbac'];
$lieubac = $_POST['lieubac'];
$anneebac = $_POST['anneebac'];
//Ier CYCLE
$intituleannee1 = $_POST['intituleannee1'];
$anneeobtention1 = $_POST['anneeobtention1'];
$lieuobtention1 = $_POST['lieuobtention1'];
$moyenneannee1 = $_POST['moyenneannee1'];
$intituleannee2 = $_POST['prenom_candidat'];
$anneeobtention2 = $_POST['anneeobtention2'];
$lieuobtention2 = $_POST['lieuobtention2'];
$moyenneannee2 = $_POST['moyenneannee2'];
//Autre(s) diplôme(s) obtenue(s)
$autre_diplome_obtenu = $_POST['autre_diplome_obtenu'];
$annee_autres_diplome = $_POST['annee_autres_diplome'];
$moyenne_autres_diplome = $_POST['moyenne_autres_diplome'];
$lieu_autre_diplome = $_POST['lieu_autre_diplome'];
$etablissement_autre_diplome = $_POST['etablissement_autre_diplome'];
//Vie professionnelle
$choix_candidate_autres_formations = $_POST['choix_candidate_autres_formations'];
$input_autres_formation = $_POST['input_autres_formation'];
$stagesEntreprise = $_POST['stagesEntreprise'];
$input_quelle_entreprise = $_POST['input_quelle_entreprise'];
$theme_entreprise = $_POST['theme_entreprise'];
//questionnaire
$nom = $_POST['nom']; 
$prenom = $_POST['prenom']; 
$genre_candidat = $_POST['genre_candidat'];


// Créer un nouveau document PDF
$pdf = new FPDF();
$pdf->AddPage();


$pdf->SetFont('Arial', 'B', 13);

// Logo miage
$logo_miage ='logo/logo-miage.png';
$pdf-> Image($logo_miage, 30, 10, 30);

// Logo université
$logo_universite ='logo/logo-universite.jpg';
$pdf-> Image($logo_universite, 70, 8, 30);

// Logo GRETA
$logo_greta ='logo/logo-greta.png';
$pdf-> Image($logo_greta, 110, 8, 80);


// Ajouter un trait de séparation
$lineY = $pdf->GetY() + 30; // Coordonnée Y de la ligne
$lineXStart = 10; // Coordonnée X de début de la ligne
$lineXEnd = $pdf->GetPageWidth() - 10; // Coordonnée X de fin de la ligne
$lineWidth = 0.5; // Largeur de la ligne en millimètres
$pdf->SetLineWidth($lineWidth);
$pdf->Line($lineXStart, $lineY, $lineXEnd, $lineY);

$pdf->Ln(30); // Ajoute un saut de ligne de 10 unités 


$pdf->Cell(0, 10, utf8_decode('Récapitulatif inscription'), 0, 1, 'C');

$pdf->SetFont('Arial', 'I', 12); // définit la police en italique
$pdf->Cell(0, 10, utf8_decode('Cher(e) :  ' . $nom . ' ' . $prenom), 0, 1,'C');
$pdf->Cell(0, 10, utf8_decode('Nous sommes ravis de vous confirmer votre inscription via notre plateforme en ligne.'), 0, 1,'C');
$pdf->Cell(0, 1, utf8_decode('Veuillez trouver ci-dessous un récapitulatif de votre inscription :'), 0, 1,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 13); // réinitialise la police à la valeur par défaut

$pdf->Cell(0, 10, 'Nom : ' . $nom, 0, 1);
$pdf->Cell(0, 10, utf8_decode('Prénom : '. $prenom), 0, 1);

$pdf->Ln(10);

$pdf->Cell(0, 10, 'Nom de jeune fille : ' . $nom_jeune_fille, 0, 1);
$pdf->Cell(0, 10, utf8_decode('Né(e) le : '. $date_naissance), 0, 1);
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





// Enregistrer le PDF dans un fichier
$pdf->Output('formulaire.pdf', 'F');

// Redirection vers le fichier PDF généré
header('Location: formulaire.pdf');
exit();
?>
