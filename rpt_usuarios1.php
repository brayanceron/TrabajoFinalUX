<?php
    include "../fpdf/fpdf.php";
    $doc = new FPDF("P","mm","letter");
                    //P => Hoja Vertical L= Hoja Horizontal, Unidad de medida y tamaño del documento
    $doc->AddPage();
    $doc->SetFont('Times','B',15);
    $doc->SetTextColor(0,138,198);
    $doc->Ln(2);
    $doc->Cell(0,45,"REPORTE DE HISTORIA CLINICA EN TERAPIA OCUPACIONAL",0,1,'C')


    $doc->Ln(2);
    $doc->SetFont('Times','B',14);
    $doc->SetTextColor(0,0,0);
    $doc->Cell(0,10,"Reporte de pacientes registrados",0,1,'C');
    
    $doc->Ln(2);
    $doc->SetFont('Times','B',10);

    $doc->Cell(30,8,"Cedula",1,0);
    $doc->Cell(80,8,"Nombre",1,0);
    $doc->Cell(20,8,"Genero",1,0);
    $doc->Cell(40,8,"Telefono",1,1);


    include "../conecta.php";
    $bd = conectar();
    $doc->SetFont('Times','',10);
    $sql = "select cedusu, nomusu, genusu, telusu from usuarios order by nomusu";
    $datos = mysqli_query($bd,$sql);
    $c=0;
    while($arr = mysqli_fetch_array($datos)){
        $doc->Cell(30,8,$arr[0],1,0);
        $doc->Cell(80,8,$arr[1],1,0);
        $doc->Cell(20,8,$arr[2],1,0);
        $doc->Cell(40,8,$arr[3],1,1);
        $doc->Cell(80,8,$arr[4],1,0);
        $doc->Cell(20,8,$arr[5],1,0);
        $doc->Cell(40,8,$arr[6],1,1);
        $c++;
    }


    $doc->Ln(2);
    $doc->Cell(80,8,"Total de pacientes registrados: $c",0,1);
    mysqli_close($bd);
    $doc->Output();
    
?>