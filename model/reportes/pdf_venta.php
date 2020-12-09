<?php
require"fpdf.php";
require "../database.php";


class pdf_venta extends FPDF{

	   public function header(){
	   	//tipo de letra 
	   	$this -> setfont('Arial','B',20);
	   	//agregar imagen 
	   	$this -> Image("venta.png",35,15,150);
        //diseño de titulo
	   	$this -> cell(200,5,"Ventas",0,0,'C');
	   	//salto de linea
	   	$this -> Ln(40);
	   }
	  
	   public function Encabezado_Tabla(){
	   	$this -> setfont('Arial','B',10);
	   	$this -> setfillcolor(255);
	   	$this -> cell(30,10,"Codigo Venta",1,0,'C','true');
	   	$this -> cell(25,10,"Fecha Venta",1,0,'C','true');
	   	$this -> cell(30,10,"Cantidad Venta",1,0,'C','true');
	   	$this -> cell(30,10,"Total Venta",1,0,'C','true');
	   	$this -> cell(40,10,"Numero Id Cliente",1,0,'C','true');
	   	$this -> cell(40,10,"Numero Id Empleado",1,0,'C','true');

	   }

	   public function Cuerpo_Tabla($pdo){
	   	$this -> setfont('Arial','',10);
	   	$stm = $pdo -> Query("select * from venta");
	   	while ($data = $stm -> fetch(PDO::FETCH_OBJ))
	   	{
	   		$this -> Ln(10);
	   		$this -> cell(30,10,$data->codigo_venta,1,0,'L');
	   		$this -> cell(25,10,$data->fecha_venta,1,0,'L');
	   		$this -> cell(30,10,$data->cantidad_venta,1,0,'L');
	   		$this -> cell(30,10,$data->total_venta,1,0,'L');
	   		$this -> cell(40,10,$data->numero_documento_cliente,1,0,'L'); 
	   		$this -> cell(40,10,$data->numero_documento_empleado,1,0,'L'); 	
	   }
	}
	function Footer()
	{
		// Go to 1.5 cm froom bootm
		$this->SetY(-15);
		// Select Arial italic B
		$this->setfont('Arial','I',14);
		$this->cell(250,5,"Proyecto Final, copyright &copy; 2019",0,0,'c');
		// Print centered page numbre
		$this->Cell(0,10,'Pag.'.$this->PageNo(),0,0,'c');
	}	
}

$pdf = new pdf_venta();
$pdf -> AliasNbPages(); 
$pdf -> AddPage('P','A4',0);
$pdf -> Encabezado_Tabla();
$pdf -> Cuerpo_Tabla($pdo);
$pdf -> Output();
  
?>
