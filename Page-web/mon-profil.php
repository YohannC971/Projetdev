<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['login'])) {
    // Rediriger vers la page de connexion ou afficher un message d'erreur
    header('Location: index.php');
    exit();
}


// Récupérer le login de l'utilisateur depuis la session
$login = $_SESSION['login'];

// Effectuer la connexion à la base de données (à adapter selon votre configuration)
include("config.php");

$conn = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);

// Vérifier si la connexion a échoué
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Préparer la requête SQL avec un paramètre pour éviter les injections SQL
$sql = "SELECT c.nom_candidat, c.prenom_candidat, c.Etat_admission, c.Etat_document_candidat, f.email_formulaire 
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
$stmt->bind_result($nomCandidat, $prenomCandidat, $Etat_admission, $Etat_document_candidat, $emailCandidat);

// Récupérer le premier et unique résultat
$stmt->fetch();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Mon profil</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
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
           class="list-group-item list-group-item-action py-2 ripple "
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
           class="list-group-item list-group-item-action py-2 ripple active"
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
      <a class="navbar-brand" >
       
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
        <h1 class="entry-title"style="text-align:center">Mon profil</h1>
      </header>
  
      <div class="entry-content">
      
    <form>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo $nomCandidat; ?>" readonly>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $prenomCandidat; ?>" readonly>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo $emailCandidat; ?>" readonly>
    </form><br><br><br><br><br>
    <h1 class="entry-title" style="text-align:center">Ma candidature</h1><br>
      </header>
  
      <div class="entry-content">
      
    <form>
          <label for="">Etat de la Candidature :</label>
          <?php if ($Etat_admission == 0): ?>
            <button style="background-color: red; color: white;" disabled>Refusé</button>
          <?php elseif ($Etat_admission == 1): ?>
            <button style="background-color: green; color: white;" disabled>Accepté</button>
          <?php endif; ?>
        <br><br>

          <label for="">Etat des documents :</label>
          <?php if ($Etat_document_candidat == 0): ?>
            <button style="background-color: red; color: white;" disabled>Non complet</button>
          <?php elseif ($Etat_document_candidat == 1): ?>
            <button style="background-color: green; color: white;" disabled>Complet</button>
          <?php endif; ?>
    </form>
</body>
</html>

<?php
// Fermer la déclaration, la connexion à la base de données et la session
$stmt->close();
$conn->close();
?>


