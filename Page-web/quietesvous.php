<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire de connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" href="test.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>

  <div class="centre">
        <h4>Qui êtes-vous ?</h4>
    </div>
  <div class="container">
    <div class="square">
      <h2>Etudiant</h2>
      <button class="button"></button>
    </div>
    <div class="square">
      <h2>Professeur</h2>
      <button class="button"></button>
    </div>
  </div>
    
</body>
</html>
