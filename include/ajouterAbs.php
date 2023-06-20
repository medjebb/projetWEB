<?php
require_once('dbaccess.php');
require_once('employe.php');
require_once('absence.php');

$nbHeure = intval($_GET['nbHeure']);
$employeAbs = intval($_GET['employeAbs']);
$dateAbs = $_GET['dateAbs'];

$Abs= new absence($nbHeure,$employeAbs,$dateAbs);
$Abs->save();

echo '<div class="btn-group w-100" role="group" aria-label="Basic example">
<button type="button" class="  btn btn-primary">Non Justifier</button>
<button type="button" class="btn btn-primary ">En attente</button>
<button type="button" class="btn btn-primary">Justifier</button>
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
$abs= absence::getAll_NonJustifier();
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