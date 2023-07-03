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
                        <a href="index.php" class="btn btn-primary btn-lg active">Connexion</a><br>
                        <button  type="button" class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#exampleModalCenter">Inscription</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="shortcut icon" type="image/png" href="./logo/faviconmiage.png"/>
  <title>Clé d'inscription</title>
  <style>
    .modal-lg {
      max-width: 800px !important;
    }

    .input-lg {
      width: 100% !important;
      padding: .5rem 1rem !important;
      font-size: 1.25rem !important;
      line-height: 1.5 !important;
      border-radius: .3rem !important;
    }

  </style>
</head>
<body>
  
  <!-- Modal -->
  <form action="controleur-cle-inscription.php" method="POST">
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Clé d'inscription</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <span style="font-size: 22px;">Veuillez entrer la clé d'inscription pour pouvoir avoir accès à la page d'inscription.</span><br><br>
          <input type="password" id="cle_inscription" placeholder="Clé d'inscription" name="cle_inscription" class="form-control input-lg"/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Ok</button>
        </div>
      </div>
    </div>
  </div>
</form>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
