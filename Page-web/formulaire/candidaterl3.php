<?php
// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

include("../config.php");

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

    
    $sql_select_candidat = "SELECT nom_jeune_fille_candidat FROM Candidat WHERE id_utilisateur=$id_utilisateur";
    $result1 = $conn->query($sql_select_candidat);
    
    if ($result1 === FALSE) {
        echo "Erreur lors de la récupération du nom de Jeune Fille : " . $conn->error;
        exit;
    }
    
    if ($result1->num_rows > 0) {
        // Récupérer la première ligne de résultat
        $row = $result->fetch_assoc();
    
        // Accéder à la valeur de la colonne "nom_jeune_fille_candidat"
        $nom_jeune_fille = $row["nom_jeune_fille_candidat"];
    }
    /***********************************/

    $sql_select_formulaire = "SELECT datenaissance_formulaire, lieu_naissance_formulaire, ville, AdressePrincipal_formulaire, 
    codepostal, telephone, mobile FROM Formulaire WHERE candidat_idcandidat_candidat=(SELECT idcandidat_candidat FROM Candidat WHERE id_utilisateur=$id_utilisateur)";

    $result2 = $conn->query($sql_select_formulaire);
    
    if ($result2 === FALSE) {
        echo "Erreur lors de la récupération des informations du formulaire : " . $conn->error;
        exit;
    }
    
    if ($result2->num_rows > 0) {
        // Récupérer la première ligne de résultat
        $row = $result->fetch_assoc();
    
        // Accéder aux valeurs des colonnes du formulaire
        $date_naissance = $row["datenaissance_formulaire"];
        $lieu_naissance = $row["lieu_naissance_formulaire"];
        $ville = $row["ville"];
        $adresse = $row["AdressePrincipal_formulaire"];
        $codePostal = $row["codepostal"];
        $telephone = $row["telephone"];
        $mobile = $row["mobile"];
    }
  }
  $result->close();
  $result1->close();
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
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/style.css" />

</head>
<body>
  <script>
    // Redirection vers la version mobile
    if (window.innerWidth <= 768) {
      window.location.href = "candidaterl3-mobile.html";
    }
  </script>
    <!--Main Navigation-->
    <!--Fonctions-->
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
      class="list-group-item list-group-item-action py-2 ripple"
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
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="responsable_legal.html">Responsable Legal</a> </h5></div>
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="bacform.html">Baccalauréat</a> </h5></div>
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="1ercycle.html">Ier CYCLE</a> </h5></div>
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="diplome.html">Autre(s) diplôme(s) obtenue(s)</a> </h5></div>
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="viepro.html">Vie professionnelle</a> </h5></div>
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="questionnaire.php">Questionnaire</a> </h5></div>
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="recap.html">Recapitulatif</a> </h5></div> 
        </div>
        <form action="controleur-candidaterl3.php" method="post" target="_blank" enctype="multipart/form-data">
          <div class="d-flex flex-column mb-3" style="border-right: 2px solid black; border-bottom: 2px solid black;border-left: 2px solid black;">
            <b>
            <div class="p-2" style="border-right: 2px solid black;border-bottom: 2px solid black; background-color: #d9d9d9; width: 350px;"><h3>Information du candidat</h3></div>
            <div class="d-flex justify-content-evenly">

              <div class="p-2">
                <label for="nom_jeune_fille">Nom de Jeune Fille :</label>
                <input type="text" id="nom_jeune_fille" name="nom_jeune_fille" maxlength="50" />
              </div>
            </div>
            <!----------------------------------------------------------------------------------------------------------->
            <div class="d-flex justify-content-evenly">
              <div class="p-2">
                <label for="date_naissance">Né(e) le :</label>
                <input type="date" id="date_naissance" name="date_naissance" />
              </div>

              <div class="p-2">
                <label for="lieu_naissance">à :</label>
                <input type="text" id="lieu_naissance" name="lieu_naissance">
              </div>
            </div><br> <br>
            <!----------------------------------------------------------------------------------------------------------->
            <div class="d-flex">
              <div class="p-2 flex-grow-1">
                <label for="adresse">Adresse de l'étudiant :</label>
                  <input type="text" id="adresse" name="adresse" placeholder="Adresse">
              </div>
              <div class="p-2">
                  <label for="ville">Ville :</label>
                  <input type="text" id="ville" name="ville" placeholder="Ville">
              </div>
              <div class="p-2">
                <label for="codePostal">Code Postal :</label>
                <input type="text" id="codePostal" name="codePostal" placeholder="Code Postal"><br><br>
              </div>
            </div><br> <br>

              <!----------------------------------------------------------------------------------------------------------->
            
              <div class="d-flex">

              <div class="p-2">
                <label for="telephone">Téléphone :</label>
                <input type="text" id="telephone" name="telephone" placeholder="Téléphone"><br><br>
              </div>

              <div class="p-2">
                <label for="mobile">Mobile :</label>
                <input type="text" id="mobile" name="mobile" placeholder="Mobile"><br><br>
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
    window.location.href = "responsable_legal.html"; // Remplacez l'URL par celle de la page suivante
  }
  </script>  
/*
<script>
  function checkFields() {
    // Récupérer les valeurs des champs
    var dateNaissance = document.getElementById("date_naissance").value;
    var lieuNaissance = document.getElementById("lieu_naissance").value;
    var ville = document.getElementById("ville").value;
    var adresse = document.getElementById("adresse").value;
    var codePostal = document.getElementById("code_postal").value;
    var telephone = document.getElementById("telephone").value;
    var mobile = document.getElementById("mobile").value;
  
    // Vérifier si tous les champs sont remplis
    if (dateNaissance !== "" && lieuNaissance !== "" && ville !== "" && adresse !== "" && codePostal !== "" && telephone !== "" && mobile !== "") {
      // Changer l'attribut "readonly" des champs en lecture seule
      document.getElementById("date_naissance").readOnly = true;
      document.getElementById("lieu_naissance").readOnly = true;
      document.getElementById("ville").readOnly = true;
      document.getElementById("adresse").readOnly = true;
      document.getElementById("code_postal").readOnly = true;
      document.getElementById("telephone").readOnly = true;
      document.getElementById("mobile").readOnly = true;
    }
  }
  </script>*/
</body>
</html>