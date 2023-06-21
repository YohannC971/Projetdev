<?php
if (!isset($_SESSION)) {
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
    <style>
        body {
            background-color: #fbfbfb;
        }

        .img {
            background-image: url("https://outremers360.com/wp-media/uploads/2020/08/Pole-UniversitaireGuadeloupe--1024x768.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .B {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .C {
            width: 350px;
            height: 350px;
            background-color: white;
            margin: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex: 1;
        }

        .Align {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="text-center" style="margin-bottom: 20px;">
        <img src="http://miage-antilles.fr/wp-content/uploads/2015/04/logo.png" style="width: 150px;" alt="logo">
        <img src="http://miage-antilles.fr/wp-content/uploads/2021/11/GRETA-CFA-Gpe-Ptt.png" style="width: 300px;" alt="logo">
    </div>

    <div class="img">
    </div>
    <div class="Align">
        <h4>Qui êtes-vous ?</h4>
    </div>

        <div class="B">
            <div class="C">
                <h2>Etudiant</h2>
                <a href="index.php" class="btn btn-secondary btn-lg active">Link</a>
            </div>
            <div class="C">
                <h2>Professeur</h2>
                <button type="button" class="btn btn-primary">connexion</button>
            </div>
        </div>
    

    <div>
    <a href="index.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Link</a>
      </div>

</body>

</html>