<?php

include("config.php");
function connexion($l,$p)
{
    global $Login, $Pass;

    if($l == $Login || $p == $Pass)
    {
        $_SESSION["etat"] = 1;
        setcookie("etat","1",time()+60*5);
        return 1;
    }
    else
    {
        $_SESSION["etat"] = 0;
        return 0;
    }
}



?>