<?php
class Empleado
{
	private $pdo;
    
    public $numero_documento_empleado;
    public $nombre;
    public $direccion;
    public $telefono;
    public $genero;
    public $correo_electronico;
    public $cargo;
    public $fecha_nacimiento;
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

			$stm = $this->pdo->prepare("SELECT * FROM empleado");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($numero_documento_empleado)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM empleado WHERE numero_documento_empleado = ?");
			          

			$stm->execute(array($numero_documento_empleado));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($numero_documento_empleado)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM empleado WHERE numero_documento_empleado = ?");			          

			$stm->execute(array($numero_documento_empleado));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{ 
			$sql = "UPDATE empleado SET
						nombre         = ?,
						direccion       = ?,
						telefono    =?,
						genero   =?,
						correo_electronico    = ?,
						cargo       = ?,
						fecha_nacimiento    =?,
						codigo_usuario    =?
            
				    WHERE numero_documento_empleado= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->nombre,
                    $data->direccion, 
                    $data->telefono, 
                    $data->genero,
                    $data->correo_electronico,
                    $data->cargo,
                    $data->fecha_nacimiento,
                    $data->codigo_usuario,
                    $data->numero_documento_empleado,
                 )
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Empleado $data)
	{
		try 
		{
		$sql = "INSERT INTO empleado (numero_documento_empleado,nombre,direccion,telefono,
		genero,correo_electronico,cargo,fecha_nacimiento,codigo_usuario) 
		        VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->numero_documento_empleado,
                    $data->nombre,
                    $data->direccion, 
                    $data->telefono, 
                    $data->genero,
                    $data->correo_electronico,
                    $data->cargo,
                    $data->fecha_nacimiento,
                    $data->codigo_usuario
                  
               )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}