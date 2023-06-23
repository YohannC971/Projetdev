<?php

include("config.php");
session_start();

function connexion($n, $p) {
    global $HOST, $LOGINBDD, $PASSBDD, $BDD;
    $c = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);

    // Utilisation d'une requête préparée avec des paramètres liés
    $r = $c ->query("SELECT * FROM utilisateur WHERE `login_utilisateur`='$n' and `passe_utilisateur`='$p' ");

    if ($r->num_rows == 1) {
        setcookie("etat", "1", time() + 60 * 5);
        $donnees = $r->fetch_array(MYSQLI_BOTH);
        $_SESSION["role"]= $donnees["role_utilisateur"];  
        $_SESSION["etat"] = 1;
        return 1;
    } else {
        $_SESSION["etat"] = 0;
        return 0;
    }
}

?>