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
            <li class="nav-item active">
                <a class="nav-link" href="RHEntreprise.php">
                    <i class="fa fa-building"></i>
                    <span>Entreprise</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="RHEmploye.php">
                    <i class="fa fa-male"></i>
                    <span>Employe</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
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
                        <h1 class="h3 mb-0 text-gray-800">Gestion des Employés</h1>
                        <a href="RHaddEmploye.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fa fa-plus fa-sm text-white-50"></i> Ajouter un employe</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Employe</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Tel</th>
                                            <th>sexe</th>
                                            <th>role</th>
                                            <th>adresse</th>
                                            <th>Diplome</th>
                                            <th>Date de Naissance</th>
                                            <th>Date de Cr2ation</th>
                                            <th>ID Createur</th>
                                            <th>Salaire de Base</th>
                                            <th>Nombre d'enfants</th>
                                            <th>Date d'Embauche</th>
                                            <th>Numero CNSS</th>
                                            <th>Numero AMO</th>
                                            <th>Numero IGR</th>
                                            <th>Numero CIMR</th>
                                            <th>ID d'entreprise</th>
                                            <th>Editer</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>ID</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Tel</th>
                                            <th>sexe</th>
                                            <th>role</th>
                                            <th>adresse</th>
                                            <th>Diplome</th>
                                            <th>Date de Naissance</th>
                                            <th>Date de Cr2ation</th>
                                            <th>ID Createur</th>
                                            <th>Salaire de Base</th>
                                            <th>Nombre d'enfants</th>
                                            <th>Date d'Embauche</th>
                                            <th>Numero CNSS</th>
                                            <th>Numero AMO</th>
                                            <th>Numero IGR</th>
                                            <th>Numero CIMR</th>
                                            <th>ID d'entreprise</th>
                                            <th>Editer</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        require_once('include/employe.php');

                                        $employes = Employe::getAll();

                                        foreach($employes as $employe){
                                            echo "<tr>
                                                     <td>".$employe['idEmploye']."</td>
                                                     <td>".$employe['Nom']."</td>
                                                     <td>".$employe['Prenom']."</td>
                                                     <td>".$employe['Email']."</td>
                                                     <td>".$employe['Password']."</td>
                                                     <td>".$employe['Tel']."</td>
                                                     <td>".$employe['sexe']."</td>
                                                     <td>".$employe['role']."</td>
                                                     <td>".$employe['address']."</td>
                                                     <td>".$employe['Diplome']."</td>
                                                     <td>".$employe['DateNaissance']."</td>
                                                     <td>".$employe['DateCreation']."</td>
                                                     <td>".$employe['idCreateur']."</td>
                                                     <td>".$employe['SalairedeBase']."</td>
                                                     <td>".$employe['NbEnfants']."</td>
                                                     <td>".$employe['DateEmbauche']."</td>
                                                     <td>".$employe['numCNSS']."</td>
                                                     <td>".$employe['numAmo']."</td>
                                                     <td>".$employe['numIGR']."</td>
                                                     <td>".$employe['numCIMR']."</td>
                                                     <td>".$employe['idEntreprise']."</td>
                                                     <td><a href='RHupdateentreprise.php?idEmploye=".$employe['idEmploye'].
                                                     "&Nom=".$employe['Nom'].
                                                     "&Prenom=".$employe['Prenom'].
                                                     "&Email=".$employe['Email'].
                                                     "&Password=".$employe['Password'].
                                                     "&Tel=".$employe['Tel'].
                                                     "&sexe=".$employe['sexe'].
                                                     "&role=".$employe['role'].
                                                     "&address=".$employe['address'].
                                                     "&Diplome=".$employe['Diplome'].
                                                     "&DateNaissance=".$employe['DateNaissance'].
                                                     "&DateCreation=".$employe['DateCreation'].
                                                     "&idCreateur=".$employe['idCreateur'].
                                                     "&SalairedeBase=".$employe['NbEnfants'].
                                                     "&SalairedeBase=".$employe['DateEmbauche'].
                                                     "&SalairedeBase=".$employe['numCNSS'].
                                                     "&SalairedeBase=".$employe['numAmo'].
                                                     "&SalairedeBase=".$employe['numIGR'].
                                                     "&SalairedeBase=".$employe['numCIMR'].
                                                     "&SalairedeBase=".$employe['idEntreprise'].
                                                     "' class='btn btn-warning btn-circle btn-sm'><i class='fas fa-exclamation-triangle'></i></a></td>
                                                     <td><a href='include/deleteentreprise.php?idEmploye=".$employe['idEmploye'].
                                                     "' class='btn btn-danger btn-circle btn-sm'><i class='fas fa-trash'></i></a>
                                                     </td>
                                                </tr>";
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>