<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Qui êtes-vous ?</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="./favicon/faviconmiage.png" />
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

        .Align {
            text-align: center;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
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
    </style>
</head>

<body>
    <div class="container text-center" style="margin-bottom: 20px;">
        <img src="http://miage-antilles.fr/wp-content/uploads/2015/04/logo.png" style="max-width: 150px;" alt="logo">
        <img src="http://miage-antilles.fr/wp-content/uploads/2021/11/GRETA-CFA-Gpe-Ptt.png" style="max-width: 300px;" alt="logo">
    </div>

    <div class="img"></div>
    <div class="Align">
        <h4>Bienvenue...</h4>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="C">
                    <h2>Etudiant</h2>
                    <a href="index.php" class="btn btn-primary btn-lg active">Connexion</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="C">
                    <h2>Professeur</h2>
                    <a href="index.php" class="btn btn-primary btn-lg active">Connexion</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
