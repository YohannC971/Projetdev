<?php
header('Content-Type: text/html; charset=utf-8');
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
$apprehensions = $_POST['apprehensions'];
$decouvertes = $_POST['decouvertes'];
$secteurs = $_POST['secteurs'];
$autres_questions = $_POST['autres_questions'];
$date = $_POST['date'];
$signatureData = $_POST['signatureData'];

// Récupérer les données du canvas
if (isset($_POST['signatureData'])) {
    $signatureData = $_POST['signatureData'];
    $imagePath = 'images/canvas.png';
    file_put_contents($imagePath, base64_decode(explode(',', $signatureData)[1]));
}

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

$pdf->Ln(30); // Ajoute un saut de ligne de 30 unités

$pdf->Cell(0, 10, utf8_decode('Récapitulatif questionnaire'), 0, 1, 'C');

$pdf->SetFont('Arial', '', 13); // réinitialise la police à la valeur par défaut
$pdf->Cell(0, 10, 'Nom : ' . $nom, 0, 1);
$pdf->Cell(0, 10, utf8_decode('Prénom : ' . $prenom), 0, 1);
$pdf->Cell(0, 10, 'Loisir : ' . $loisir, 0, 1);
$pdf->MultiCell(0, 10, utf8_decode('Autres activités : '), 0, 'L');
$pdf->SetX($pdf->GetX() + 10); // Décaler le texte des réponses vers la droite
$pdf->SetFont('Arial', '', 13); // Réinitialiser la police pour les réponses
$pdf->MultiCell(0, 10, $autres_activites, 0, 'L');
$pdf->SetFont('Arial', 'B', 13); // Appliquer le style en gras aux questions
$pdf->Cell(0, 10, utf8_decode('Activités d\'encadrement : '), 0, 1);
$pdf->SetFont('Arial', '', 13); // Réinitialiser la police pour les réponses
$pdf->SetX($pdf->GetX() + 10); // Décaler le texte des réponses vers la droite
$pdf->MultiCell(0, 10, $activites_encadrement, 0, 'L');
$pdf->SetFont('Arial', 'B', 13); // Appliquer le style en gras aux questions
$pdf->Cell(0, 10, 'Attentes MIAGE : ', 0, 1);
$pdf->SetFont('Arial', '', 13); // Réinitialiser la police pour les réponses
$pdf->SetX($pdf->GetX() + 10); // Décaler le texte des réponses vers la droite
$pdf->MultiCell(0, 10, $attentes_miage, 0, 'L');
$pdf->SetFont('Arial', 'B', 13); // Appliquer le style en gras aux questions
$pdf->Cell(0, 10, 'Pourquoi MIAGE : ', 0, 1);
$pdf->SetFont('Arial', '', 13); // Réinitialiser la police pour les réponses
$pdf->SetX($pdf->GetX() + 10); // Décaler le texte des réponses vers la droite
$pdf->MultiCell(0, 10, $pourquoi_miage, 0, 'L');
$pdf->SetFont('Arial', 'B', 13); // Appliquer le style en gras aux questions
$pdf->Cell(0, 10, 'Influence du choix : ', 0, 1);
$pdf->SetFont('Arial', '', 13); // Réinitialiser la police pour les réponses
$pdf->SetX($pdf->GetX() + 10); // Décaler le texte des réponses vers la droite
$pdf->MultiCell(0, 10, $influence_choix, 0, 'L');
$pdf->SetFont('Arial', 'B', 13); // Appliquer le style en gras aux questions
$pdf->Cell(0, 10, utf8_decode('Métiers : '), 0, 1);
$pdf->SetFont('Arial', '', 13); // Réinitialiser la police pour les réponses
$pdf->SetX($pdf->GetX() + 10); // Décaler le texte des réponses vers la droite
$pdf->MultiCell(0, 10, $metiers, 0, 'L');
$pdf->SetFont('Arial', 'B', 13); // Appliquer le style en gras aux questions
$pdf->Cell(0, 10, 'Aptitudes : ', 0, 1);
$pdf->SetFont('Arial', '', 13); // Réinitialiser la police pour les réponses
$pdf->SetX($pdf->GetX() + 10); // Décaler le texte des réponses vers la droite
$pdf->MultiCell(0, 10, $aptitudes, 0, 'L');
$pdf->SetFont('Arial', 'B', 13); // Appliquer le style en gras aux questions
$pdf->Cell(0, 10, utf8_decode('Appréhensions : '), 0, 1);
$pdf->SetFont('Arial', '', 13); // Réinitialiser la police pour les réponses
$pdf->SetX($pdf->GetX() + 10); // Décaler le texte des réponses vers la droite
$pdf->MultiCell(0, 10, $apprehensions, 0, 'L');
$pdf->SetFont('Arial', 'B', 13); // Appliquer le style en gras aux questions
$pdf->Cell(0, 10, utf8_decode('Découvertes : '), 0, 1);
$pdf->SetFont('Arial', '', 13); // Réinitialiser la police pour les réponses
$pdf->SetX($pdf->GetX() + 10); // Décaler le texte des réponses vers la droite
$pdf->MultiCell(0, 10, $decouvertes, 0, 'L');
$pdf->SetFont('Arial', 'B', 13); // Appliquer le style en gras aux questions
$pdf->Cell(0, 10, 'Secteurs : ', 0, 1);
$pdf->SetFont('Arial', '', 13); // Réinitialiser la police pour les réponses
$pdf->SetX($pdf->GetX() + 10); // Décaler le texte des réponses vers la droite
$pdf->MultiCell(0, 10, $secteurs, 0, 'L');
$pdf->SetFont('Arial', 'B', 13); // Appliquer le style en gras aux questions
$pdf->Cell(0, 10, 'Autres questions : ', 0, 1);
$pdf->SetFont('Arial', '', 13); // Réinitialiser la police pour les réponses
$pdf->SetX($pdf->GetX() + 10); // Décaler le texte des réponses vers la droite
$pdf->MultiCell(0, 10, $autres_questions, 0, 'L');
$pdf->SetFont('Arial', 'B', 13); // Appliquer le style en gras aux questions
$pdf->Cell(0, 10, 'Date : ', 0, 1);
$pdf->SetFont('Arial', '', 13); // Réinitialiser la police pour les réponses
$pdf->SetX($pdf->GetX() + 10); // Décaler le texte des réponses vers la droite
$pdf->MultiCell(0, 10, $date, 0, 'L');
$pdf->SetFont('Arial', 'B', 13); // Appliquer le style en gras aux questions

// Afficher l'image de la signature en dernier
$pdf->Cell(0, 10, 'Signature : ', 0, 1);
$pdf->Image($imagePath, 10, $pdf->GetY() + 10, 30, 30);

// Enregistrer le PDF dans un fichier
$pdf->Output('formulaire.pdf', 'F');

// Redirection vers le fichier PDF généré
header('Location: formulaire.pdf');
exit();
?>
