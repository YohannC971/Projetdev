<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['login'])) {
    // Rediriger vers la page de connexion ou afficher un message d'erreur
    header('Location: ../index.php');
    exit();
}


// Récupérer le login de l'utilisateur depuis la session
$login = $_SESSION['login'];

// Effectuer la connexion à la base de données (à adapter selon votre configuration)
include("../config.php");

$conn = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);

// Vérifier si la connexion a échoué
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Préparer la requête SQL avec un paramètre pour éviter les injections SQL
$sql = "SELECT c.nom_candidat, c.prenom_candidat
        FROM utilisateur AS u
        INNER JOIN candidat AS c ON u.id_utilisateur = c.id_utilisateur
        INNER JOIN formulaire AS f ON c.idcandidat_candidat = f.candidat_idcandidat_candidat
        WHERE u.login_utilisateur = ?";

// Préparer la déclaration
$stmt = $conn->prepare($sql);

// Vérifier si la préparation a échoué
if (!$stmt) {
    die("Erreur de préparation de la requête : " . $conn->error);
}

// Binder le paramètre à la valeur du login
$stmt->bind_param("s", $login);

// Exécuter la requête
$stmt->execute();

// Récupérer les résultats de la requête
$stmt->bind_result($nomCandidat, $prenomCandidat);

// Récupérer le premier et unique résultat
$stmt->fetch();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/style.css" />
    <title>Questionnaire</title>
    <style>
        #signatureCanvas {
            border: 1px solid #1100ff;
        }
    </style>
</head>
<body>
    <!--Main Navigation-->
    <!--Fonctions-->
    <script>
        function duplicateFields() {
            var container = document.getElementById('diploma_container');
            var fields = container.getElementsByClassName('diploma_fields');
            var lastField = fields[fields.length - 1];
            var newField = lastField.cloneNode(true);
            container.appendChild(newField);
        }
    </script>
