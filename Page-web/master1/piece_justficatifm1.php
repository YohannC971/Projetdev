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

    
    $sql_select_candidat = "SELECT nom_jeune_fille_candidat FROM Candidat WHERE id_utilisateur=$id_utilisateur";
    $result1 = $conn->query($sql_select_candidat);
    
    if ($result1 === FALSE) {
        echo "Erreur lors de la récupération du nom de Jeune Fille : " . $conn->error;
        exit;
    }
    
    if ($result1->num_rows > 0) {
        // Récupérer la première ligne de résultat
        $row = $result1->fetch_assoc();
    
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
        $row = $result2->fetch_assoc();
    
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
    <link rel="shortcut icon" type="image/png" href="../logo/faviconmiage.png"/>


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
           <option value="../formulaire/candidaterl3.php">Licence 3</option>
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
      <div class="p-2" style="background-color: rgb(79, 79, 255);"><h1>Candidature à la M1 MIAGE</h1></div>
      <div class="d-flex" style="border: 2px solid black;">
        <div class="d-flex align-items-start flex-column mb-3" >
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="candidaterm1.php">Information du candidat</a> </h5></div>
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="responsable_legalm1.php">Responsable Legal</a> </h5></div>
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="bacformm1.php">Baccalauréat</a> </h5></div>
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="1ercyclem1.php">Ier CYCLE</a> </h5></div>
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="diplomem1.php">Autre(s) diplôme(s) obtenue(s)</a> </h5></div>
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="vieprom1.php">Vie professionnelle</a> </h5></div>
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="piece_justificatifm1.php">Pieces justificatif</a> </h5></div>
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="questionnairem1.php">Questionnaire</a> </h5></div>
          <div class="p-2" style="border-bottom: 2px solid black; width: 200px;border-right: 2px solid black; width: 200px;"><h5><a href="recapm1.html">Recapitulatif</a> </h5></div> 
        </div>
        <form action="controleur-uploadm1.php" method="post" enctype="multipart/form-data">
          <div class="d-flex flex-column mb-3" style="border-right: 2px solid black; border-bottom: 2px solid black;border-left: 2px solid black;">
            <b>
            <div class="p-2" style="border-right: 2px solid black;border-bottom: 2px solid black; background-color: #d9d9d9; width: 350px;"><h3>Pièces Justificatif</h3></div>
            <div class="d-flex justify-content-evenly">

                <div class="d-flex">
                    <div class="p-2 flex-grow-1">
                        <label>Ajouter votre Photo :</label>
                        <input type="file" name="file1"><br><br>

                        <label>Ajouter votre CV :</label>
                        <input type="file" name="file2"><br><br>


                        <label>Ajouter votre Lettre de motivation :</label>
                        <input type="file" name="file3"><br><br>

                        <label>Ajouter vos Relevé de notes dans un seul fichier :</label>                      
                        <input type="file" name="file4"><br><br>
                        
                        <label>Ajouter vos diplomes dans un seul fichier :</label>                
                        <input type="file" name="file5"><br><br>

                        <label>Ajouter votre justificatif professionel si vous avez une activité professionnel :</label>             
                        <input type="file" name="file6"><br><br>

                        
                    </div>

            </div>
            </div>
            
          <button class="btn btn-primary btn-sm mb-3 float-end" type="submit" style="background-color: rgb(52 , 201 , 36);" 
          id="" onclick="">Enregistrer</button>

          <form action="creation_dossier.php" enctype="multipart/form-data">
              <button class="btn btn-primary btn-sm mb-3 float-end" type="submit" style="background-color: rgb(79, 79, 255); margin-left: 10px;  margin-right: 10px;" 
          id="suivantButton" onclick="suivant()">Suivant</button>
        </form>

      </form>

        </div>
      </div>

    </div>
    
  </div>
</main>
<script>
  function suivant() {
    window.location.href = "questionnairem1.php"; // Remplacez l'URL par celle de la page suivante
  }
  </script>  

</body>
</html>