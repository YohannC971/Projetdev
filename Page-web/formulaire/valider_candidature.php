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
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="piece_justificatif.php">Pieces justificatif</a> </h5></div>
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="questionnaire.php">Questionnaire</a> </h5></div>
            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="valider_candidature.php">Valider ma Candidature</a> </h5></div>

            <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="recap.html">Recapitulatif</a> </h5></div>           
          </div>

        <form action="controleur-valider-candidature.php" method="post" enctype="multipart/form-data">
          <div class="d-flex flex-column mb-3" class="d-flex flex-column mb-3" style="border-right: 2px solid black; border-bottom: 2px solid black;border-left: 2px solid black;">
            <b>
            <div class="p-2" style="border-right: 2px solid black;border-bottom: 2px solid black; background-color: #d9d9d9; width: 350px;"><h3>Valider ma Candidature</h3></div>
              <div class="d-flex justify-content-evenly" style="align-items: center;"> 
                <div class="p-2">
                  <button class="btn btn-primary btn-sm mb-3 float-end" type="submit" style="background-color: rgb(79, 79, 255); margin-left: 10px;  margin-right: 10px;" 
                  id="" onclick="">Valider</button>
                  <button class="btn btn-primary btn-sm mb-3 float-end" type="button" style="background-color: rgb(79, 79, 255); margin-left: 10px;  margin-right: 10px;" 
              id="suivantButton" onclick="suivant()">suivant</button>
      

                </div> 
                <div class="d-flex justify-content-evenly" style="align-items: center;">

                </div>
            </div>
            </b>
          </div>
        </form><br><br><br><br><br><br>
        <form action="revalider_candidature.php" method="post" enctype="multipart/form-data">
          <div class="d-flex flex-column mb-3" class="d-flex flex-column mb-3" style="border-right: 2px solid black; border-bottom: 2px solid black;border-left: 2px solid black;">
            <b>
            <div class="p-2" style="border-right: 2px solid black;border-bottom: 2px solid black; background-color: #d9d9d9; width: 350px;"><h3>Revalider ma Candidature</h3></div>
              <div class="d-flex justify-content-evenly" style="align-items: center;"> 
                <div class="p-2">
                  <b>Si vous avez déjà validé votre candidature auparavant et quelle a été refusée cliquez sur le bouton "Revalider ma candidature"</b><br>
                  <button class="btn btn-primary btn-sm mb-3 float-end" type="submit" style="background-color: rgb(79, 79, 255); margin-left: 10px;  margin-right: 10px;" 
                  id="" onclick="">Revalider ma candidature</button>
                </div> 
                
                <div class="d-flex justify-content-evenly" style="align-items: center;">

                </div>
                
            </div>
            </b>
          </div>
        </form>
        </div>
      </div>

    </div>
    
  </div>
</main>

<script>
    function suivant() {
      window.location.href = "recap.html"; // Remplacez l'URL par celle de la page suivante
    }
    </script>

<!--Main layout-->
    <!-- Custom scripts -->
<script src="js/fonction.js"></script>
</body>
</html>