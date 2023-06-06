
<?php

require_once('C:\xampp\htdocs\projetWEB\include\dbaccess.php');

$type = intval($_GET['type']);


require_once('C:\xampp\htdocs\projetWEB\include\reclamation.php');
require_once('C:\xampp\htdocs\projetWEB\include\employe.php');
require_once('C:\xampp\htdocs\projetWEB\include\HeureSup.php');
require_once('C:\xampp\htdocs\projetWEB\include\avance.php');
require_once('C:\xampp\htdocs\projetWEB\include\conges.php');

if ($type==0) {
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
    $reclamation = reclamation::getAll_RH();
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
                <a class=\"dropdown-item\" href=\"#\" data-toggle=\"modal\" data-target=\"#RecModal\">
                 <i class=\"fas fa-eye fa-sm fa-fw mr-2 text-gray-400\"></i>
                </a>
                </div>

                 </div>
                 </td>
                 <td >".$rec['date']."</td>
                 <td >
                 <a class=\"\" href=\"\"><button class=\"btn text-success\" ><i class=\"fa fa-check\"></i></button></a>
                 <div class=\"modal fade\" id=\"RecModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\"
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
                 </td>
                 <td ><a class=\"\" href=\"\"><button class=\"btn text-danger fs-1 text-danger fw-bold\">X</button></a></td>
            </tr>";
    }
    echo "</tbody>";
}

}


if ($type==1) {

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
                     <td ><a class=\"\" href=\"\"><button class=\"btn text-success\" ><i class=\"fa fa-check\"></i></button></a></td>
                     <td ><a class=\"\" href=\"\"><button class=\"btn text-danger fs-1 text-danger fw-bold\">X</button></a></td>
                </tr>";
        }
        echo "</tbody>";
    }
    
}

if ($type==2) {

    echo "
    <thead>
    <tr>
        <th>ID</th>
        <th>Employe</th>
        <th>Montant</th>
        <th>Date de la demande</th>
        <th>Accepter</th>
        <th>Refuser</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>ID</th>
        <th>Employe</th>
        <th>Montant</th>
        <th>Date de la demande</th>
        <th>Accepter</th>
        <th>Refuser</th>
    </tr>
</tfoot>
    ";
    $avance= avance::getAll_enCours();
    if(count($avance)==0){
        echo "<tr class=\"odd\"><td valign=\"top\" colspan=\"6\" class=\"dataTables_empty\">No matching records found</td></tr>";
    }else{
        echo "<tbody>";
        foreach($avance as $AV){
            $employee= Employe::getOne($AV['idEmploye']);
            echo "<tr class=\"\">
                    <td class=\"\">".$AV['idAvance']."</td>
                     <td >".$employee['Nom']." ".$employee['Prenom']."</td>
                     <td >".$AV['avance']."</td>
                     <td >".$AV['dateDemande']."</td>
                     <td ><a class=\"\" href=\"\"><button class=\"btn text-success\" ><i class=\"fa fa-check\"></i></button></a></td>
                     <td ><a class=\"\" href=\"\"><button class=\"btn text-danger fs-1 text-danger fw-bold\">X</button></a></td>
                </tr>";
        }
        echo "</tbody>";
    }
    
}


if ($type==3) {

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
                     <td ><a class=\"\" href=\"\"><button class=\"btn text-success\" ><i class=\"fa fa-check\"></i></button></a></td>
                     <td ><a class=\"\" href=\"\"><button class=\"btn text-danger fs-1 text-danger fw-bold\">X</button></a></td>
                </tr>";
        }
        echo "</tbody>";
    }
    
}

?>