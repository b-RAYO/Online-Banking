<?php
    require ('_include/dbconn.php');
    require ('_include/fpdf182/mysql_table.php');
    require ('accounts.php');

    $accno =$_SESSION ['account_no'];
    $date1=$_SESSION['date1'];
    $date2=$_SESSION['date2'];
    $branch_code = $accounts['branch_id'];
    $sql = "SELECT * FROM branches WHERE branch_id = '$branch_code'";
    $result = mysqli_query($con, $sql);
    $branch = mysqli_fetch_assoc($result);

    class PDF extends PDF_MySQL_Table
    {
        // Page header
        function Header()
        {
            // Logo
            $this->Image('logo2.png',10,6,30);
            // times bold 15
            $this->SetFont('times','B',15);
            // Move to the right
            $this->Cell(80,);
            // Title
            $this->Cell(30,10,'Account Statement',0,0,'C');
            // Line break
            $this->Ln(20);
        }

        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // times italic 8
            $this->SetFont('times','I',8);
            // Org footer
            $this->Cell(10,0,'Unaitas Sacco Society Limited',0,0,'L');
            // Page number
            $this->Cell(0,05,'Page '.$this->PageNo().'/{nb}',0,0,'C');


        }

    }

        //A4 width : 219mm
        //default margin : 10mm each side
        //writable horizontal : 219-(10*2)=189mm
        $pdf = new PDF('P','mm','A4');


        $pdf->AliasNbPages();


        $pdf->AddPage();

        //set font to times, bold, 14pt
        $pdf->SetFont('times','B',14);

        //Cell(width , height , text , border , end line , [align] )
        $pdf->Cell(130	,5,'To',0,1);

        //set font to times, bold, 12pt
        $pdf->SetFont('times','B',12);

        $pdf->Cell(100	,5,$accounts['full_name'],0,0);
        $pdf->Cell(35	,5,'BRANCH ID         :',0,0);
        $pdf->Cell(5	,5,'',0,0);
        $pdf->Cell(34	,5, $branch_code,0,1);//end of line

        $pdf->Cell(100	,5,'P.O. BOX '.$accounts['address'],0,0);
        $pdf->Cell(35	,5,'BRANCH NAME  :',0,0);
        $pdf->Cell(5	,5,'',0,0);
        $pdf->Cell(34	,5, $branch['branch_name'],0,1);//end of line

        $pdf->Cell(100	,5,$accounts['zip'],0,0);
        $pdf->Cell(35	,5,'ACCOUNT TYPE :',0,0);
        $pdf->Cell(2.3	,2,'',0,0);
        $pdf->Cell(34	,5,'  MAIN',0,1);//end of line

        $pdf->Cell(100	,5,$accounts['city'],0,1);//end of line

        //make a dummy empty cell as a vertical spacer
        $pdf->Cell(189	,10,'',0,1);//end of line

        //set font to times, bold, 10pt
        $pdf->SetFont("times",'',10);

        $pdf->Cell(189	,10,'Statement Period From '.$_SESSION ['date1'].' to '.$_SESSION ['date2'],0,1,'C');//end of line


        // transcations table: specify 3 columns
        $pdf->AddCol('date',40,'Transcation Date','','C');
        $pdf->AddCol('description',50,'Description','C');
        $pdf->AddCol('debit',30,'Debit','C');
        $pdf->AddCol('credit',30,'Credit','C');
        $pdf->AddCol('account_bal',40,'Balance','C');

        $pdf->Table($con,"SELECT date, description,debit,credit,account_bal FROM transcations WHERE account_no = '$accno'AND date >= '$date1 00:00:00' AND date <='$date2 23:59:59'");

        $pdf->Output();
?>