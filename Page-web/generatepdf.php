<?php
require('fpdf/fpdf.php'); // Inclure la bibliothèque FPDF

// Récupérer les valeurs des champs du formulaire
$nom = $_POST['nom_candidat'];
$prenom = $_POST['prenom_candidat'];
$email_formulaire = $_POST['email_formulaire'];
$genre_candidat = $_POST['genre_candidat'];
$datenaissance_formulaire = $_POST['datenaissance_formulaire'];
$seriebac_formulaire = $_POST['seriebac_formulaire'];
$anneebac_formulaire = $_POST['anneebac_formulaire'];
$intituleannee1_formulaire = $_POST['intituleannee1_formulaire'];
$intituleannee2_formulaire = $_POST['intituleannee2_formulaire'];
$autreformation_formulaire = $_POST['autreformation_formulaire'];
$stage_formulaire =  $_POST['stage_formulaire'];
$contrat_formulaire = $_POST['contrat_formulaire'];
$AdressePrincipal_formulaire = $_POST['AdressePrincipal_formulaire'].


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
$pdf->Cell(0, 10, 'Adresse email : ' . $email, 0, 1);
$pdf->Cell(0, 10, 'Nom de jeune fille : ' . $nom_jeune_fille, 0, 1);
$pdf->Cell(0, 10, utf8_decode('Né(e) le : '. $date_naissance), 0, 1);

// Enregistrer le PDF dans un fichier
$pdf->Output('formulaire.pdf', 'F');

// Redirection vers le fichier PDF généré
header('Location: formulaire.pdf');
exit();
?>
