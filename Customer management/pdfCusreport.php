
<?php
    require_once "cusdbconnection.php";
    require_once "reportGen/Cuspdf.php";

    // $result ="SELECT * FROM cusregister ORDER by cusId ";
    // //$sql = $conn->query($result);
    // $result = mysqli_query($con,$sql);

    $sql = "SELECT * FROM cusregister ORDER by cusId ";
    $result = mysqli_query($con,$sql);


    $pdf = new Cuspdf();
    $pdf->AddPage();


    $pdf->SetFont('Arial','B',12);
    while($row = $result->fetch_object()){
        $cusId  = $row->cusId ;
        $Name = $row->Name;
        $Address = $row->Address;
        $contactNum	=$row->contactNum;

        $pdf->Cell(20,10,$cusId,1);
        $pdf->Cell(40,10,$Name,1);
        $pdf->Cell(80,10,$Address,1);
        $pdf->Cell(40,10,$contactNum,1);
        $pdf->Ln();
    }
    $pdf->Output();



?>

<!doctype html>
<html lang="en">
    <head>
    </head>
        <title>Reg</title>
    </head>
        <body>
            <h1>aaaaaaaaaaa</h1>
        </body>

        



