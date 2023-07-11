<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Listes des candidats</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="shortcut icon" type="image/png" href=".././logo/faviconmiage.png"/>
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
           href="accueil-responsable.html"
           class="list-group-item list-group-item-action py-2 ripple "
           aria-current="true"
           >
           <i class="fas fa-home fa-fw me-3"></i><span>Accueil</span>
        </a>
        <a
           href="affichercandi.php"
           class="list-group-item list-group-item-action py-2 active "
           >
          <i class="fas fa-pen fa-fw me-3"></i
            ><span>Liste des candidats </span>
        </a>
        <a
           href="affichercandiacceptes.php"
           class="list-group-item list-group-item-action py-2 "
           >
          <i class="fas fa-check fa-fw me-3"></i
            ><span>Liste des candidats acceptés</span>
        </a>
        <a
           href="affichercandirefuse.php"
           class="list-group-item list-group-item-action py-2  "
           >
          <i class="fas fa-times-circle fa-fw me-3"></i
            ><span>Liste des candidats refusés</span>
        </a>
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
    </div>
    <!-- Container wrapper -->
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
  <?php


include("../config.php");
$conn = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupérer tous les responsables
$sql = "
SELECT c.*
FROM candidat AS c
JOIN Formulaire AS f ON c.idcandidat_candidat = f.candidat_idcandidat_candidat
WHERE f.datevalidation IS NOT NULL AND Etat_admission IS NULL ;
";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
echo "<table class='table table-striped'>";
echo "<tr><th>ID Candidat</th><th>Nom Candidat</th><th>Prénom Candidat</th><th>Nom Jeune Fille</th><th>Photo_candidat</th><th>cv_candidat</th>
<th>Lettre de Motivation</th><th>Releve</th><th>Diplomes</th><th>justificatif pro</th><th>dossiervalidation_candidat</th>
<th>Etat_admission</th><th>Etat_document_candidat</th><th>intitule_formation</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["idcandidat_candidat"] . "</td>";
    echo "<td>" . $row["nom_candidat"] . "</td>";
    echo "<td>" . $row["prenom_candidat"] . "</td>";
    echo "<td>" . $row["nom_jeune_fille_candidat"] . "</td>"; 
    echo "<td><a href='" . $row["photo_candidat"] . "' target='_blank'><button class='btn btn-primary btn-sm'>Voir</button></a></td>";
    echo "<td><a href='" . $row["cv_candidat"] . "' target='_blank'><button class='btn btn-primary btn-sm'>Voir</button></a></td>";
    echo "<td><a href='" . $row["lettredemotivation_candidat"] . "' target='_blank'><button class='btn btn-primary btn-sm'>Voir</button></a></td>";
    echo "<td><a href='" . $row["releve_candidat"] . "' target='_blank'><button class='btn btn-primary btn-sm'>Voir</button></a></td>";
    echo "<td><a href='" . $row["diplome_candidat"] . "' target='_blank'><button class='btn btn-primary btn-sm'>Voir</button></a></td>";
    echo "<td><a href='" . $row["justificatifpro_candidat"] . "' target='_blank'><button class='btn btn-primary btn-sm'>Voir</button></a></td>";
    echo "<td><a href='" . $row["dossiervalidation_candidat"] . "' target='_blank'><button class='btn btn-primary btn-sm'>Voir</button></a></td>";

    
    echo "<td>" . $row["Etat_admission"] . "
  <form action='valider-admission.php' method='post' style='display: inline-block; margin-bottom:10px;'>
    <input type='hidden' name='candidat_id' value='" . $row["idcandidat_candidat"] . "'>
    <button class='btn btn-success btn-sm' type='submit'>Valider</button>
  </form>
  <form action='refuser-admission.php' method='post' style='display: inline-block;'>
    <input type='hidden' name='candidat_id' value='" . $row["idcandidat_candidat"] . "'>
    <button class='btn btn-danger btn-sm' type='submit'>Refuser</button>
  </form>
</td>";

echo "<td>" . $row["Etat_document_candidat"] . "
<form action='valider-document.php' method='post' style='display: inline-block; margin-bottom:10px;'>
  <input type='hidden' name='candidat_id' value='" . $row["idcandidat_candidat"] . "'>
  <button class='btn btn-success btn-sm' type='submit'>Valider</button>
</form>
<form action='refuser-document.php' method='post' style='display: inline-block;'>
  <input type='hidden' name='candidat_id' value='" . $row["idcandidat_candidat"] . "'>
  <button class='btn btn-danger btn-sm' type='submit'>Refuser</button>
</form>
</td>";
  
    echo "<td>" . $row["intitule_formation"] . "</td>";     
    echo "</tr>";
}
echo "</table>";
echo "</div>";
} else {
    echo "Aucun responsable trouvé dans la base de données.";
}

$conn->close();
?>

  </div>
</main>
</body>
</html>