<header>
  <!-- Sidebar -->
  <nav
         id="sidebarMenu"
         class="collapse d-lg-block sidebar collapse bg-white"
         >
         <div style="margin-top: 50px;"></div>
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          <a
             href="../accueil.html"
             class="list-group-item list-group-item-action py-2 ripple"
             aria-current="true"
             >
              <i class="fas fa-home fa-fw me-3"></i><span>Accueil</span>
          </a>
          <a
             href="../fillieremiage.html"
             class="list-group-item list-group-item-action py-2 ripple"
             >
            <i class="fas fa-globe-americas fa-fw me-3"></i
              ><span>Filière Miage</span>
          </a>
          <a
             href="../licence.html"
             class="list-group-item list-group-item-action py-2 ripple"
             ><i class="fas fa-graduation-cap fa-fw me-3"></i><span>Licence</span></a
            >
          <a
             href="../master.html"
             class="list-group-item list-group-item-action py-2 ripple"
             ><i class="fas fa-graduation-cap fa-fw me-3"></i
            ><span>Master</span></a
            >
            <div class="list-group-item list-group-item-action py-2 ripple active">
                <i class="fas fa-pen fa-fw me-3"></i>
                <span>Candidater</span>
                <select class="form-select" onchange="location = this.value;">
                  <option selected disabled hidden>Sélectionnez une page</option>
                  <option value="candidaterl3.php">Licence 3</option>
                  <option value="page2.html">Master 1</option>
                  <option value="page3.html">Master 2</option>
                </select>
              </div>
          <a
             href="../apprentissage.html"
             class="list-group-item list-group-item-action py-2 ripple"
             ><i class="fas fa-book-open fa-fw me-3"></i><span>Apprentissage</span></a
            >
          <a
             href="../Partenaires.html"
             class="list-group-item list-group-item-action py-2 ripple"
             ><i class="fas fa-handshake fa-fw me-3"></i
            ><span>Partenaires</span></a
            >
          <a
             href="../contacts.html"
             class="list-group-item list-group-item-action py-2 ripple "
             ><i class="fas fa-address-book fa-fw me-3"></i
            ><span>Contacts</span></a
            >
          
          <a
             href="../mon-profil.php"
             class="list-group-item list-group-item-action py-2 ripple"
             ><i class="fas fa-user fa-fw me-3"></i><span>Mon profil</span></a
            >
            <a
             href="../controleur_deco.php"
             class="list-group-item list-group-item-action py-2 ripple"
             ><i class="fas fa-sign-out-alt fa-fw me-3"></i><span>Déconnexion</span></a
            >
        </div>
      </div>
    </nav>
  <!-- Sidebar -->

  <!-- Navbar -->
  <nav
       id="main-navbar"
       class="navbar navbar-expand-lg navbar-light bg-white fixed-top"
       >
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
              class="navbar-toggler"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#sidebarMenu"
              aria-controls="sidebarMenu"
              aria-expanded="false"
              aria-label="Toggle navigation"
              >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Brand -->
      <a class="navbar-brand" href="#">
       
        <img
             src="http://miage-antilles.fr/wp-content/uploads/2015/04/logo-300x245.png"
             style="margin-right: 20px;"
             height="80"
             alt=""
             loading="lazy"
             />
        <img
            src="http://miage-antilles.fr/wp-content/uploads/2014/09/UA_logoCMJN_Corporate.jpg"
            style="margin-right: 20px;"
            height="80"
            alt=""
            loading="lazy"
        >
        <img
            src="http://miage-antilles.fr/wp-content/uploads/2021/11/GRETA-CFA-Gpe-Ptt.png"
            style="margin-right: 20px;"
            height="80"
            alt=""
            loading="lazy"
        >
      </a>


      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row">
      </ul>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px">
  <div class="container pt-4" style="border-color: black; border-radius: 10px;">

    <div class="d-flex flex-column mb-3">
      <div class="p-2" style="background-color: rgb(79, 79, 255);"><h1>Candidature à la L3 MIAGE</h1></div>
      <div class="d-flex" style="border: 2px solid black;">
        <div class="d-flex align-items-start flex-column mb-3" >
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="candidaterl3.php">Information du candidat</a> </h5></div>
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="responsable_legal.php">Responsable Legal</a> </h5></div>
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="bacform.html">Baccalauréat</a> </h5></div>
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="1ercycle.html">Ier CYCLE</a> </h5></div>
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="diplome.html">Autre(s) diplôme(s) obtenue(s)</a> </h5></div>
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="viepro.html">Vie professionnelle</a> </h5></div>
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="questionnaire.php">Questionnaire</a> </h5></div>
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="recap.html">Recapitulatif</a> </h5></div>           
          </div>

        <form action=" genererpdfquestionnaire.php" method="post" target="_blank" enctype="multipart/form-data">
          <div class="d-flex flex-column mb-3" class="d-flex flex-column mb-3" style="border-right: 2px solid black; border-bottom: 2px solid black;border-left: 2px solid black;">
            <b>
            <div class="p-2" style="border-right: 2px solid black;border-bottom: 2px solid black; background-color: #d9d9d9; width: 350px;"><h3>Questionnaire</h3></div>
              
        <label style = "margin-left: 10px; margin-top: 20px; margin-bottom: 20px" for="nom">Nom :</label>
        <input style = "margin-left: 10px" type="text" id="nom" name="nom" value="<?php echo $nomCandidat; ?>" readonly>

        <label style = "margin-left: 10px" for="prenom">Prénom :</label>
        <input style = "margin-left: 10px" type="text" id="prenom" name="prenom" value="<?php echo $prenomCandidat; ?>" readonly>

        <label style = "margin-left: 10px" for="loisir">Quand vous disposez d’un moment de loisir, comment l'occupez-vous ?</label><br>
        <textarea style = "margin-left: 10px" id="loisir" name="loisir" rows="4" cols="50" required></textarea><br><br>

        <label for="autres_activites" style = "margin-left: 10px" >Dans quelle(s) autre(s) activité(s) aimeriez-vous vous investir ?</label><br>
        <textarea style = "margin-left: 10px" id="autres_activites" name="autres_activites" rows="4" cols="50" required></textarea><br><br>

        <label style = "margin-left: 10px" for="activites_encadrement">Avez-vous pratiqué des activités d’encadrement dans le contexte précédent ou d’autres ? Si oui, lesquelles ?</label><br>
        <textarea style = "margin-left: 10px" id="activites_encadrement" name="activites_encadrement" rows="4" cols="50" required></textarea><br><br>

        <label style = "margin-left: 10px" for="attentes_miage">Qu’attendez-vous de la MIAGE ?</label><br>
        <textarea style = "margin-left: 10px" id="attentes_miage" name="attentes_miage" rows="4" cols="50" required></textarea><br><br>

        <label style = "margin-left: 10px" for="pourquoi_miage">Pourquoi la MIAGE des ANTILLES ?</label><br>
        <textarea style = "margin-left: 10px" id="pourquoi_miage" name="pourquoi_miage" rows="4" cols="50" required></textarea><br><br>

        <label for="influence_choix" style = "margin-left: 10px">L’exemple d’une personne de votre entourage a-t-il pesé sur votre choix ? Si oui dans quelle mesure ?</label><br>
        <textarea  id="influence_choix" name="influence_choix" style = "margin-left: 10px" rows="4" cols="50" required></textarea><br><br>

        <label style = "margin-left: 10px" for="metiers">Citez au moins 3 métiers que vous pourriez exercer dès l’obtention de la Licence MIAGE (Classez-les par ordre de préférence)</label><br>
        <textarea style = "margin-left: 10px" id="metiers" name="metiers" rows="4" cols="50" required></textarea><br><br>

        <label style = "margin-left: 10px" for="aptitudes">A votre avis, quelles aptitudes personnelles faut-il développer pour exercer ces métiers ?</label><br>
        <textarea style = "margin-left: 10px" id="aptitudes" name="aptitudes" rows="4" cols="50" required></textarea><br><br>

        <label style = "margin-left: 10px" for="apprehensions">Y aura-t-il dans ce type de professions des aspects que vous appréhendez ? Si oui, pourquoi ?</label><br>
        <textarea style = "margin-left: 10px" id="apprehensions" name="apprehensions" rows="4" cols="50" required></textarea><br><br>

        <label style = "margin-left: 10px" for="decouvertes">Avez-vous eu l’occasion de découvrir des secteurs d’activités et des métiers cibles de la MIAGE par des visites ou des stages en entreprises ?</label><br>
        <textarea style = "margin-left: 10px" id="decouvertes" name="decouvertes" rows="4" cols="50" required></textarea><br><br>

        <label style = "margin-left: 10px" for="secteurs">Dans quel(s) secteur(s) d’activités aimeriez-vous travailler ou ne pas travailler ?</label><br>
        <textarea style = "margin-left: 10px" id="secteurs" name="secteurs" rows="4" cols="50" required></textarea><br><br>

        <label style = "margin-left: 10px" for="autres_questions">Vous pouvez maintenant évoquer tout sujet ou toute question qui vous tient à cœur. (Ne négligez pas ce paragraphe)</label><br>
        <textarea style = "margin-left: 10px" id="autres_questions" name="autres_questions" rows="4" cols="50" required></textarea><br><br>

        <label style = "margin-left: 10px" for="date">Date :</label>
	<input type="date" style = "margin-left: 10px" id="date" name="date" required><br><br>

	<h3 style = "margin-left: 10px">Signature :</h3>
        <canvas id="signatureCanvas" width="400" height="200"></canvas><br><br>

        <input  type="button" style = "margin-left: 10px" value="Effacer" onclick="clearSignature()">
        <input  type="hidden" id="signatureData" name="signatureData">

        <br><br>
        <button class="btn btn-primary btn-sm mb-3" type="submit" style="background-color: rgb(52 , 201 , 36); margin-left: 10px;" 
            id="" onclick="">Enregistrer</button>
    </form>

    <script>
        function suivant() {
        window.location.href = "recap.html"; // Remplacez l'URL par celle de la page suivante
        };

        //zone de dessin signature
        var canvas = document.getElementById("signatureCanvas");
        var ctx = canvas.getContext("2d");
        var isDrawing = false;
        var signatureDataInput = document.getElementById("signatureData");

        canvas.addEventListener("mousedown", startDrawing);
        canvas.addEventListener("mousemove", draw);
        canvas.addEventListener("mouseup", stopDrawing);
        canvas.addEventListener("mouseout", stopDrawing);

        function startDrawing(e) {
            isDrawing = true;
            ctx.beginPath();
            ctx.moveTo(e.pageX - canvas.offsetLeft, e.pageY - canvas.offsetTop);
        }

        function draw(e) {
            if (!isDrawing) return;
            ctx.lineTo(e.pageX - canvas.offsetLeft, e.pageY - canvas.offsetTop);
            ctx.stroke();
        }

        function stopDrawing() {
            isDrawing = false;
            saveSignature();
        }

        function saveSignature() {
            var dataURL = canvas.toDataURL();
            signatureDataInput.value = dataURL;
        }

        function clearSignature() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            signatureDataInput.value = "";
        }

        document.querySelector('form').addEventListener('submit', function(event) {
            var signatureData = canvas.toDataURL(); // Récupérer les données du canvas au format base64
            signatureDataInput.value = canvasData; // Stocker les données du canvas dans le champ de formulaire caché
        });
    
    </script>
</body>
</html>
