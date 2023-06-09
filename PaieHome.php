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
            <li class="nav-item active">
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

            <li class="nav-item">
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
                <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary"  style="background-color: #8A61B1;border-color:#8A61B1;" type="button">
                        <i class="fas fa-search fa-sm" ></i>
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
                    <h1 class="h3 mb-0 text-gray-800">Tableau de Bord</h1>
                    
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4" >
                        <div class="card  shadow h-100 py-2" style="border-left:5px solid #8A61B1;">
                            <div class="card-body" >
                                <div class="row no-gutters align-items-center" >
                                    <div class="col mr-2" >
                                        <div class="text-xs font-weight-bold  text-uppercase mb-1"  style="color: #8A61B1;">
                                          Primes (mensuels)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php 
                                        require_once("include/primes.php");
                                        $year=date('Y');
                                        $month=date('m');
                                        $prime = Prime::getBy_Month_Year($month,$year);
                                        echo "$prime (Dhs)";
                                        ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card  shadow h-100 py-2"style="border-left:5px solid #8A61B1;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color: #8A61B1;">
                                            Indemnités (mensuels)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php 
                                        require_once("include/indemnites.php");
                                        $indemnite = Indemnite::getBy_Month_Year($month,$year);
                                        echo "$indemnite (Dhs)";
                                        ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Earnings (Monthly) Card Example -->
                     <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card  shadow h-100 py-2"style="border-left:5px solid #8A61B1;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #8A61B1;">
                                            Avances (mensuels)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php 
                                        require_once("include/avance.php");
                                        $avance = avance::getBy_Month_Year($month,$year);
                                        echo "$avance (Dhs)";
                                           
                                        for ($i = 1; $i <= 12; $i++) {
                                            $tabAvc[] = avance::getBy_Month_Year($i,$year);
                                        }
                                        ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   <!-- Pending Requests Card Example -->
                   <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2"style="border-left:5px solid #8A61B1;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold  text-uppercase mb-1"  style="color: #8A61B1;">
                                         Reclamation en Attente</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php 
                                        require_once("include/reclamation.php");
                                        $Reclamation = reclamation::getAll_RP();
                                        $nbr1 = count($Reclamation);
                                        echo $nbr1;
                                        ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

                <!-- Content Row -->

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold"  style="color: #8A61B1;">Avances (Annuelles) </h6>
                                <div class="dropdown no-arrow">
                                    
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>



                <!-- Content Row -->
               <!-- Content Row -->
               <div class="row">

<!-- Content Column -->
<div class="col-lg-6 mb-4">

   <!-- Approach -->
   <!-- Illustrations -->
   <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold "  style="color: #8A61B1;">Diagrammes</h6>
        </div>
        <div class="card-body">
            <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                    src="img/undraw_data_reports_706v.svg" alt="...">
            </div>
            <p>Les diagrammes présents dans le tableau de bord vous permettent de suivre et d'analyser 
                vos données en un coup d'œil. Que ce soit des graphiques à barres, des graphiques circulaires 
                ou des graphiques en courbes, nous avons sélectionné les types de diagrammes les plus pertinents 
                pour vous aider à comprendre et à interpréter vos données.</p>
        </div>
    </div>
</div>

<div class="col-lg-6 mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold "  style="color: #8A61B1;">LMAD</h6>
        </div>
        <div class="card-body">
            <p>LMAD est une application web innovante conçue pour faciliter la gestion des employés, 
                des entreprises et aussi la gestion de la paie.
                 Grâce à ses fonctionnalités avancées, 
                LMAD permet aux responsables de gérer efficacement les ressources
                 humaines, les plannings, les congés et bien plus encore.
                  Cette application offre une interface conviviale et intuitive,
                   ce qui rend son utilisation simple et accessible à tous. 
                   Avec LMAD, les employés peuvent également accéder à leurs 
                   informations personnelles, demander des congés en quelques clics. Grâce à sa flexibilité 
                    et à ses fonctionnalités personnalisables, LMAD s'adapte facilement 
                    aux besoins spécifiques de chaque entreprise. Que ce soit pour 
                    les petites start-ups en plein essor ou pour les grandes entreprises 
                    établies, LMAD est l'outil idéal pour optimiser la gestion des ressources 
                    humaines et améliorer l'efficacité globale de l'entreprise.</p>
            
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

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <!-- Pour diagramme d'absence -->
        <!-- Pour diagramme d'absence -->
       <!-- Pour diagramme d'absence -->
       <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Fev", "Mar", "Avr", "Mai", "Jui", "Jui", "Aout", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Absences",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: <?php echo json_encode($tabAvc);?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return  number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

        </script>
</body>

</html>