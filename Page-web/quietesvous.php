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
            /*font-family: Arial, Helvetica, sans-serif;*/
        }

        B {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 30px; 
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
            border-radius: 30px; 
        }

        /* Style pour décaler le contenu */
        .offset-content {
            margin-top: 100px; /* Ajustez cette valeur selon vos besoins */
            padding-top: 35px; /* Ajout du padding pour éviter le chevauchement */
            position: relative;
            z-index: 1; /* Positionne le contenu au-dessus de l'image de fond */
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <!-- Container wrapper -->
        <div class="container-fluid d-flex justify-content-center align-items-center">
            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="http://miage-antilles.fr/wp-content/uploads/2015/04/logo-300x245.png" style="margin-right: 20px;" height="80" alt="" loading="lazy" />
                <img src="http://miage-antilles.fr/wp-content/uploads/2014/09/UA_logoCMJN_Corporate.jpg" style="margin-right: 20px;" height="80" alt="" loading="lazy">
                <img src="http://miage-antilles.fr/wp-content/uploads/2021/11/GRETA-CFA-Gpe-Ptt.png" style="margin-right: 20px;" height="80" alt="" loading="lazy">
            </a>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <div class="img"></div>
    <div class="offset-content">
        <div class="Align">
            <h4>Nous vous souhaitons la bienvenue !</h4>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
