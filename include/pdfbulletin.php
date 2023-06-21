<?php
require_once("dbaccess.php");
require_once('employe.php');
session_start();
    function fetchdata(){
        
        $employe = Employe::getOne($_SESSION['id']);

        // Current month and year
        $currentMonth = date('m');
        $currentYear = date('Y');

        $dba = new Dbaccess();


        $prixhs = 0;
        $dba->query("select * from hs where idEmploye = '".$_SESSION['id']."'");
        $hss = $dba->resultSet();
        $nbrhs = 0;
        foreach($hss as $hs){

            $dateToCheck = $hs['datehs'];


            // Get the month and year of the date to check
            $dateMonth = date('m', strtotime($dateToCheck));
            $dateYear = date('Y', strtotime($dateToCheck));

            // Check if the date is within the current month
            if ($dateMonth == $currentMonth && $dateYear == $currentYear){
                $nbrhs += $hs['nbrheures'];
            }
            
        }
        $prixhs = $nbrhs * ($employe['SalairedeBase'] / 208) * 1.5 ;


        $prixprime = 0;
        $dba->query("select * from prime where idEmploye = '".$_SESSION['id']."'");
        $primes = $dba->resultSet();
        foreach($primes as $prime){

            $dateToCheck = $prime['datePrime'];


            // Get the month and year of the date to check
            $dateMonth = date('m', strtotime($dateToCheck));
            $dateYear = date('Y', strtotime($dateToCheck));

            // Check if the date is within the current month
            if ($dateMonth == $currentMonth && $dateYear == $currentYear){
                $prixprime += $prime['prime'];
            }
            
        }


        $prixindemnite = 0;
        $dba->query("select * from indemnite where idEmploye = '".$_SESSION['id']."'");
        $indemnites = $dba->resultSet();
        foreach($indemnites as $indemnite){

            $dateToCheck = $indemnite['dateindemnite'];


            // Get the month and year of the date to check
            $dateMonth = date('m', strtotime($dateToCheck));
            $dateYear = date('Y', strtotime($dateToCheck));

            // Check if the date is within the current month
            if ($dateMonth == $currentMonth && $dateYear == $currentYear){
                $prixindemnite += $indemnite['montant'];
            }
            
        }

        $salairebrute = $employe['SalairedeBase'] + $prixindemnite + $prixprime + $prixhs ;

        $allocationfam = 0;
        if($employe['NbEnfants'] >= 6){
            $allocationfam += 3 * 36 ;
            $allocationfam += 3 * 300 ;
        }else if($employe['NbEnfants'] > 3){
            $allocationfam += ($employe['NbEnfants'] - 3 ) * 36 ;
            $allocationfam += 3 * 300 ;
        }else{
            $allocationfam += $employe['NbEnfants'] * 300 ;
        }
        $sbi = $salairebrute - $allocationfam ;

        $cnss = 0;
        if($sbi >= 6000){
            $cnss = 268.8;
        } 
        else{
            $cnss = $sbi * 0.0448;
        }
        
        $amo = $sbi * 0.0226;

        $cimr = $sbi * 0.06;

        $sni = $sbi - $cnss - $amo - $cimr ;

        if($sni>=0 && $sni <= 2500) $irb = ($sni * 0) - 0 ;
        else if($sni>=2501 && $sni <= 4166.66) $irb = ($sni * 0.1) - 250 ;
        else if($sni>=4166.67 && $sni <= 5000) $irb = ($sni * 0.2) - 666.67 ;
        else if($sni>=5001 && $sni <= 6666.66) $irb = ($sni * 0.3) - 1166.67 ;
        else if($sni>=6666.67 && $sni <= 15000) $irb = ($sni * 0.34) - 1433.33 ;
        else if($sni>=15001) $irb = ($sni * 0.38) - 2033.33 ;
        
        

        if($employe['NbEnfants'] > 6){
            $chargefam = 180;
        }else{
            $chargefam = $employe['NbEnfants']*30;
        }
        

        $irn = $irb - $chargefam ;

        $salairenet = $salairebrute - $cnss - $amo - $cimr - $irn ;


        $output = '';
        $output .= "<h1>Bulletin de paie</h1>
                    <p>Date : ".date("Y-M-D")." </p>
                    <p>ID Employe : ".$employe['idEmploye']." </p>
                    <p>Nom : ".$employe['Nom']." </p>
                    <p>Prenom : ".$employe['Prenom']." </p>
                    <p>Nombre d'enfants : ".$employe['NbEnfants']." </p>
                    <br>
                    <p>Indemnite : ".number_format($prixindemnite, 2)." DH</p>
                    <p>Prime : ".number_format($prixprime, 2)." DH</p>
                    <p>HS : ".number_format($prixhs, 2)." DH</p>
                    <p>CNSS : ".number_format($cnss, 2)." DH</p>
                    <p>AMO : ".number_format($amo, 2)." DH</p>
                    <p>CIMR : ".number_format($cimr, 2)." DH</p>
                    <br>
                    <p>Allocation familiales : $allocationfam DH</p>
                    <p>Charges familiales : $chargefam DH</p>
                    <br>
                    <p>Salaire de base : ".$employe['SalairedeBase']." DH</p>
                    <p>Salaire brute : ".number_format($salairebrute, 2)." DH</p>
                    <p>Salaire brute imposable : ".number_format($sbi, 2)." DH</p>
                    <p>Salaire net imposable : ".number_format($sni, 2)." DH</p>
                    <br>
                    <p>Impot sur le revenue brute : ".number_format($irb, 2)." DH</p>
                    <p>Impot sur le revenue net : ".number_format($irn, 2)." DH</p>
                    <br>
                    <p>Salaire net = ".number_format($salairenet, 2)." DH</p>

                    ";

        return $output;
    }
    require_once('tcpdf_min/tcpdf.php');  
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("BulletinPaie");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage(); 
      $content = '';
      $content .= fetchdata();
      ob_end_clean();
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('BulletinPaie.pdf', 'I');

?>