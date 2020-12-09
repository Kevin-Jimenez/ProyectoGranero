<?php
class Detalle_pedido
{
	private $pdo;
    
    public $codigo_detalle_pedido;
    public $codigo_producto;
    public $numero_documento_proveedor;
    
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
	//metodo que lsta el producto

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
	//metodo que lsta el proveedor

	public function listar_proveedor(){

	  try{
	  	$result = array();
	  	$stm = $this->pdo ->prepare("select numero_documento_proveedor,nombre from proveedor");
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

			$stm = $this->pdo->prepare("SELECT * FROM detalle_pedido");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($codigo_detalle_pedido)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM detalle_pedido WHERE codigo_detalle_pedido = ?");
			          

			$stm->execute(array($codigo_detalle_pedido));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($codigo_detalle_pedido)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM detalle_pedido WHERE codigo_detalle_pedido = ?");			          

			$stm->execute(array($codigo_detalle_pedido));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE detalle_pedido SET
						codigo_producto         = ?,
						numero_documento_proveedor       = ?
						
				    WHERE codigo_detalle_pedido= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->codigo_producto,
                    $data->numero_documento_proveedor, 
                    $data->codigo_detalle_pedido,
                 )
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Detalle_pedido $data)
	{
		try 
		{
		$sql = "INSERT INTO detalle_pedido (codigo_detalle_pedido,codigo_producto,numero_documento_proveedor) 
		        VALUES (?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->codigo_detalle_pedido,
                    $data->codigo_producto,
                    $data->numero_documento_proveedor,
                    
                  
               )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}