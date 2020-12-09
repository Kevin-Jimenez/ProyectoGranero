<?php
class Cliente
{
	private $pdo;
    
    public $numero_documento_cliente;
    public $nombre;
    public $direccion;
    public $telefono;
    public $genero;
    public $fecha_nacimiento;
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

			$stm = $this->pdo->prepare("SELECT * FROM cliente");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($numero_documento_cliente)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM cliente WHERE numero_documento_cliente = ?");
			          

			$stm->execute(array($numero_documento_cliente));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($numero_documento_cliente)
	{
		try 
		{
			$stm = $this->pdo
			 ->prepare("DELETE FROM cliente WHERE numero_documento_cliente = ?");			          

			$stm->execute(array($numero_documento_cliente));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE cliente SET
						nombre         = ?,
						direccion       = ?,
						telefono    =?,
						genero   =?,
						fecha_nacimiento    =?,
                        correo_electronico       = ?,
                        codigo_usuario   =?
				    WHERE numero_documento_cliente= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->nombre,
                    $data->direccion, 
                    $data->telefono, 
                    $data->genero,
                    $data->fecha_nacimiento,
                    $data->correo_electronico,
                    $data->codigo_usuario,
                    $data->numero_documento_cliente
                 )
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Cliente $data)
	{
		try 
		{
		$sql = "INSERT INTO cliente (numero_documento_cliente,nombre,direccion,telefono,genero,fecha_nacimiento,correo_electronico,codigo_usuario) 
		        VALUES (?,?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->numero_documento_cliente,
                    $data->nombre,
                    $data->direccion, 
                    $data->telefono, 
                    $data->genero,
                    $data->fecha_nacimiento,
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