<?php
require('../fpdf/fpdf.php'); // Inclure la bibliothèque FPDF

// Récupérer les valeurs des champs du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$loisir = $_POST['loisir'];
$autres_activites = $_POST['autres_activites'];
$activites_encadrement = $_POST['activites_encadrement'];
$attentes_miage = $_POST['attentes_miage'];
$pourquoi_miage = $_POST['pourquoi_miage'];
$influence_choix = $_POST['influence_choix'];
$metiers = $_POST['metiers'];
$aptitudes = $_POST['aptitudes'];
$apprehensions =  $_POST['apprehensions'];
$decouvertes = $_POST['decouvertes'];
$secteurs = $_POST['secteurs'];
$autres_questions = $_POST['autres_questions'];
$date = $_POST['date'];
$signatureData = $_POST['signatureData'];

// Créer un nouveau document PDF
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 13);

// Logo miage
$logo_miage = '../logo/logo-miage.png';
$pdf->Image($logo_miage, 30, 10, 30);

// Logo université
$logo_universite = '../logo/logo-universite.jpg';
$pdf->Image($logo_universite, 70, 8, 30);

// Logo GRETA
$logo_greta = '../logo/logo-greta.png';
$pdf->Image($logo_greta, 110, 8, 80);

// Ajouter un trait de séparation
$lineY = $pdf->GetY() + 30; // Coordonnée Y de la ligne
$lineXStart = 10; // Coordonnée X de début de la ligne
$lineXEnd = $pdf->GetPageWidth() - 10; // Coordonnée X de fin de la ligne
$lineWidth = 0.5; // Largeur de la ligne en millimètres
$pdf->SetLineWidth($lineWidth);
$pdf->Line($lineXStart, $lineY, $lineXEnd, $lineY);

$pdf->Ln(30); // Ajoute un saut de ligne de 10 unités

$pdf->Cell(0, 10, utf8_decode('Récapitulatif questionnaire'), 0, 1, 'C');

$pdf->SetFont('Arial', '', 13); // réinitialise la police à la valeur par défaut

$pdf->Cell(0, 10, 'Nom : ' . $nom, 0, 1);
$pdf->Cell(0, 10, utf8_decode('Prénom : ' . $prenom), 0, 1);
$pdf->Cell(0, 10, 'Loisir : ' . $loisir, 0, 1);
$pdf->MultiCell(0, 10, utf8_decode('Autres activités : ') . $autres_activites, 0, 1);
$pdf->MultiCell(0, 10, utf8_decode('Activités d\'encadrement : ') . $activites_encadrement, 0, 1);
$pdf->Cell(0, 10, 'Attentes MIAGE : ' . $attentes_miage, 0, 1);
$pdf->Cell(0, 10, 'Pourquoi MIAGE : ' . $pourquoi_miage, 0, 1);
$pdf->Cell(0, 10, 'Influence du choix : ' . $influence_choix, 0, 1);
$pdf->MultiCell(0, 10, utf8_decode('Métiers : ') . $metiers, 0, 1);
$pdf->Cell(0, 10, 'Aptitudes : ' . $aptitudes, 0, 1);
$pdf->MultiCell(0, 10, utf8_decode('Appréhensions : ') . $apprehensions, 0, 1);
$pdf->MultiCell(0, 10, utf8_decode('Découvertes : ') . $decouvertes, 0, 1);
$pdf->Cell(0, 10, 'Secteurs : ' . $secteurs, 0, 1);
$pdf->Cell(0, 10, 'Autres questions : ' . $autres_questions, 0, 1);
$pdf->Cell(0, 10, 'Date : ' . $date, 0, 1);
$pdf->Image($signatureData, 10, 100, 30, 30);

// Enregistrer le PDF dans un fichier
$pdf->Output('formulaire.pdf', 'F');

// Redirection vers le fichier PDF généré
header('Location: formulaire.pdf');
exit();
?>
