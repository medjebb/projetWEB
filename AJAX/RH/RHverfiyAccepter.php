
<?php

require_once('../../include/dbaccess.php');

$id = intval($_GET['id']);
$type = intval($_GET['type']);
require_once('../../include/reclamation.php');
require_once('../../include/employe.php');
require_once('../../include/HeureSup.php');
require_once('../../include/conges.php');
require_once('../../include/absence.php');
require_once('../../include/avance.php');

if ($type==0 || $type== -1) {
    $rst=reclamation::accepter($id);
    echo "
    <thead>
        <tr>
        <th>ID</th>
            <th>Employe</th>
            <th>La reclamation</th>
            <th>Date</th>
            <th>Accepter</th>
            <th>Refuser</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Employe</th>
            <th>La reclamation</th>
            <th>Date</th>
            <th>Accepter</th>
            <th>Refuser</th>
        </tr>
    </tfoot>
    ";
    if ($type==0)
    {
    $reclamation = reclamation::getAll_RH();
    $type=0;       
    }
    else
    {
    $reclamation = reclamation::getAll_RP();        
    $type=-1;  
    }

if (count($reclamation) == 0) {
    echo "<tr class=\"odd\"><td valign=\"top\" colspan=\"6\" class=\"dataTables_empty\">No matching records found</td></tr>";
} else {
    echo "<tbody>";
    foreach($reclamation as $rec){
        $employee= Employe::getOne($rec['idEmploye']);
        echo "<tr class=\"\">
                <td class=\"\">".$rec['idReclamation']."</td>
                 <td >".$employee['Nom']." ".$employee['Prenom']."</td>
                 <td >
                 <div class=\"row\">
                 <div class=\"col-10\">".$rec['objet']."</div>
                 
                 <div class=\"col-2\">
                <a class=\"dropdown-item\" href=\"#\" data-toggle=\"modal\" data-target=\"#RecModal_".$rec['idReclamation']."\">
                 <i class=\"fas fa-eye fa-sm fa-fw mr-2 text-gray-400\"></i>
                </a>
                </div>

                 </div>
                 </td>
                 <td >".$rec['date']."</td>
                 <td class=\"\" ><button class=\"btn text-success\" onclick=\"accepter(".$type.",".$rec['idReclamation'].")\" ><i class=\"fa fa-check\"></i></button></div></td>
    
                 <div class=\"modal fade\" id=\"#RecModal_".$rec['idReclamation']."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\"
                     aria-hidden=\"true\">
                     <div class=\"modal-dialog\" role=\"document\">
                         <div class=\"modal-content\">
                             <div class=\"modal-header\">
                                 <h5 class=\"modal-title\" id=\"exampleModalLabel\">Description de la reclamation</h5>
                                 <button class=\"close\" type=\"button\" data-dismiss=\"modal\" aria-label=\"Close\">
                                     <span aria-hidden=\"true\">×</span>
                                 </button>
                             </div>
                             <div class=\"modal-body\">
                             <p>".$rec['description']."</p>
                             </div>S

                         </div>
                     </div>
                 </div>
                 <td ><div><button class=\"btn text-danger fs-1 text-danger fw-bold\"onclick=\"refuser(".$type.",".$rec['idReclamation'].")\" >X</button></div></td>
            </tr>";
    }
    echo "</tbody>";
}

}


if ($type==1) {
$rst = HeureSup::accepter($id);
    echo "
    <thead>
    <tr>
    <th>ID</th>
        <th>Employe</th>
        <th>nombres d'heure</th>
        <th>Date</th>
        <th>Accepter</th>
        <th>Refuser</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>ID</th>
        <th>Employe</th>
        <th>nombres d'heure</th>
        <th>Date</th>
        <th>Accepter</th>
        <th>Refuser</th>
    </tr>
</tfoot>
    ";
    $hs= HeureSup::getAll_enCours();
    if(count($hs)==0){
        echo "<tr class=\"odd\"><td valign=\"top\" colspan=\"6\" class=\"dataTables_empty\">No matching records found</td></tr>";
    }else{
        echo "<tbody>";
        foreach($hs as $H){
            $employee= Employe::getOne($H['idEmploye']);
            echo "<tr class=\"\">
                    <td class=\"\">".$H['idHs']."</td>
                     <td >".$employee['Nom']." ".$employee['Prenom']."</td>
                     <td >".$H['nbrheures']."</td>
                     <td >".$H['datehs']."</td>
                     <td ><div class=\"\" href=\"\"><button class=\"btn text-success\" onclick=\"accepter(1,".$H['idHs'].")\"><i class=\"fa fa-check\"></i></button></div></td>
                     <td ><div class=\"\" href=\"\"><button class=\"btn text-danger fs-1 text-danger fw-bold\" onclick=\"refuser(1,".$H['idHs'].")\" >X</button></div></td>
                </tr>";
        }
        echo "</tbody>";
    }
    
}

