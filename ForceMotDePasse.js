function vérifierForceMotDePasse(motDePasse) {
  var force = 0;

  if (motDePasse.length < 8) {
    return force;
  }

  // Vérifier si le mot de passe contient des caractères majuscules et minuscules
  if (motDePasse.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
    force += 1;
  }

  // Vérifier si le mot de passe contient au moins un chiffre
  if (motDePasse.match(/([0-9])/)) {
    force += 1;
  }

  return force;
}

document.addEventListener('DOMContentLoaded', function() {
  var champMotDePasse = document.querySelector('input[name="Pass"]');
  var texteForce = document.createElement('small');
  texteForce.classList.add('text-muted');
  texteForce.innerText = 'Force du mot de passe : faible';

  champMotDePasse.addEventListener('input', function() {
    var motDePasse = champMotDePasse.value;
    var force = vérifierForceMotDePasse(motDePasse);

    if (force === 0) {
      texteForce.innerText = 'Force du mot de passe : faible';
      texteForce.classList.remove('text-success');
      texteForce.classList.remove('text-warning');
      texteForce.classList.add('text-muted');
    } else if (force === 1) {
      texteForce.innerText = 'Force du mot de passe : forte';
      texteForce.classList.add('text-success');
      texteForce.classList.remove('text-warning');
      texteForce.classList.remove('text-muted');
    }
  });

  var groupeMotDePasse = champMotDePasse.parentElement;
  groupeMotDePasse.appendChild(texteForce);
});
