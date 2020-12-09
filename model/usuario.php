<?php
class Usuario
{
	private $pdo;
    
    public $codigo_usuario;
    public $rol;
    public $usuario;
    public $contraseña;
   
    
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

	//metodo que lsta el empleado

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
	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM usuario");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($codigo_usuario)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuario WHERE codigo_usuario = ?");
			          

			$stm->execute(array($codigo_usuario));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($codigo_usuario)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM usuario WHERE codigo_usuario = ?");			          

			$stm->execute(array($codigo_usuario));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE usuario SET
						rol        = ?,
						usuario        = ?,
						contraseña       = ?
						
						
				    WHERE codigo_usuario= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->rol,
                    $data->usuario,
                    $data->contraseña,   
                    $data->codigo_usuario,
                 )
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Usuario $data)
	{
		try 
		{
		$sql = "INSERT INTO usuario (codigo_usuario,rol,usuario,contraseña) 
		        VALUES (?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->codigo_usuario,
                    $data->rol,
                    $data->usuario,
                    $data->contraseña,
                    
                  
               )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Ingreso($codigo_usuario,$contraseña){
		$sql = "SELECT * FROM usuario u LEFT JOIN cliente c on u.codigo_usuario = c.codigo_usuario LEFT JOIN proveedor p on u.codigo_usuario = p.codigo_usuario LEFT JOIN empleado e on u.codigo_usuario = e.codigo_usuario Where u.codigo_usuario = ? and contraseña = ?";

		 $stm = $this -> pdo -> prepare($sql);
		 $stm -> execute(array($Id_usuario, $Contrasena));

		 $result = $stm -> fetchAll(PDO::FETCH_OBJ);

		 if(empty($result)){
		 	echo '<script>
		 	alert("codigo o contraseña incorrectos");
		 	window.location = "index.php?c=login";
            </script>';
            return false;
		 }
		 else{
		 	  session_start();
		 	  $_SESSION['codigo_usuario']= $result;
		 	echo '<script>
		 	alert("Bienvenidos");
		 	window.location = "menu.php";
            </script>';
            return true;
		 }
	}
}