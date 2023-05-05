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
                      <p>Connecter-vous</p>
    
                      <div class="form-outline mb-4">
                        <input type="text" id="form2Example11" class="form-control"
                          placeholder="Nom d'utilisateur" name="Login" required/>
                        <label class="form-label" for="form2Example11">Nom d'utilisateur</label>
                      </div>
    
                      <div class="form-outline mb-4">
                        <input type="password" id="form2Example22" class="form-control" placeholder="Mot de passe" name="Pass"/>
                        <label class="form-label" for="form2Example22">Mot de passe</label>
                      </div>
    
                      <div class="text-center pt-1 mb-5 pb-1">
                        <input class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" value="Se connecter">
                        <!--<button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Se connecter</button>-->
                        <br/>
                        <a class="text-muted" href="#!">Mot de passe oublié?</a>
                      </div>
    
                      <div class="d-flex align-items-center justify-content-center pb-4">
                        <p class="mb-0 me-2">Pas encore de compte?</p>
                        <button type="button" class="btn btn-outline-danger">Créer-en un</button>
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
  <!-- Code vérifie la force du mot de passe -->
  <script>
function checkPasswordStrength(password) {
  var strength = 0;

  if (password.length < 8) {
    return strength;
  }

  // check if password contains both uppercase and lowercase characters
  if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
    strength += 1;
  }

  // check if password has at least one number
  if (password.match(/([0-9])/)) {
    strength += 1;
  }

  // check if password has at least one special character
  if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
    strength += 1;
  }

  return strength;
}

document.addEventListener('DOMContentLoaded', function() {
  var passwordInput = document.querySelector('input[name="Pass"]');
  var strengthText = document.createElement('small');
  strengthText.classList.add('text-muted');
  strengthText.innerText = '(Force du mot de passe: faible)';

  passwordInput.addEventListener('input', function() {
    var password = passwordInput.value;
    var strength = checkPasswordStrength(password);

    if (strength === 0) {
      strengthText.innerText = '(Force du mot de passe: faible)';
      strengthText.classList.remove('text-success');
      strengthText.classList.remove('text-warning');
      strengthText.classList.add('text-muted');
    } else if (strength === 1) {
      strengthText.innerText = '(Force du mot de passe: moyenne)';
      strengthText.classList.remove('text-success');
      strengthText.classList.add('text-warning');
      strengthText.classList.remove('text-muted');
    } else if (strength === 2) {
      strengthText.innerText = '(Force du mot de passe: forte)';
      strengthText.classList.add('text-success');
      strengthText.classList.remove('text-warning');
      strengthText.classList.remove('text-muted');
    }
  });

  var passwordFormGroup = passwordInput.parentElement;
  passwordFormGroup.appendChild(strengthText);
});
</script>

  
  <!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
