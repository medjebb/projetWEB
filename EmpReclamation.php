<?php
    require('include/redirect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul style="background-color: #ff5e37;" class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Employe.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-building"></i>
                </div>
                <div class="sidebar-brand-text mx-3">LMAD</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="Employe.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item ">
                <a class="nav-link collapsed " href="" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                    <span>Demander</span>
                </a>
                
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#collapsePages">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Employe pages:</h6>
                        <a class="collapse-item" href="EmpConge.php">Conge</a>
                        <a class="collapse-item" href="EmpAvance.php">Avance</a>
                        
                        <!-- <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a> -->
                    </div>
                </div>
            </li>

            <li class="nav-item active">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-folder"></i>
                    <span>Declarer</span>
                </a>
                
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Employe pages:</h6>
                        <a class="collapse-item" href="EmpReclamation.php"> Reclamation</a>
                        <a class="collapse-item" href="EmpHeuresSupp.php">Heures Supplementaires</a>
                        <!-- <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a> -->
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsevisuals"
                    aria-expanded="true" aria-controls="collapsevisuals">
                <i class="fas fa-fw fa-folder"></i>
                    <span>Visualiser</span>
                </a>
                
                <div id="collapsevisuals" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Employe pages:</h6>
                        <a class="collapse-item" href="EmpPrime.php">Primes</a>
                        <a class="collapse-item" href="EmpIndemnite.php">Indemnites</a>
                        <!-- <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a> -->
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="EmpAbsences.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Absences</span></a>
            </li>

            <?php if($_SESSION['role']=="RH"){
            echo "
                <li class='nav-item'>
                    <a class='nav-link' href='RHhome.php'>
                    <i class='fa fa-desktop'></i>
                    <span>Interface RH</span></a>
                </li>
                ";
            }else if($_SESSION['role'] =="Paie"){
                echo "
                    <li class='nav-item'>
                        <a class='nav-link' href='PaieHome.php'>
                        <i class='fa fa-desktop'></i>
                        <span>Interface RP</span></a>
                    </li>
                    ";
                }
            ?>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

       <!-- Content Wrapper -->
       <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars" style="color: #ff5e37;"></i>
            </button>
        </form>

        <!-- Topbar Search -->
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button style="background-color: #ff5e37;" class="btn" type="button">
                        <i class="fas fa-search fa-sm text-light"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></span>
                    <img class="img-profile rounded-circle"
                        src="img/pdp/<?php echo $_SESSION['image']; ?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="Empprofile.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profil
                    </a>
                    <div class="dropdown-divider"></div>
                    <style>
                #log:active{
                      background-color: #ff5e37;
                }
            </style>
                    <a class="dropdown-item" href="#" data-toggle="modal" id="log" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                       se Déconnecter
                    </a>
                </div>
            </li>

        </ul>

        </nav>
        <!-- End of Topbar -->

        <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Reclamation</h1>
    <a href="EmpAddReclamation.php" Style="background-color: #ff5e37; border-color:#ff5e37 ;" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fa fa-plus fa-sm text-white-50" ></i> Declarer Reclamation</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold " style="color: #ff5e37;">Declaration d'une Reclamation</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
    <th>ID</th>
    <th>Objet </th>
    <th>Date</th>
    <th>Responsable</th>
    <th>Status</th>
</tr>
</thead>
<tfoot>
<tr>
    <th>ID</th>
    <th>Objet </th>
    <th>Date</th>
    <th>Responsable</th>
    <th>Status</th>
</tr>
</tfoot>
<tbody  >
<?php
//  <td><a href='RHupdateentreprise.php?idEntreprise=".$entreprise['idEntreprise']."&nomEntreprise=".$entreprise['nomEntreprise']."&address=".$entreprise['address']."&createdBy=".$entreprise['createdBy']."&createDate=".$entreprise['createDate']."' class='btn btn-warning btn-circle btn-sm'><i class='fas fa-exclamation-triangle'></i></a></td>
//  <td><a href='include/deleteentreprise.php?idEntreprise=".$entreprise['idEntreprise']."' class='btn btn-danger btn-circle btn-sm'><i class='fas fa-trash'></i></a></td>
require_once('include/reclamation.php');
$Reclamation = reclamation::getById($_SESSION['id']);
foreach($Reclamation as $Rec){
    echo "<tr class=\"\">
            <td class=\"\">".$Rec['idReclamation']."</td>
            <td> 
            <div class=\"row\">
            <div class=\"col-10\">".$Rec['objet']."</div>
            
            <div class=\"col-2\">
           <a class=\"dropdown-item\" href=\"#\" data-toggle=\"modal\" data-target=\"#REC".$Rec['idReclamation']."\">
            <i class=\"fas fa-eye fa-sm fa-fw mr-2 text-gray-400\"></i>
           </a>
           </div>

            </div>
            </td>
            <td >".$Rec['date']."</td>";

            if($Rec['responsable']==0){
    echo "<td >Responsable RH</td>";
            }else{
    echo "<td >Responsable de paie</td>";
            }
            
             if ($Rec['status']==2) {
                echo '<td class="fw-bold text-secondary">En cours</td>';
             }
             if ($Rec['status']==1) {
                echo '<td class="fw-bold text-success">Accepter</td>';
             }
             if ($Rec['status']==0)
             {
                echo '<td class="fw-bolder text-danger">refuser</td>';
             }     
        echo "</tr>";
        echo '
                                                <div class="modal fade" id="REC'.$Rec['idReclamation'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Description de la reclamation</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <p>'.$Rec['description'].'</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>';

}
?>
</tbody>

</table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2023</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Prêt à partir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à mettre fin à votre session en cours.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal" >Annuler</button>
                <a class="btn btn-primary" href="include/logout.php" style="background-color:#ff5e37; border-color:#ff5e37">se Déconnecter</a>
            </div>
        </div>
        </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>