if ($type==2) {
    $rst = conge::accepter($id);
    echo "
    <thead>
    <tr>
        <th>ID</th>
        <th>Employe</th>
        <th>Debut</th>
        <th>Fin</th>
        <th>Type de conge</th>
        <th>Accepter</th>
        <th>Refuser</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>ID</th>
        <th>Employe</th>
        <th>Debut</th>
        <th>Fin</th>
        <th>Type de conge</th>
        <th>Accepter</th>
        <th>Refuser</th>
    </tr>
</tfoot>
    ";
    $conge= conge::getAll_enCours();
    if(count($conge)==0){
        echo "<tr class=\"odd\"><td valign=\"top\" colspan=\"6\" class=\"dataTables_empty\">No matching records found</td></tr>";
    }else{
        echo "<tbody>";
        foreach($conge as $CG){
            $employee= Employe::getOne($CG['idEmploye']);
            echo "<tr class=\"\">
                    <td class=\"\">".$CG['idConge']."</td>
                     <td >".$employee['Nom']." ".$employee['Prenom']."</td>
                     <td >".$CG['DateDebut']."</td>
                     <td >".$CG['DateRetour']."</td>
                     <td >".$CG['typeConge']."</td>
                     <td ><div class=\"\" href=\"\"><button class=\"btn text-success\" onclick=\"accepter(2,".$CG['idConge'].")\"><i class=\"fa fa-check\"></i></button></div></td>
                     <td ><div><button class=\"btn text-danger fs-1 text-danger fw-bold\" onclick=\"refuser(2,".$CG['idConge'].")\" >X</button></div></td>

                </tr>";
        }
        echo "</tbody>";
    }
    
}



if($type==4)
{
$rst=absence::accepter($id);

echo '
<div class="table-responsive">
<table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
<tr>
<th>ID</th>
    <th>Employe</th>
    <th>nombres d\'heures</th>
    <th>Date</th>
    <th>justificatif</th>
    <th>accepter</th>
    <th>refuser</th>
</tr>
</thead>
<tfoot>
<tr>
    <th>ID</th>
    <th>Employe</th>
    <th>nombres d\'heure</th>
    <th>Date</th>
    <th>justificatif</th>
    <th>accepter</th>
    <th>refuser</th>
</tr>
</tfoot>
';

$abs= absence::getAll_enAttente();

if(count($abs)==0){
    echo "<tr class=\"odd\"><td valign=\"top\" colspan=\"6\" class=\"dataTables_empty\">No matching records found</td></tr>";
}else{
    echo "<tbody>";
    foreach($abs as $ab){
        $employee= Employe::getOne($ab['idEmploye']);
        echo "<tr class=\"\">
                <td class=\"\">".$ab['idAbsence']."</td>
                 <td >".$employee['Nom']." ".$employee['Prenom']."</td>
                 <td >".$ab['nbrHeure']."</td>
                 <td >".$ab['date']."</td>
                 <td ><a href=\"include/ABS_justif/".$ab['justification']."\">Voir justificatif</a></td>
                 <td ><div ><button class=\"btn text-success\" onclick=\"accepter(4,".$ab['idAbsence'].")\"><i class=\"fa fa-check\"></i></button></div></td>
                 <td ><div><button class=\"btn text-danger fs-1 text-danger fw-bold\" onclick=\"refuser(4,".$ab['idAbsence'].")\" >X</button></div></td>

                 </tr>";
    }
    echo "</tbody></div></table";
}
}

if ($type==6) {
    $avance= avance::accepter($id);
    echo "
    <thead>
    <tr>
        <th>IdAvance</th>
        <th>Date de Deamnde</th>
        <th>Montant</th>
        <th>Accepter</th>
        <th>Refuser</th>
    </tr>
</thead>
<tfoot>
    <tr>
    <th>IdAvance</th>
        <th>Date de Deamnde</th>
        <th>Montant</th>
        <th>Accepter</th>
        <th>Refuser</th>
    </tr>
</tfoot>
    ";
    $avance= avance::getAll_enCours();
    if(count($avance)==0){
        echo "<tr class=\"odd\"><td valign=\"top\" colspan=\"6\" class=\"dataTables_empty\">No matching records found</td></tr>";
    }else{
        foreach($avance as $avc){
                echo "<tr class=\"\">
                    <td class=\"\">".$avc['idAvance']."</td>
                    <td class=\"\">".$avc['dateDemande']."</td>
                     <td >".$avc['avance']."</td>
                     <td ><div class=\"\" href=\"\"><button class=\"btn text-success\" onclick=\"accepter(6,".$avc['idAvance'].")\"><i class=\"fa fa-check\"></i></button></div></td>
                     <td ><div><button class=\"btn text-danger fs-1 text-danger fw-bold\" onclick=\"refuser(6,".$avc['idAvance'].")\" >X</button></div></td>";
                echo "</tr>";
            
        }
    }
    
}
?>