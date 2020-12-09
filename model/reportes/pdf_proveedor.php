<?php
require"fpdf.php";
require "../database.php";

class pdf_proveedor extends FPDF{

	   public function header(){
	   	//tipo de letra 
	   	$this -> setfont('Arial','B',20);
	   	//agregar imagen 
	   	$this -> Image("proveedor.png",35,9,150);
	   	//diseño de titulo
	   	$this -> cell(200,5,"Proveedor",0,0,'C');
	   	//salto de linea
	   	$this -> Ln(40);
	   }

	   public function Encabezado_Tabla(){
	   	$this -> setfont('Arial','B',8);
	   	$this -> setfillcolor(255);
	   	$this -> cell(30,10,"Numero Id Proveedor",1,0,'C','true');
	   	$this -> cell(25,10,"Nombre",1,0,'C','true');
	   	$this -> cell(23,10,"Empresa",1,0,'C','true');
	   	$this -> cell(40,10,"Direccion",1,0,'C','true');
	   	$this -> cell(24,10,"Telefono",1,0,'C','true');
	   	$this -> cell(13,10,"Genero",1,0,'C','true');
	   	$this -> cell(40,10,"Correo",1,0,'C','true');

	   }

	   public function Cuerpo_Tabla($pdo){
	   	$this -> setfont('Arial','',10);
	   	$stm = $pdo -> Query("select * from proveedor");
	   	while ($data = $stm -> fetch(PDO::FETCH_OBJ))
	   	{
	   		$this -> Ln(10);
	   		$this -> cell(30,10,$data->numero_documento_proveedor,1,0,'L');
	   		$this -> cell(25,10,$data->nombre,1,0,'L');
	   		$this -> cell(23,10,$data->nombre_empresa,1,0,'L');
	   		$this -> cell(40,10,$data->direccion,1,0,'L');
	   		$this -> cell(24,10,$data->telefono,1,0,'L'); 
	   		$this -> cell(13,10,$data->genero,1,0,'L');
	   		$this -> cell(40,10,$data->correo_electronico,1,0,'L'); 	
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

$pdf = new pdf_proveedor();
$pdf -> AliasNbPages(); 
$pdf -> AddPage('P','A4',0);
$pdf -> Encabezado_Tabla();
$pdf -> Cuerpo_Tabla($pdo);
$pdf -> Output();

?>