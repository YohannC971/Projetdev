<?php

include("../config.php");

// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}



$conn = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupérer le login de l'utilisateur en session
$login = $_SESSION['login'];


// Requête SELECT pour récupérer l'ID de l'utilisateur
$sql_select = "SELECT id_utilisateur FROM Utilisateur WHERE login_utilisateur='$login'";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_utilisateur = $row['id_utilisateur'];

  
    $sql_select_formulaire = "SELECT choix_candidate_a_autres_formations_formulaire, input_autres_formation_formulaire, stagesEntreprise_formulaire, input_quelle_entreprise_formulaire,
    theme_entreprise_formulaire, choix_contacts_entreprise_formulaire, input_contacts_entreprise_formulaire FROM Formulaire 
    WHERE candidat_idcandidat_candidat=(SELECT idcandidat_candidat FROM Candidat WHERE id_utilisateur=$id_utilisateur)";

    $result2 = $conn->query($sql_select_formulaire);
    
    if ($result2 === FALSE) {
        echo "Erreur lors de la récupération des informations du formulaire : " . $conn->error;
        exit;
    }
    
    if ($result2->num_rows > 0) {
        // Récupérer la première ligne de résultat
        $row = $result2->fetch_assoc();
    
        // Accéder aux valeurs des colonnes du formulaire
        $choix_candidate_a_autres_formations_formulaire = $row["choix_candidate_a_autres_formations_formulaire"];
        $input_autres_formation_formulaire = $row["input_autres_formation_formulaire"];
        $stagesEntreprise_formulaire = $row["stagesEntreprise_formulaire"];
        $input_quelle_entreprise_formulaire = $row["input_quelle_entreprise_formulaire"];
        $theme_entreprise_formulaire = $row["theme_entreprise_formulaire"];
        $choix_contacts_entreprise_formulaire = $row["choix_contacts_entreprise_formulaire"];
        $input_contacts_entreprise_formulaire = $row["input_contacts_entreprise_formulaire"];
 
    }
  }
  $result->close();
  $result2->close();
  $conn->close();
  ?>

