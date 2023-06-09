<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire de connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" href="test.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="./logo/faviconmiage.png"/>
  </head>
  <body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10">
            <div class="card rounded-3 text-black">
              <div class="row g-0">
                <div class="col-lg-60">
                  <div class="card-body p-md-5 mx-md-4">
    
                    <div class="text-center">
                      <img src="http://miage-antilles.fr/wp-content/uploads/2015/04/logo.png"
                        style="width: 150px;" alt="logo">
                        <img src="http://miage-antilles.fr/wp-content/uploads/2021/11/GRETA-CFA-Gpe-Ptt.png"
                        style="width: 300px;" alt="logo">
                    </div>
    
                    <form action="controleur.php" method="POST">
                      <p><b>Connecter-vous</b></p>
    
                      <div class="form-outline mb-4">
                        <input type="text" id="form2Example11" class="form-control"
                          placeholder="Login" name="Login" required/>
                        <label class="form-label" for="form2Example11">Login</label>
                      </div>
    
                      <div class="form-outline mb-4">
                        <input type="password" id="form2Example22" class="form-control" placeholder="Mot de passe" name="Pass"/>
                        <label class="form-label" for="form2Example22">Mot de passe</label>
                      </div>
    
                      <div class="text-center pt-1 mb-5 pb-1">
                        <input class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" value="Se connecter">                       
                        <br/>
                        <a class="text-muted" href="#!">Mot de passe oublié?</a>
                      </div>
    
                      <div class="d-flex align-items-center justify-content-center pb-4">
                        <p class="mb-0 me-2">Pas encore de compte?</p>
                        <a href="inscription.html" class="btn btn-outline-danger" >Créer-en un</a>
                      </div> 
                    </form>    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  

  
  <!-- Code injected by live-server -->
</body>
</html>
