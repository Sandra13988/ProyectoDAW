<?php 

	include("../funciones.php");
	mantener_sesion();
	include("fpdf186/fpdf.php");

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont("Arial", "", 30);
	$pdf->Cell(190,15,("LISTADO DE LIBROS"), 1,1,"C",0);
	$pdf->Ln();

	$conexion = conectar();
	$consulta = "SELECT * FROM libros";

	$resultadoConsulta = mysqli_query($conexion, $consulta);
	$filaConsulta = mysqli_fetch_assoc($resultadoConsulta);
	if($filaConsulta){
		$pdf->SetFont("Arial", "", 20);
		$pdf->Cell(35,15,("ISBN"),1,0,"C",0);
		$pdf->Cell(70,15,("NOMBRE"),1,0,"C",0);
		$pdf->Cell(45,15,("AUTOR"),1,0,"C",0);
		$pdf->Cell(40,15,("GENERO"), 1,0,"C",0);
        $pdf->Ln();

		do{
			$pdf->SetFont("Arial", "", 12);
			$pdf->Cell(35,15,($filaConsulta['isbn']),1,0,"C",0);
			$pdf->Cell(70,15,($filaConsulta['nombre']),1,0,"C",0);
			$pdf->Cell(45,15,($filaConsulta['autor']),1,0,"C",0);
			$pdf->Cell(40,15,($filaConsulta['genero']),1,0,"C",0);
            $pdf->Ln();
		}while($filaConsulta = mysqli_fetch_assoc($resultadoConsulta));
		desconectar($conexion);
	}
	$pdf ->output("Filtros", "I");
	?>