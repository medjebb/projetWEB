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
        $output .= "
                    <p>Date : ".date("Y-M-D")." </p>
                    <p>ID Employe : ".$employe['idEmploye']." </p>
                    <p>Nom : ".$employe['Nom']." </p>
                    <p>Prenom : ".$employe['Prenom']." </p>
                    <p>Nombre d'enfants : ".$employe['NbEnfants']." </p>
                    <p>------------------------------------------------------------------------------------------------------------------------------</p>
                    <style>
                    table{
                        padding : 10px;
                    }
                    </style>
                    <table>
                        <tr>
                            <td><p>Indemnite : ".number_format($prixindemnite, 2)." DH</p></td>
                            <td><p>AMO : ".number_format($amo, 2)." DH</p></td>
                        </tr>
                        <tr>
                            <td><p>Prime : ".number_format($prixprime, 2)." DH</p></td>
                            <td><p>CIMR : ".number_format($cimr, 2)." DH</p></td>
                        </tr>
                        <tr>
                            <td><p>HS : ".number_format($prixhs, 2)." DH</p></td>
                            <td><p>Allocation familiales : $allocationfam DH</p></td>
                        </tr>
                        <tr>
                            <td><p>CNSS : ".number_format($cnss, 2)." DH</p></td>
                            <td><p>Charges familiales : $chargefam DH</p></td>
                        </tr>
                    </table>
                    
                    <p>------------------------------------------------------------------------------------------------------------------------------</p>
                    <p>Salaire de base : ".$employe['SalairedeBase']." DH</p>
                    <p>Salaire brute : ".number_format($salairebrute, 2)." DH</p>
                    <p>Salaire brute imposable : ".number_format($sbi, 2)." DH</p>
                    <p>Salaire net imposable : ".number_format($sni, 2)." DH</p>
                    <p>------------------------------------------------------------------------------------------------------------------------------</p>
                    <p>Impot sur le revenue brute : ".number_format($irb, 2)." DH</p>
                    <p>Impot sur le revenue net : ".number_format($irn, 2)." DH</p>
                    <p>------------------------------------------------------------------------------------------------------------------------------</p>
                    <p>Salaire net = ".number_format($salairenet, 2)." DH</p>

                    ";

        return $output;
    }
    require_once('tcpdf_min/tcpdf.php');  
    define('PDF_LOGO', 'logo.jpg');
    define('HEADER_TITLE', 'Bulletin de paie');
    define('HEADER_STARTING', 'LMAD Company');

    $currentMonth = date('m');
    $currentYear = date('Y');
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('LMAD Company');
    $pdf->SetTitle('Bulletin');
    $pdf->SetSubject('Bulletin de paie');
    // set default header data
    $pdf->SetHeaderData(PDF_LOGO, PDF_HEADER_LOGO_WIDTH, HEADER_TITLE.' N°001', HEADER_STARTING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128));
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }
    // ---------------------------------------------------------
    // set default font subsetting mode
    $pdf->setFontSubsetting(true);
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('helvetica', '', 12, '', true);
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();
    // set text shadow effect
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

    $content = '';
    $content .= fetchdata();
    // Set some content to print
    $html = 
    <<<EOD
    $content
    EOD;
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    // Save pdf
    $file_name = "bulletin_".$currentMonth."_".$currentYear."_".$_SESSION['id'];
    $pdf->Output(dirname(__FILE__).'/bulletins/'.$file_name.'.pdf','F');
    $pdf->Output($file_name.'.pdf', 'I');
    

?>