<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Liste responsables</title>
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
           href="accueil-admin.html"
           class="list-group-item list-group-item-action py-2 ripple "
           aria-current="true"
           >
           <i class="fas fa-home fa-fw me-3"></i><span>Accueil</span>
        </a>
        <a
           href="liste-responsable.php"
           class="list-group-item list-group-item-action py-2 active "
           >
          <i class="fas fa-globe-americas fa-fw me-3 "></i
            ><span>Liste des responsables</span>
        </a>
        <a
           href="modifie-cle-inscription.php"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-graduation-cap fa-fw me-3"></i><span>Modifié la clé d'inscription</span></a
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

// Récupérer tous les responsables
$sql = "SELECT * FROM responsables";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
echo "<table class='table table-striped'>";
echo "<tr><th>ID Responsables</th><th>ID Utilisateur</th><th>Nom Responsable</th><th>Prénom Responsable</th><th>E-mail Responsable</th><th>Supprimer</th></tr>";
// Afficher les responsables et le bouton supprimer pour chaque responsable
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["idres_responsables"] . "</td>";
    echo "<td>" . $row["id_utilisateur"] . "</td>";
    echo "<td>" . $row["nomres_responsables"] . "</td>";
    echo "<td>" . $row["prenomres_responsables"] . "</td>"; 
    echo "<td>" . $row["adressemail_responsables"] . "</td>";     

    echo "<td><button class='btn btn-danger' style='color:white'><a href='supprimer-responsable.php?id=" . $row["idres_responsables"] . "'style='color: white;'>Supprimer</a></button></td>";
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



