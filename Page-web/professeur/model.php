<?php
include("../config.php");
function affcandidat_tous(){
    global $HOST, $LOGINBDD, $PASSBDD, $BDD;
    $c = new mysqli($HOST,$LOGINBDD,$PASSBDD,$BDD);
    $r = $c ->query("SELECT * FROM candidat");
    if($r -> num_rows>0){
        echo '
        <div class="bg-white border rounded-5" style="margin-left:300px; margin-top:90px; margin-right: 20px">
        <section class="w-100 p-4">
            <div class="datatable">
                <div class="datatable-inner table-responsive ps ps--active-y" style="overflow: auto; position: relative;">
                <table class="table datatable-table">
                    <thead class="datatable-header"><tr>
                    <th style="cursor: pointer;" scope="col"><i data-mdb-sort="field_0" class="datatable-sort-icon fas fa-arrow-up"></i> ID Candidat</th>
                    <th style="cursor: pointer;" scope="col"><i data-mdb-sort="field_1" class="datatable-sort-icon fas fa-arrow-up"></i> Nom</th>
                    <th style="cursor: pointer;" scope="col"><i data-mdb-sort="field_2" class="datatable-sort-icon fas fa-arrow-up"></i> Prenom</th>
                    <th style="cursor: pointer;" scope="col"><i data-mdb-sort="field_3" class="datatable-sort-icon fas fa-arrow-up"></i> Etat</th>
                    <th style="cursor: pointer;" scope="col"><i data-mdb-sort="field_4" class="datatable-sort-icon fas fa-arrow-up"></i> Valider Candidature</th>
                    <th style="cursor: pointer;" scope="col"><i data-mdb-sort="field_5" class="datatable-sort-icon fas fa-arrow-up"></i> Refuser Candidature</th>
                    <th style="cursor: pointer;" scope="col"><i data-mdb-sort="field_5" class="datatable-sort-icon fas fa-arrow-up"></i> Confirmation</th>
                    </tr></thead>
                <tbody class="datatable-body"><tr scope="row" data-mdb-index="0">
        ';  
        for($i = 0; $i < $r-> num_rows;$i++){
            setcookie("cookie","1",time()+60*5);       
            $donnees=$r->fetch_array(MYSQLI_BOTH);
            $id= $donnees['idcandidat_candidat'];
            $_SESSION['$id']=$id;
            $nom= $donnees['nom_candidat'];
            $prenom= $donnees['prenom_candidat'];
            $etat= $donnees['Etat_admission'];
            ?>
            <script>
                var table = document.getElementById("tableau");
                var idcandidat = document.createElement("td");idcandidat.textContent='Bonjour'; table.appendChild(idcandidat);alert('ok');

                
            </script>
            <?php
            echo'
            <form action="controleurupdatecandidat.php" method="POST" enctype="multipart/form-data">
                <td style="" class="" data-mdb-field="field_0" false="" name="id_candidat" id="id_candidat">'.$id.'</td>
                <td style="" class="" data-mdb-field="field_1" false="">'.$nom.'</td>
                <td style="" class="" data-mdb-field="field_2" false="">'.$prenom.'</td>
                <td style="" class="" data-mdb-field="field_3" false="">'.$etat.'</td>
                <td style="" class="" data-mdb-field="field_4" false=""><input type="checkbox" name="valider_candi" id="valider_candi"></td>
                <td style="" class="" data-mdb-field="field_5" false=""><input type="checkbox" name="refuser_candi" id="refuser_candi"></td>
                <td style="" class="" data-mdb-field="field_5" false=""><input type="submit" name="valider_chang" id="valider_chang" value="Modifier"></td>
            </form>
            ';
        }
        echo '
        </tr></tbody>
        </table>
        </div>
        </div>
        </section>
        </div>'
        ;
        return 1;
    }
    else return 0;
}

function modifcandidat($id,$checkv,$checkr){
    echo $id."/".$checkr."/".$checkv;
}
?>