<?php
include("model.php");

if (isset($_POST['filtre-candidat'])) {
    $valeurSelect = $_POST['filtre-candidat'];
    if($valeurSelect=="candidat-tous"){
        if(affcandidat_tous()==1)
        {
            include("pagecandidat.php");
        }
        else
        {
            include("pagecandidat.php");
            
        }
    }

  }

?>