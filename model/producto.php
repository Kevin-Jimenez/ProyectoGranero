<?php
class Producto
{
	private $pdo;
    
    public $codigo_producto;
    public $nombre;
    public $tamaño;
    public $precio;
    public $marca;
    public $fecha_vencimiento;
    public $cantidad_actual;
    public $cantidad_ingreso;
    public $cantidad_total_existencial;

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

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM producto");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($codigo_producto)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM producto WHERE codigo_producto = ?");
			          

			$stm->execute(array($codigo_producto));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($codigo_producto)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM producto WHERE codigo_producto = ?");			          

			$stm->execute(array($codigo_producto));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE producto SET
						nombre         = ?,
						tamaño       = ?,
						precio    =?,
						marca   =?,
						fecha_vencimiento       = ?,
						cantidad_actual       = ?,
						cantidad_ingreso    =?,
						cantidad_total_existencial    =?
            
				    WHERE codigo_producto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->nombre,
                    $data->tamaño, 
                    $data->precio, 
                    $data->marca,
                    $data->fecha_vencimiento,
                    $data->cantidad_actual,
                    $data->cantidad_ingreso,
                    $data->cantidad_total_existencial,
                    $data->codigo_producto,
                 )
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Producto $data)
	{
		try 
		{
		$sql = "INSERT INTO producto (codigo_producto,nombre,tamaño,precio,marca,fecha_vencimiento,cantidad_actual,cantidad_ingreso,cantidad_total_existencial) 
		        VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->codigo_producto,
                    $data->nombre,
                    $data->tamaño, 
                    $data->precio, 
                    $data->marca,
                    $data->fecha_vencimiento,
                    $data->cantidad_actual,
                    $data->cantidad_ingreso,
                    $data->cantidad_total_existencial,
                  
               )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}