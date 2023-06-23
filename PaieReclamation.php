<?php
    require('include/redirect.php');
    require('include/RPvalidation.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Affecter un regle</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul style="background-color: #8A61B1;" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="PaieHome.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-building"></i>
                </div>
                <div class="sidebar-brand-text mx-3">LMAD</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="PaieHome.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de Bord</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="PaieRubrique.php">
                    <i class="fa fa-file-contract"></i>
                    <span>Rubrique</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="PaieRegle.php">
                    <i class="fa fa-percent"></i>
                    <span>Affecter regle</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="PaieReclamation.php">
                    <i class="fa fa-comments"></i>
                    <span>Reclamation</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="Employe.php">
                    <i class="fa fa-desktop"></i>
                    <span>Interface employe</span></a>
            </li>


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
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn " style="background-color: #8A61B1;" type="button">
                                    <i class="fas fa-search fa-sm text-light" ></i>
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
        <a class="dropdown-item" id="log" href="PaieProfile.php">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
        </a>
        <div class="dropdown-divider"></div>
        <style>
            #log:active{
                  background-color: #8A61B1;
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
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Gestion des Reclamations</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold " style="color: #8A61B1;">Reclamation</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    <tbody  >
                                    <?php
                                        //  <td><a href='RHupdateentreprise.php?idEntreprise=".$entreprise['idEntreprise']."&nomEntreprise=".$entreprise['nomEntreprise']."&address=".$entreprise['address']."&createdBy=".$entreprise['createdBy']."&createDate=".$entreprise['createDate']."' class='btn btn-warning btn-circle btn-sm'><i class='fas fa-exclamation-triangle'></i></a></td>
                                        //  <td><a href='include/deleteentreprise.php?idEntreprise=".$entreprise['idEntreprise']."' class='btn btn-danger btn-circle btn-sm'><i class='fas fa-trash'></i></a></td>
                                        require_once('include/reclamation.php');
                                        require_once('include/employe.php');
                                        $reclamation = reclamation::getAll_RP();
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
                                                     <td ><div class=\"\" ><button class=\"btn text-success\" onclick=\"accepter(-1,".$rec['idReclamation'].")\" ><i class=\"fa fa-check\"></i></button></div></td>
                                                     <td ><div><button class=\"btn text-danger fs-1 text-danger fw-bold\" onclick=\"refuser(-1,".$rec['idReclamation'].")\" >X</button></div></td>
                                                </tr>";
                                                echo '
                                                <div class="modal fade" id="RecModal_'.$rec['idReclamation'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                            <p>'.$rec['description'].'</p>
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
                <a class="btn btn-primary" href="include/logout.php" style="background-color:#8A61B1; border-color:#8A61B1">se Déconnecter</a>
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
    <script src="js/AJAXv2.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>