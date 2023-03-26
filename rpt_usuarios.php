<?php
    include "fpdf/fpdf.php";
    include("verificar_sesion_terapeuta.php");

    class PDF extends FPDF{
        function Header(){
            $this->SetFont('Times','B',15);
            $this->SetTextColor(0,138,198);
            $this->Ln(2);
            $this->Cell(0, 10, "Informe final del paciente", 0, 1, "C");
			$this->Cell(0,45,"REPORTE DE HISTORIA CLINICA EN TERAPIA OCUPACIONAL",0,1,'C');
            $this->Ln(1);
            $this->SetFont('Times','B',14);
            $this->SetTextColor(0,0,0);
            $this->Image('images/logo1.png', 5, 10, 55);
			$this->Image('images/udenar.jpg', 170, 10, 40, 30, 'jpg');
        }

        function Footer(){
            $this->SetY(-15);
            $this->SetFont('Times','I',8);
            $this->Cell(0,5,'Contacto: 7208873 - Email: entidad1@gmail.com ',0,1,'C');
            $this->Cell(0,5,'Pag. '.$this->PageNo() . " de {nb}",0,0,'C');
           
        }
    }


    $doc = new PDF();
    //habilitar calculo total paginas
    $doc->AliasNbPages();
    $doc->AddPage();
    $doc->Ln(2);
    $doc->Line(20, 60, 200, 60);
	$doc->Line(35, 62, 180, 62);
    $doc->SetFont('Times','B',10);
    $doc->Cell(30,8,"Cedula",1,0);
    $doc->Cell(80,8,"Nombre",1,0);
    $doc->Cell(20,8,"Genero",1,0);
    $doc->Cell(40,8,"Fecha de nacimiento",1,1);


    include "conecta.php";
    $bd = conectar();
    $doc->SetFont('Times','',10);
    $sql = "SELECT DISTINCT ced_usu,nom_usu,genero_usu,fech_nacimiento,tel_usu,epicrisis,nombre_terapia from usuarios JOIN terapias USING(ced_usu) where ced_terapeuta like('".$_SESSION['cedula_terapeuta']."')";
    $datos = mysqli_query($bd,$sql);
    $c=0;
    while($arr = mysqli_fetch_array($datos)){
        $doc->Cell(30,8,$arr[0],1,0);
        $doc->Cell(80,8,$arr[1],1,0);
        $doc->Cell(20,8,$arr[2],1,0);
        $doc->Cell(40,8,$arr[3],1,1);
        $doc->Cell(40,8,$arr[4],1,1);
        $doc->Cell(40,8,$arr[5],1,1);
        $doc->Cell(40,8,$arr[6],1,1);
        $c++;
        if ($c==2){
            $doc->AddPage();
        }
    }


    $doc->Ln(2);
    $doc->Cell(80,8,"Total de pacientes registrados: $c",0,1);
    mysqli_close($bd);
    $doc->Output();
    
?>