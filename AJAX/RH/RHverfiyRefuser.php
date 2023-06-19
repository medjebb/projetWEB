
<?php

require_once('C:\wamp64\www\projetWEB\include\dbaccess.php');

$id = intval($_GET['id']);
$type = intval($_GET['type']);
require_once('C:\wamp64\www\projetWEB\include\reclamation.php');
require_once('C:\wamp64\www\projetWEB\include\employe.php');
require_once('C:\wamp64\www\projetWEB\include\HeureSup.php');
require_once('C:\wamp64\www\projetWEB\include\avance.php');



if ($type==0) {
    $rst=reclamation::refuser($id);
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
                 <td >".$rec['objet']."</td>
                 <td >".$rec['date']."</td>
                 <td ><div class=\"\" ><button class=\"btn text-success\" onclick=\"accepter(0,".$rec['idReclamation'].")\" ><i class=\"fa fa-check\"></i></button></div></td>
                     
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
                 <td ><div><button class=\"btn text-danger fs-1 text-danger fw-bold\" onclick=\"refuser(0,".$rec['idReclamation'].")\" >X</button></div></td>
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
                     <td ><a class=\"\" href=\"\"><button class=\"btn text-success\" ><i class=\"fa fa-check\" onclick=\"accepter(1,".$H['idHs'].")\"></i></button></a></td>
                     <td ><a class=\"\" href=\"\"><button class=\"btn text-danger fs-1 text-danger fw-bold\" onclick=\"refuser(1,".$H['idHs'].")\" >X</button></a></td>
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



?>