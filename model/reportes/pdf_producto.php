<?php
require"fpdf.php";
require "../database.php";

class pdf_producto extends FPDF{

	   public function header(){
	   	//tipo de letra 
	   	$this -> setfont('Arial','B',20);
	   	//agregar imagen 
	   	$this -> Image("producto.png",35,15,150);
	   	//diseño de titulo
	   	$this -> cell(200,5,"Producto",0,0,'C');
	   	//salto de linea
	   	$this -> Ln(40);
	   }

	   public function Encabezado_Tabla(){
	   	$this -> setfont('Arial','B',8);
	   	$this -> setfillcolor(255);
	   	$this -> cell(13,10,"Codigo",1,0,'C','true');
	   	$this -> cell(25,10,"Nombre",1,0,'C','true');
	   	$this -> cell(15,10,utf8_decode("Tamaño"),1,0,'C','true');
	   	$this -> cell(15,10,"Precio",1,0,'C','true');
	   	$this -> cell(20,10,"Marca",1,0,'C','true');
	   	$this -> cell(30,10,"Fecha vencimiento",1,0,'C','true');
	   	$this -> cell(20,10,"Cantidad actual",1,0,'C','true');
	   	$this -> cell(30,10,"Cantidad ingreso",1,0,'C','true');
	   	$this -> cell(30,10,"Cantidad existencial",1,0,'C','true');

	   }

	   public function Cuerpo_Tabla($pdo){
	   	$this -> setfont('Arial','',10);
	   	$stm = $pdo -> Query("select * from producto");
	   	while ($data = $stm -> fetch(PDO::FETCH_OBJ))
	   	{
	   		$this -> Ln(10);
	   		$this -> cell(13,10,$data->codigo_producto	,1,0,'L');
	   		$this -> cell(25,10,$data->nombre,1,0,'L');
	   		$this -> cell(15,10,$data->tamaño,1,0,'L');
	   		$this -> cell(15,10,$data->precio,1,0,'L');
	   		$this -> cell(20,10,$data->marca,1,0,'L'); 
	   		$this -> cell(30,10,$data->fecha_vencimiento,1,0,'L');
	   		$this -> cell(20,10,$data->cantidad_actual,1,0,'L'); 
	   		$this -> cell(30,10,$data->cantidad_ingreso,1,0,'L');
	   		$this -> cell(30,10,$data->cantidad_total_existencial,1,0,'L');	
	   }
	}
	function Footer()
	{
		// Go to 1.5 cm froom bootm
		$this->SetY(-15);
		// Select Arial italic B
		$this->setfont('Arial','I',14);
		$this->cell(250,8,"Proyecto Final, copyright &copy; 2019",0,0,'c');
		// Print centered page numbre
		$this->Cell(0,10,'Pag.'.$this->PageNo(),0,0,'c');
	}
}

$pdf = new pdf_producto();
$pdf -> AliasNbPages(); 
$pdf -> AddPage('P','A4',0);
$pdf -> Encabezado_Tabla();
$pdf -> Cuerpo_Tabla($pdo);
$pdf -> Output();

?>