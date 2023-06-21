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

    <title>Ajouter des Employe</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href=" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
       
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleFormEmploye.css">
    </head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion w-30" id="accordionSidebar">

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
                    <span>Tableau de Bord</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="RHEntreprise.php">
                    <i class="fa fa-building"></i>
                    <span>Entreprise</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="RHEmploye.php">
                    <i class="fa fa-male"></i>
                    <span>Employe</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="RHverify.php">
                    <i class="fa fa-check-square"></i>
                    <span>Vérifié</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="Employe.php">
                    <i class="fa fa-check-square"></i>
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
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..."
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
                                    Se Déconnecter
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
                        <h1 class="h3 mb-0 text-gray-800">Ajouter des Employés</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Entrer les informations sur Employé</h6>
                        </div>

 <!-- MultiStep Form -->
<div class="container-fluid bg-gradient-primary">
    <div class="row justify-content-center mt-0 ">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2 ">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Ajouter informations d'un employé</strong></h2>
                <p>Remplissez tous les champs du formulaire pour passer à l'étape suivante </p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" method="post" action="include/confirmeEmploye.php">
                            <!-- progressbar -->
                            <ul id="progressbar">
                            <li class="active" id="personal"><strong>Personnel</strong></li>
                             
                                <li id="professionnel"><strong>Professionnel</strong></li>
                                <li id="couvertureSociale"><strong>Couverture Sociale</strong></li>
                                <li id="confirm"><strong>Finir</strong></li>
                            </ul>
                            
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Informations Personnelles</h2>
                                    <input type="text" name="prenom" placeholder="Prenom" required/>
                                    <input type="text" name="nom" placeholder="Nom" required/>
                                    <div>
                                            <input type="text" class="form-control form-control-user" id="exampleLastName"
                                                placeholder="Date de Naissance" name="DateNaissance" onfocus="(this.type='date')" required>
                                    </div>
                                    <input type="email"  name="email"     placeholder="Email Id" required/>
                                    <input type="phone"  name="tel"       placeholder="Téléphone" required/>
                                    <input type="adress" name="adress"    placeholder="Adresse" required/>
                                    <input type="text"   name="nbEnfant"  placeholder="Nombre d'Enfants" required/>
                                    <label for="formFile" style="color:black; font-family:times new roman; font-size:17px;margin-left:9px;">  Choisir une image :</label>
                                    <input class="form-control" type="file" id="formFile" style="color:gray;" name="image" required> 
                                    <select name="sexe" id="" style="color:gray;" required>
                                        <option value="Femme" style="color:black;" selected>Femme</option>
                                        <option value="Homme" style="color:black;">Homme</option>
                                    </select>                                                                                                         
                                </div>
                                <input type="button" name="next" class="next action-button" value="Suivant"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Informations Professionnelles</h2>
                                    <input type="text" name="diplome" placeholder="Diplome" required/>
                                    <input type="text" name="salaireBase" placeholder="Salaire de Base" required/>
                                    <input type="text" name="rib" placeholder="RIB" required/>
                                    <div class="">
                                            <input type="text" class="form-control form-control-user" id="exampleLastName"
                                                placeholder="Date d'Embauche" name="DateEmbauche" onfocus="(this.type='date')" required>
                                    </div>
                                    <div style="border-bottom:1px solid gray;padding:10px;">
                                    <span style="font-family:Times new roman; font-size:17px;">Identificateur d'Entreprise : </span>
                                    <select name="idEntreprise" id="" required>
                                   <?php 
                                   require_once("include/entreprise.php");
                                   $identreprise=entreprise::getAll();
                                   foreach ($identreprise as $entre)
                                   {
                                    echo "<option>$entre[idEntreprise]</option>";
                                   }
                                   ?>
                                   </select>
                                   </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Précédent"/>
                                <input type="button" name="next" class="next action-button" value="Suivant"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Couverture Sociale</h2>
                                    <span style="color:black;font-weight:bold;font-size:15px;"> Numero CNSS : </span>
                                    <input type="text" name="numCNSS" value=0 style="color:gray;" required/>
                                    
                                    <span style="color:black;font-weight:bold;font-size:15px;">Numero AMO :</span>
                                    <input type="text" name="numAmo"   value=0 style="color:gray;" required/>
                                    
                                    <span style="color:black;font-weight:bold;font-size:15px;">Numero IGR :</span>
                                    <input type="text" name="numIGR"  value=0 style="color:gray;" required/>
                                    
                                    <span style="color:black;font-weight:bold;font-size:15px;"> Numero CIMR :</span>
                                    <input type="text" name="numCIMR" value=0 style="color:gray;" required/>
                                  
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" id="prec" value="Précédent"/>
                                <input type="submit" name="addEmploye" class="next action-button" id="sub" value="Confirmer"/>
                                </fieldset>
                                <?php
                                if (isset($_COOKIE['name']) && $_COOKIE['name'] == 'true')
                                 {
                                    echo ' <fieldset id="success-card">
                                    <div class="form-card">
    
                                                    <h2 class="fs-title text-center">Réussie !</h2>
                                                    <br><br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-3">
                                                            <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-7 text-center">
                                                            <h5>L\'ajout de l\'employé est sauvegardé avec succès</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                    </fieldset>';
                                 }
                                 else 
                                 {
                                    echo '<fieldset>
                                                    <div class="form-card">
                                                        <h2 class="fs-title text-center">Échec !</h2>
                                                        <br><br>
                                                        <div class="row justify-content-center">
                                                            <div class="col-3">
                                                                <img src="https://img.icons8.com/color/96/000000/error.png" class="fit-image">
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="row justify-content-center">
                                                            <div class="col-7 text-center">
                                                                <h5>Échec lors de l\'ajout de l\'employé</h5>
                                                                <p>Veuillez réessayer ultérieurement.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>';
                                 }
                                ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> </div>



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
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                <a class="btn btn-primary" href="include/logout.php">se Déconnecter</a>
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

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" ></script>

    <script src="JsAddEmploye.js"></script>
    <script>
    // Fonction pour valider le formulaire avant de le soumettre
    function validateForm() {
        // Récupérer tous les champs d'entrée requis dans le formulaire
        var inputs = document.querySelectorAll('input[required], select[required]');
        
        // Parcourir tous les champs d'entrée
        for (var i = 0; i < inputs.length; i++) {
            var input = inputs[i];
            
            // Vérifier si le champ est vide ou a une valeur non valide
            if (input.value.trim() === '' || !input.checkValidity()) {
                // Afficher un message d'erreur approprié
                alert('Veuillez remplir tous les champs correctement avant de confirmer.');
                
                // Masquer la carte de réussite
                document.getElementById('success-card').style.display = 'none';
                
                // Empêcher l'envoi du formulaire
                return false;
            }
        }
        
        // Si tous les champs sont valides, soumettre le formulaire
        return true;
    }
    
    // Ajouter un gestionnaire d'événement pour le clic sur le bouton "Confirmer"
    var confirmButton = document.querySelector('input[name="addEmploye"]');
        confirmButton.addEventListener('click', function(event) {
            var stat = validateForm();
            if (stat) {
                document.cookie = "name=" + encodeURIComponent(stat) + "; path=/";
            }
        });
</script>


</body>
</html>