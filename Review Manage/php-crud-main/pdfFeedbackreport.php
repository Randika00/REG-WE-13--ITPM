<?php
    require_once "db_conn.php";
    require_once "reportGenFeedback/feedbackpdf.php";

    $result ="SELECT * FROM users ORDER by id";
    $sql = $conn->query($result);

    $pdf = new Feedbackpdf();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);
    while($row = $sql->fetch_object()){
        $id = $row->id;
        $name = $row->name;
        $comment = $row->comment;

        $pdf->Cell(20,10,$id,1);
        $pdf->Cell(40,10,$name,1);
        $pdf->Cell(80,10,$comment,1);
        $pdf->Ln();
    }
    $pdf->Output();



?>