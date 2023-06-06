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

    <title>SB Admin 2 - Tables</title>

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
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="RHhome.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-building"></i>
                </div>
                <div class="sidebar-brand-text mx-3">LMAD</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="RHhome.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="RHEntreprise.php">
                    <i class="fa fa-building"></i>
                    <span>Entreprise</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="RHEmploye.php">
                    <i class="fa fa-male"></i>
                    <span>Employe</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="RHverify.php">
                    <i class="fa fa-check-square"></i>
                    <span>Verify</span></a>
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
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
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
                                <a class="dropdown-item" href="profileadmin.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
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
                        <h1 class="h3 mb-0 text-gray-800">Verification des reclamations</h1>
                    </div>

                    <!-- data -->
                    <div class="card text-center">
                        
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li  class="nav-item"  onclick="showReclamation(0)">
                                    <div style="cursor: pointer;" id="btn_verify_1" class="nav-link active" href="#">Reclamation</div>
                                </li>
                                <li  class="nav-item"  onclick="showReclamation(1)">
                                    <div style="cursor: pointer;" id="btn_verify_2" class="nav-link ">Heures Sup</div>
                                </li>
                                <li  class="nav-item"  onclick="showReclamation(2)">
                                    <div style="cursor: pointer;" id="btn_verify_3" class="nav-link ">Demande Avances</div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <!-- <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            <div class="card-body">
                            <div class="table-responsive">
                                <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                        $reclamation = reclamation::getAll_RH();

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
                                                     <td ><d class=\"\" ><button class=\"btn text-success\" onclick=\"accepter(0,".$rec['idReclamation'].")\" ><i class=\"fa fa-check\"></i></button></div></td>
                                                     <td ><a class=\"\" href=\"\"><button class=\"btn text-danger fs-1 text-danger fw-bold\">X</button></a></td>
                                                </tr>";
                                                echo '
                                                <div class="modal fade" id="RecModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    
                

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="include/logout.php">Logout</a>
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

    <script src="js/AJAX.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>