<?php

    include("model.php");
    if(!isset($_POST))
    {
        include("index.php");
        return;
    }

    if(!isset($_POST["Nom_utili"]) || !isset($_POST["Pass"]))
    {
        include("index.php");
        return;
    }

    if (strlen($_POST["Nom_utili"])==0 || strlen($_POST["Pass"])==0) {
        include("index.php");
        return;
    }

    if (connexion($_POST["Nom_utili"],$_POST["Pass"])==1){
        include("administration.php");
    }
    else 
    {
        include("index.php");
    }

?>