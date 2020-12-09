<?php
require"fpdf.php";
require "../database.php";

class pdf_detalle_pedido extends FPDF{

	   public function header(){
	   	//tipo de letra 
	   	$this -> setfont('Arial','B',20);
	   	//agregar imagen 
	   	$this -> Image("detalle_p.jpg",35,9,150);
	   	//diseño de titulo
	   	$this -> cell(200,5,"Detalle Pedido",0,0,'C');
	   	//salto de linea
	   	$this -> Ln(40);
	   }

	   public function Encabezado_Tabla(){
	   	$this -> setfont('Arial','B',9);
	   	$this -> setfillcolor(255);
	   	$this -> cell(45,10,"Codigo Detalle Pedido",1,0,'C','true');
	   	$this -> cell(45,10,"Codigo Producto",1,0,'C','true');
	   	$this -> cell(55,10,"Numero Documento Proveedor",1,0,'C','true');
	   
	   	

	   }

	   public function Cuerpo_Tabla($pdo){
	   	$this -> setfont('Arial','',10);
	   	$stm = $pdo -> Query("select * from detalle_pedido");
	   	while ($data = $stm -> fetch(PDO::FETCH_OBJ))
	   	{
	   		$this -> Ln(10);
	   		$this -> cell(45,10,$data->codigo_detalle_pedido,1,0,'L');
	   		$this -> cell(45,10,$data->codigo_producto,1,0,'L');
	   		$this -> cell(55,10,$data->numero_documento_proveedor,1,0,'L');
	   		
	   			
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

$pdf = new pdf_detalle_pedido();
$pdf -> AliasNbPages(); 
$pdf -> AddPage('P','A4',0);
$pdf -> Encabezado_Tabla();
$pdf -> Cuerpo_Tabla($pdo);
$pdf -> Output();

?>