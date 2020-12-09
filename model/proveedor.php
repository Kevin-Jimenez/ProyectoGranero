<?php
class Proveedor
{
	private $pdo;
    
    public $numero_documento_proveedor;
    public $nombre;
    public $nombre_empresa;
    public $direccion;
    public $telefono;
    public $genero;
    public $correo_electronico;
    public $codigo_usuario;

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

			$stm = $this->pdo->prepare("SELECT * FROM proveedor");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($numero_documento_proveedor)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM proveedor WHERE numero_documento_proveedor = ?");
			          

			$stm->execute(array($numero_documento_proveedor));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($numero_documento_proveedor)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM proveedor WHERE numero_documento_proveedor = ?");			          

			$stm->execute(array($numero_documento_proveedor));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE proveedor SET
						nombre         = ?,
						nombre_empresa         = ?,
						direccion       = ?,
						telefono    =?,
						genero   =?,
						correo_electronico       = ?,
						codigo_usuario       = ?
				    WHERE numero_documento_proveedor= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->nombre,
                    $data->nombre_empresa,
                    $data->direccion, 
                    $data->telefono, 
                    $data->genero,
                    $data->correo_electronico,
                    $data->codigo_usuario,
                    $data->numero_documento_proveedor
                 )
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Proveedor $data)
	{
		try 
		{
		$sql = "INSERT INTO proveedor (numero_documento_proveedor,nombre,nombre_empresa,direccion,telefono,genero,correo_electronico,codigo_usuario) 
		        VALUES (?,?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->numero_documento_proveedor,
                    $data->nombre,
                    $data->nombre_empresa,
                    $data->direccion, 
                    $data->telefono, 
                    $data->genero,
                    $data->correo_electronico,
                    $data->codigo_usuario
                  
               )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}