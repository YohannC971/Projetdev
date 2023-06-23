<?php

include("config.php");

function connexion($n, $p) {
    global $HOST, $LOGINBDD, $PASSBDD, $BDD;
    $c = new mysqli($HOST, $LOGINBDD, $PASSBDD, $BDD);

    // Utilisation d'une requête préparée avec des paramètres liés
    $stmt = $c->prepare("SELECT login_utilisateur, passe_utilisateur FROM utilisateur WHERE `login_utilisateur` = ? AND `passe_utilisateur`= ?");
    $stmt->bind_param("ss", $n, $p); // Assurez-vous que les types de données des paramètres sont corrects
    $stmt->execute();
    $r = $stmt->get_result();

    if ($r->num_rows == 1) {
        $donnees = $r->fetch_array(MYSQLI_BOTH);
        $_SESSION["login"] = $donnees["login_utilisateur"];

        setcookie("etat", "1", time() + 60 * 5);
        $_SESSION["etat"] = 1;
        return 1;
    } else {
        $_SESSION["etat"] = 0;
        return 0;
    }
}


?>