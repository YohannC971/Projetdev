<?php

// Récupération des données d'inscription
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$Pass = $_POST['Pass'];
$email = $_POST['email'];

// Contenu de l'email
$destinataire = $email;
$sujet = 'Confirmation d\'inscription';
$message = 'Bonjour ' . $nom . $prenom .',<br><br>';
$message .= 'Merci de vous être inscrit ! Voici les informations de votre compte :<br>';
$message .= '- Nom d\'utilisateur : ' . $nom . '<br>';
$message .= '- Mot de passe : ' . $Pass . '<br><br>';
$message .= 'Cordialement,<br>L\'équipe d\'inscription';

// En-têtes de l'email
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$headers .= 'From: noreply@example.com' . "\r\n";

// Envoi de l'email
if(mail($destinataire, $sujet, $message, $headers)) {
    echo 'Email envoyé avec succès !';
} else {
    echo 'Une erreur est survenue lors de l\'envoi de l\'email.';
}
