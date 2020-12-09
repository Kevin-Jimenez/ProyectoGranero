<?php
require"fpdf.php";
require "../database.php";

class pdf_usuario extends FPDF{

	   public function header(){
	   	//tipo de letra 
	   	$this -> setfont('Arial','B',20);
	   	//agregar imagen 
	   	$this -> Image("usuario.jpg",35,3,150);
	   	//diseño de titulo
	   	$this -> cell(200,5,"Usuarios",0,0,'C');
	   	//salto de linea
	   	$this -> Ln(50);
	   }

	   public function Encabezado_Tabla(){
	   	$this -> setfont('Arial','B',10);
	   	$this -> setfillcolor(255);
	   	$this -> cell(30,10,"Codigo usuario",1,0,'C','true');
	   	$this -> cell(25,10,"Rol",1,0,'C','true');
	   	$this -> cell(60,10,"Usuario",1,0,'C','true');
	   	$this -> cell(35,10,utf8_decode("Contraseña"),1,0,'C','true');
	   	$this -> cell(40,10,"Numero Id Empleado",1,0,'C','true');

	   }

	   public function Cuerpo_Tabla($pdo){
	   	$this -> setfont('Arial','',10);
	   	$stm = $pdo -> Query("select * from usuario");
	   	while ($data = $stm -> fetch(PDO::FETCH_OBJ))
	   	{
	   		$this -> Ln(10);
	   		$this -> cell(30,10,$data->codigo_usuario,1,0,'L');
	   		$this -> cell(25,10,$data->rol,1,0,'L');
	   		$this -> cell(60,10,$data->usuario,1,0,'L');
	   		$this -> cell(35,10,$data->contraseña,1,0,'L');
	   		$this -> cell(40,10,$data->numero_documento_empleado,1,0,'L'); 	
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

$pdf = new pdf_usuario();
$pdf -> AliasNbPages(); 
$pdf -> AddPage('P','A4',0);
$pdf -> Encabezado_Tabla();
$pdf -> Cuerpo_Tabla($pdo);
$pdf -> Output();

?>