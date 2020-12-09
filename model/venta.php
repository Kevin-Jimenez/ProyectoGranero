<?php
class Venta
{
	private $pdo;
    
    public $codigo_venta;
    public $fecha_venta;
    public $cantidad_venta;
    public $total_venta;
    public $numero_documento_cliente;
    public $numero_documento_empleado;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	//metodo que listar cliente

	public function listar_cliente()
	{

	  try{
	  	$result = array();
	  	$stm = $this->pdo ->prepare("select numero_documento_cliente,nombre from cliente");
	  	$stm->execute();
	  	return $stm->fetchAll(PDO::FETCH_OBJ);
	  }
	  catch(Exception $e){

	  	die( $e-> getMessage());
	  }
	}

	//metodo que lista el empleado

	public function listar_empleado(){

	  try{
	  	$result = array();
	  	$stm = $this->pdo ->prepare("select numero_documento_empleado,nombre from empleado");
	  	$stm->execute();
	  	return $stm->fetchAll(PDO::FETCH_OBJ);
	  }
	  catch(Exception $e){

	  	die( $e-> getMessage());
	  }
	}


	public function mostrar_cliente(){

	  try{
	  	$result = array();
	  	$stm = $this->pdo->prepare("select numero_documento_cliente,nombre from cliente");
	  	$stm->execute();
	  	return $stm->fetchAll(PDO::FETCH_OBJ);
	  }
	  catch(Exception $e){

	  	die( $e-> getMessage());
	  }
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM venta");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($codigo_venta)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM venta WHERE codigo_venta = ?");
			          

			$stm->execute(array($codigo_venta));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($codigo_venta)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM venta WHERE codigo_venta = ?");			          

			$stm->execute(array($codigo_venta));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE venta SET
						fecha_venta         = ?,
						cantidad_venta         = ?,
						total_venta       = ?,
						numero_documento_cliente    =?,
						numero_documento_empleado   =?
						
				    WHERE codigo_venta= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->fecha_venta,
                    $data->cantidad_venta,
                    $data->total_venta, 
                    $data->numero_documento_cliente, 
                    $data->numero_documento_empleado,
                    $data->codigo_venta
                 )
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Venta $data)
	{
		try 
		{
		$sql = "INSERT INTO venta (codigo_venta,fecha_venta,cantidad_venta,total_venta,numero_documento_cliente,numero_documento_empleado) 
		        VALUES (?,?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->codigo_venta,
                    $data->fecha_venta,
                    $data->cantidad_venta,
                    $data->total_venta, 
                    $data->numero_documento_cliente, 
                    $data->numero_documento_empleado
                  
               )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}