<?php

include("./config.php");

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
    <title>Dossier de validation</title>
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="./css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="shortcut icon" type="image/png" href="./logo/faviconmiage.png"/>
</head>
<body>
    <!--Main Navigation-->
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
           href="accueil.html"
           class="list-group-item list-group-item-action py-2 ripple"
           aria-current="true"
           >
           <i class="fas fa-home fa-fw me-3"></i><span>Accueil</span>
        </a>
        <a
           href="fillieremiage.html"
           class="list-group-item list-group-item-action py-2 "
           >
          <i class="fas fa-globe-americas fa-fw me-3"></i
            ><span>Filière Miage</span>
        </a>
        <a
           href="licence.html"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-graduation-cap fa-fw me-3"></i><span>Licence</span></a
          >
        <a
           href="master.html"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-graduation-cap fa-fw me-3"></i
          ><span>Master</span></a
          >
          <div class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-pen fa-fw me-3"></i>
            <span>Candidater</span>
            <select class="form-select" onchange="location = this.value;">
              <option selected disabled hidden>Sélectionnez une page</option>
              <option value="formulaire/candidaterl3.php">Licence 3</option>
              <option value="master1/candidaterm1.php">Master 1</option>
              
            </select>
          </div>
        <a
           href="apprentissage.html"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-book-open fa-fw me-3 "></i><span>Apprentissage</span></a
          >
        <a
           href="Partenaires.html"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-handshake fa-fw me-3 "></i><span>Partenaires</span></a
          >
        <a
           href="contacts.html"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-address-book fa-fw me-3"></i
          ><span>Contacts</span></a
          >
        
        <a
           href="mon-profil.php"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-user fa-fw me-3"></i><span>Mon profil</span></a
          >
          <a
           href="controleur_deco.php"
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
    </div>
    <!-- Container wrapper -->
  </nav>
  

  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px">
  <div class="container pt-4">
    <article id="post-10" class="post-10 page type-page status-publish hentry">
      <header class="entry-header">
        <div style="margin-top: 20px;"></div>
        <h1 class="entry-title" style="text-align: center;">Dossier de validation</h1>
      </header>
      <div class="entry-content">
        <div> Après que votre candidature soit validée par les responsables, ou que tout simplement vous avez déjà une proposition ferme d'une entreprise.
          Veuillez déposer votre dossier de validation ici.</div>
        
      <form action="controleur-upload-val.php" method="post" enctype="multipart/form-data">
                    
            <div class="d-flex justify-content-evenly">
                <div class="d-flex">
                    <div class="p-2 flex-grow-1">
                        <label>Ajouter votre Dossier de validation :</label>
                        <input type="file" name="filedoss"><br><br>                      
                    </div>
                </div>
            </div>
            
            <button class="btn btn-primary btn-sm mb-3 float-end" type="submit" style="background-color: rgb(52, 201, 36);" id="" onclick="">Enregistrer</button>

</form>
            </div><!-- .entry-content -->
      <footer class="entry-meta">
            </footer><!-- .entry-meta -->
    </article>
  </div>
</main>
</body>
</html>



     
    
 
