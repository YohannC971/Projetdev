<?php

if(!isset($_SESSION))
{
    include("index.php");
    return;
}

if($_SESSION["etat"]!=1)
{
    include("index.php");
    return;

}

if(isset($_COOKIE ["etat"])){
    setcookie("etat","1",time()+60*5);
}
else{
    @session_destroy();
    include("index.php");
    return;
}

?>

<!DocType html>
<html>

    <head>
            <title>Formulaire de connexion</title>
    </head>
    <body>
            <h1>Bonjour </h1>

            <form action="controleur_deco.php" method="POST">
            <input type="submit" value="Se deconnecter">
            </form>

    </body>
    
</html>