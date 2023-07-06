
<?php
    if(!isset($_COOKIE["etat"])){
    $expire = 60;// durée du cookie en sec, 5min
    setcookie("cookie","1",time()+$expire);
    }
    if(!$expire){
        @session_destroy();
        include("../acceuil.html");
        return;
    }
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Accueil</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="shortcut icon" type="image/png" href="./logo/testfavicon.png"/>
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
           class="list-group-item list-group-item-action py-2 ripple active"
           aria-current="true"
           >
           <i class="fas fa-home fa-fw me-3"></i><span>Accueil</span></a
           >
        <a
           href="apprentissage.html"
           class="list-group-item list-group-item-action py-2 ripple"
           >
        <i class="fas fa-pen fa-fw me-3"></i><span>Candidats</span></a
            >
        <a
           href="apprentissage.html"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-book-open fa-fw me-3 "></i><span>Apprentissage</span></a
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
<main style="margin-top: 70px">
  <div class="container pt-4">
    <div class="bg-white border rounded-5" style="margin-left:300px; margin-top:90px; margin-right: 20px">
          <section class="w-100 p-4">
              <div class="datatable">
                  <div class="datatable-inner table-responsive ps ps--active-y" style="overflow: auto; position: relative;">
                  <table class="table datatable-table">
                      <thead class="datatable-header"><tr>
                      <th style="cursor: pointer;" scope="col"><i data-mdb-sort="field_0" class="datatable-sort-icon fas fa-arrow-up"></i> ID Candidat</th>
                      <th style="cursor: pointer;" scope="col"><i data-mdb-sort="field_1" class="datatable-sort-icon fas fa-arrow-up"></i> Nom</th>
                      <th style="cursor: pointer;" scope="col"><i data-mdb-sort="field_2" class="datatable-sort-icon fas fa-arrow-up"></i> Prenom</th>
                      <th style="cursor: pointer;" scope="col"><i data-mdb-sort="field_3" class="datatable-sort-icon fas fa-arrow-up"></i> Etat</th>
                      <th style="cursor: pointer;" scope="col"><i data-mdb-sort="field_4" class="datatable-sort-icon fas fa-arrow-up"></i> Valider Candidature</th>
                      <th style="cursor: pointer;" scope="col"><i data-mdb-sort="field_5" class="datatable-sort-icon fas fa-arrow-up"></i> Refuser Candidature</th>
                      <th style="cursor: pointer;" scope="col"><i data-mdb-sort="field_5" class="datatable-sort-icon fas fa-arrow-up"></i> Confirmation</th>
                      </tr></thead>
                  <tbody class="datatable-body" id="tableau"><tr scope="row" data-mdb-index="0">
                    
                  </tbody>
                  </div>
              </div>
          </section>
    </div>  
    <form action="controleurcandidat.php" method="POST" enctype="multipart/form-data">
        <div class="d-flex justify-content-evenly">        
        <div><!-- bouton1 -->
            <div>Filtre candidats :</div> 
            <select name="filtre-candidat" id="filter"> 
                <option value="candidat-tous">--Tous--</option> 
                <option value="candidat-L3">Licence 3</option> 
                <option value="candidat-M1">Master 1</option> 
                <option value="candidta-M2">Master 2</option> 
            </select>
            </div>

            <div><br/><input type="submit" value="Rechercher"></div>
        </div>
    </form>  <br>
  </div>
</main>
</body>
</html>

