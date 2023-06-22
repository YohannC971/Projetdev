<?php
    
    include("model.php");
    if(!isset($_POST))
    {
        include("index.php");
        return;
    }

    if(!isset($_POST["Login"]) || !isset($_POST["Pass"]))
    {
        include("index.php");
        return;
    }

    if (strlen($_POST["Login"])==0 || strlen($_POST["Pass"])==0) {
        include("index.php");
        return;
    }

    if (connexion($_POST["Login"],$_POST["Pass"])==1){
        include("accueil.html");
    }
    else 
    {
        include("index.php");
    }

?>