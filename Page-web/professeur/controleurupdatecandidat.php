<?php
session_start();
include("model.php");

$_SESSION['id'] = $_POST['id_candidat'];

if (isset($_POST['valider_chang'])) {
    
    if($_POST['valider_candi'] != $_POST['refuser_candi']){

        if(modifcandidat($_SESSION['id'],$_SESSION['valider_candi'],$_POST['refuser_candi'])==1){
            include("pagecandidat.php");
        }
        
    }

    else{

        echo "<script>alert(\"Une erreur est surevue !\")</script>";
        include("pagecandidat.php");
    }

}

?>