
<?php

require_once('../../include/dbaccess.php');

$type = intval($_GET['type']);


require_once('../../include/reclamation.php');
require_once('../../include/employe.php');
require_once('../../include/HeureSup.php');
require_once('../../include/conges.php');
require_once('../../include/absence.php');
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
                 <td class=\"\" ><button class=\"btn text-success\" onclick=\"accepter(0,".$rec['idReclamation'].")\" ><i class=\"fa fa-check\"></i></button></div></td>
    
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
                 <td ><div><button class=\"btn text-danger fs-1 text-danger fw-bold\"onclick=\"refuser(0,".$rec['idReclamation'].")\" >X</button></div></td>
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
        <th>nombres d'heures</th>
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
                     <td ><div><button class=\"btn text-danger fs-1 text-danger fw-bold\" onclick=\"refuser(1,".$H['idHs'].")\" >X</button></div></td>
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
                     <td ><div ><button class=\"btn text-success\" onclick=\"accepter(2,".$CG['idConge'].")\"><i class=\"fa fa-check\"></i></button></div></td>
                     <td ><div><button class=\"btn text-danger fs-1 text-danger fw-bold\" onclick=\"refuser(2,".$CG['idConge'].")\" >X</button></div></td>

                </tr>";
        }
        echo "</tbody>";
    }
    
}

if($type==3 || $type==5)
{
echo '<div id="btn_abs" class="btn-group mb-4 w-100" role="group" aria-label="Basic example">
<button onclick="showAbsence(3)" id="absNJ" type="button" class="  btn ';
if($type==3)
echo "active_abs";
else
echo "btn-primary";
 echo ' ">Non Justifier</button>
<button onclick="showAbsence(4)" id="absT" type="button" class="btn btn-primary ">En attente
<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
'.absence::count_enAttent().'
  </span></button>
<button onclick="showAbsence(5)" id="absJ" type="button" class="btn ';
if($type==3)
echo "btn-primary";
else
echo "active_abs";
 echo ' ">Justifier</button>
</div>';


echo '
<div class="table-responsive">
<table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
<tr>
    <th>ID</th>
    <th>Employe</th>
    <th>nombres d\'heures</th>
    <th>Date</th>
</tr>
</thead>
<tfoot>
<tr>
    <th>ID</th>
    <th>Employe</th>
    <th>nombres d\'heure</th>
    <th>Date</th>
</tr>
</tfoot>
';
if($type==3)
$abs= absence::getAll_NonJustifier();
else
$abs= absence::getAll_Justifier();

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
                 </tr>";
    }
    echo "</tbody></div></table";
}
}




if($type==4)
{
    echo '<div id="btn_abs" class="btn-group mb-4 w-100" role="group" aria-label="Basic example">
    <button onclick="showAbsence(3)" id="absNJ" type="button" class="  btn btn-primary ">Non Justifier</button>
    <button onclick="showAbsence(4)" id="absT" type="button" class="btn active_abs ">En attente
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    '.absence::count_enAttent().'
  </span>
    </button>
    <button onclick="showAbsence(5)" id="absJ" type="button" class="btn btn-primary">Justifier</button>
    </div>';
    
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
                 <td >".$ab['justification']."</td>
                 <td ><div ><button class=\"btn text-success\" onclick=\"accepter(4,".$ab['idAbsence'].")\"><i class=\"fa fa-check\"></i></button></div></td>
                 <td ><div><button class=\"btn text-danger fs-1 text-danger fw-bold\" onclick=\"refuser(4,".$ab['idAbsence'].")\" >X</button></div></td>

                 </tr>";
    }
    echo "</tbody></div></table";
}
}
?>
