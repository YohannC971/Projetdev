<?php
include("../config.php");

$conn = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Requête SELECT pour récupérer la clé d'inscription
$sql_select = "SELECT * FROM `cle-inscription`";
$result = $conn->query($sql_select);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cle = $row['cle'];
} else {
    $cle = ""; // ou une valeur par défaut si la clé n'est pas trouvée
}

$result->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Modifié la clé d'inscription</title>
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
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div style="margin-top: 50px;"></div>
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="accueil-admin.html" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                        <i class="fas fa-home fa-fw me-3"></i><span>Accueil</span>
                    </a>
                    <a href="liste-responsable.php" class="list-group-item list-group-item-action py-2 ">
                        <i class="fas fa-globe-americas fa-fw me-3"></i><span>Liste des responsables</span>
                    </a>
                    <a href="modifie-cle-inscription.php" class="list-group-item list-group-item-action py-2 ripple active">
                        <i class="fas fa-graduation-cap fa-fw me-3"></i><span>Modifié la clé d'inscription</span>
                    </a>
                    <a href="../controleur_deco.php" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-sign-out-alt fa-fw me-3"></i><span>Déconnexion</span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                        aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a class="navbar-brand" href="#">
                    <img src="http://miage-antilles.fr/wp-content/uploads/2015/04/logo-300x245.png"
                         style="margin-right: 20px;" height="80" alt="" loading="lazy"/>
                    <img src="http://miage-antilles.fr/wp-content/uploads/2014/09/UA_logoCMJN_Corporate.jpg"
                         style="margin-right: 20px;" height="80" alt="" loading="lazy">
                    <img src="http://miage-antilles.fr/wp-content/uploads/2021/11/GRETA-CFA-Gpe-Ptt.png"
                         style="margin-right: 20px;" height="80" alt="" loading="lazy">
                </a>
            </div>
            <!-- Container wrapper -->
        </nav>
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px">
        <div class="container pt-4" style="border-color: black; border-radius: 10px;">
            <form action="mise-a-jour-cle-inscription.php" method="post" enctype="multipart/form-data">
            <div class="d-flex flex-column mb-3" style="border-right: 2px solid black; border-bottom: 2px solid black;border-left: 2px solid black;">
            <b>
            <div class="p-2" style="border-right: 2px solid black;border-bottom: 2px solid black; background-color: #d9d9d9; width: 350px;"><h3>Clé d'inscription</h3></div>
            <div class="d-flex justify-content-evenly">

              <div class="p-2">
                    <div class="p-2">
                        <label for="">Clé d'inscription (actuelle) :</label>
                        <input type="text" id="cle" name="cle" value="<?php echo $cle; ?>"/>
                        <button class="btn btn-primary btn-sm mb-3 float-end" type="submit" style="background-color: rgb(52 , 201 , 36);" 
                        id="" onclick="">Modifié</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