<!DOCTYPE html>
<html lang="fr">
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
    <link rel="shortcut icon" type="image/png" href="../logo/faviconmiage.png"/>


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
                  <option value="../master1/candidaterm1.php">Master 1</option>
                  
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
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="bacform.php">Baccalauréat</a> </h5></div>
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="1ercycle.php">Ier CYCLE</a> </h5></div>
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="diplome.php">Autre(s) diplôme(s) obtenue(s)</a> </h5></div>
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="viepro.php">Vie professionnelle</a> </h5></div>
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="piece_justificatif.php">Pièces justificatif</a> </h5></div>

            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="questionnaire.php">Questionnaire</a> </h5></div>
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="recap.html">Recapitulatif</a> </h5></div>           
          </div>

        <form action="controleur-viepro.php" method="post" enctype="multipart/form-data">
          <div class="d-flex flex-column mb-3" class="d-flex flex-column mb-3" style="border-right: 2px solid black; border-bottom: 2px solid black;border-left: 2px solid black;">
            <b>
            <div class="p-2" style="border-right: 2px solid black;border-bottom: 2px solid black; background-color: #d9d9d9; width: 350px;"><h3>Vie professionnelle</h3></div>
              <div class="d-flex justify-content-evenly" style="align-items: center;"> 
                <div class="p-2">
                  Avez vous candidaté à d’autres formations?             
                    <select id="choix_candidate_a_autres_formations" name="choix_candidate_a_autres_formations" onchange="afficherChamp_autres_formations()" value="<?php echo $choix_candidate_a_autres_formations_formulaire; ?>">
                      <option value="non">NON</option>
                      <option value="oui">OUI</option>
                    </select>
                </div> 
                <div class="d-flex justify-content-evenly" style="align-items: center;"> 
                  <div class="p-2">
                    <div id="champ_autres_formation" style="display: none;">
                      <label>Lesquelles :</label>
                      <input type="text" id="input_autres_formation" name="input_autres_formation" value="<?php echo $input_autres_formation_formulaire; ?>">
                    </div>
                  </div>
                </div>
              
                <div class="p-2">
                  Avez vous effectué des stages en entreprise?
                  <select id="choix_stages_entreprise" name="choix_stages_entreprise" onchange="afficherChamp_stages_entreprise()" value="<?php echo $stagesEntreprise_formulaire; ?>">
                      <option value="non">NON</option>
                      <option value="oui">OUI</option>
                  </select>
                </div>
                <div class="d-flex justify-content-evenly" style="align-items: center;"> 
                  <div class="p-2">
                    <div id="champ_quelle_entreprise" style="display: none;">
                      <div class="p-2">
                        <label na>Si oui, quelle(s) entreprise(s) : </label>
                        <input type="text" id="input_quelle_entreprise" name="input_quelle_entreprise" value="<?php echo $input_quelle_entreprise_formulaire; ?>">
                      </div>
                      <div class="p-2">
                        <label>Sur quel(s) thème(s) : </label>
                        <input type="text" id="theme_entreprise" name="theme_entreprise" value="<?php echo $theme_entreprise_formulaire; ?>">
                      </div>
                    </div>
                  </div>
              </div>
              <div class="p-2">
                  Avez vous déjà des contacts en entreprise?             
                    <select id="choix_contacts_entreprise" name="choix_contacts_entreprise" onchange="afficherChamp_contacts_entreprise()" value="<?php echo $choix_contacts_entreprise_formulaire; ?>">
                      <option value="non">NON</option>
                      <option value="oui">OUI</option>
                    </select>
                    <div class="d-flex justify-content-evenly" style="align-items: center;"> 
                  <div class="p-2">
                    <div id="champ_contacts_entreprise" style="display: none;">
                      <div class="p-2">
                        <label na>Si oui, quels sont vos contacts: </label>
                        <input type="text" id="input_contacts_entreprise" name="input_contacts_entreprise" value="<?php echo $input_contacts_entreprise_formulaire; ?>">
                      </div>
                      <div>
                      <p> Lorsque vous avez une proposition ferme, veuillez télécharger le dossier de validation à remplir</p>
                      <p> Lorsque votre candidature est validée, vous pourrez déposer ce dossier dans une autre page</p>
                      <a href="./telecharger/3_DossierValidationSujet2023-2024_Licence.pdf" download class="btn btn-primary btn-lg active">Télécharger</a>                    
                      </div>                      
                    </div>
                  </div>
            </b>
          </div>
          <button class="btn btn-primary btn-sm mb-3 float-end" type="button" style="background-color: rgb(79, 79, 255); margin-left: 10px;  margin-right: 10px;" 
          id="suivantButton" onclick="suivant()">Suivant</button>

          <button class="btn btn-primary btn-sm mb-3 float-end" type="submit" style="background-color: rgb(52 , 201 , 36);" 
          id="" onclick="">Enregistrer</button>
        </form>
        </div>
      </div>

    </div>
    
  </div>
</main>

<script>
  function suivant() {
    window.location.href = "piece_justificatif.php"; // Remplacez l'URL par celle de la page suivante
  }
  </script>

<!--Main layout-->
    <!-- Custom scripts -->
<script>

    function afficherChamp_autres_formations() {
      var choix_autres_formation = document.getElementById("choix_candidate_a_autres_formations");
      var champ_autres_formation= document.getElementById("champ_autres_formation");
      var input_autres_formation= document.getElementById("input_autres_formation");
  
      if (choix_autres_formation.value === "oui") {
        champ_autres_formation.style.display = "block";
        input_autres_formation.required = true;
      } else {
        champ_autres_formation.style.display = "none";
        input_autres_formation.required = false;
      }
    }

    function afficherChamp_stages_entreprise() {
      var choix_stages_entreprise = document.getElementById("choix_stages_entreprise");
      var champ_quelle_entreprise = document.getElementById("champ_quelle_entreprise");
      var inputSuinput_quelle_entreprisepplementaire = document.getElementById("input_quelle_entreprise");
  
      if (choix_stages_entreprise.value === "oui") {
        champ_quelle_entreprise.style.display = "block";
        input_quelle_entreprise.required = true;
      } else {
        champ_quelle_entreprise.style.display = "none";
        input_quelle_entreprise.required = false;
      }
    }

    function afficherChamp_contacts_entreprise() {
      var choix_contacts_entreprise = document.getElementById("choix_contacts_entreprise");
      var champ_contacts_entreprise= document.getElementById("champ_contacts_entreprise");
      var input_contacts_entreprise= document.getElementById("input_contacts_entreprise");
  
      if (choix_contacts_entreprise.value === "oui") {
        champ_contacts_entreprise.style.display = "block";
        input_contacts_entreprise.required = true;
      } else {
        champ_contacts_entreprise.style.display = "none";
        input_contacts_entreprise.required = false;
      }
    }


</script>
<script src="js/fonction.js"></script>
</body>
</html>