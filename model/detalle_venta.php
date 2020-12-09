<?php
class Detalle_venta
{
	private $pdo;
    
    public $codigo_detalle_venta;
    public $codigo_venta;
    public $codigo_producto;
    
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
	//metodo que listar la venta

	public function listar_venta(){

	  try{
	  	$result = array();
	  	$stm = $this->pdo ->prepare("select codigo_venta,fecha_venta from venta");
	  	$stm->execute();
	  	return $stm->fetchAll(PDO::FETCH_OBJ);
	  }
	  catch(Exception $e){

	  	die( $e-> getMessage());
	  }
	}
	//metodo que listar el producto

	public function listar_producto(){

	  try{
	  	$result = array();
	  	$stm = $this->pdo ->prepare("select codigo_producto,nombre from producto");
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

			$stm = $this->pdo->prepare("SELECT * FROM detalle_venta");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($codigo_detalle_venta)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM detalle_venta WHERE codigo_detalle_venta = ?");
			          

			$stm->execute(array($codigo_detalle_venta));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($codigo_detalle_venta)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM detalle_venta WHERE codigo_detalle_venta = ?");			          

			$stm->execute(array($codigo_detalle_venta));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE detalle_venta SET
						codigo_venta        = ?,
						codigo_producto       = ?
						
				    WHERE codigo_detalle_venta= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->codigo_venta,
                    $data->codigo_producto, 
                    $data->codigo_detalle_venta,
                 )
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Detalle_venta $data)
	{
		try 
		{
		$sql = "INSERT INTO detalle_venta (codigo_detalle_venta,codigo_venta,codigo_producto) 
		        VALUES (?,?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->codigo_detalle_venta,
                    $data->codigo_venta,
                    $data->codigo_producto
                    
                  
               )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}