<?php
require_once 'model/empleado.php';

class EmpleadoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Empleado();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/empleado/empleado.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $emp = new Empleado();
        
        if(isset($_REQUEST['numero_documento_empleado'])){
            $emp = $this->model->Obtener($_REQUEST['numero_documento_empleado']);
        }
        
        require_once 'view/header.php';
        require_once 'view/empleado/empleado-editar.php';
        require_once 'view/footer.php';
    }
    public function Nuevo(){
        $emp = new Empleado();

        require_once 'view/header.php';
        require_once 'view/empleado/empleado-nuevo.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $emp = new Empleado();
        
        $emp->numero_documento_empleado = $_REQUEST['numero_documento_empleado'];
        $emp->nombre = $_REQUEST['nombre'];
        $emp->direccion= $_REQUEST['direccion'];
        $emp->telefono= $_REQUEST['telefono'];
        $emp->genero= $_REQUEST['genero'];
        $emp->correo_electronico= $_REQUEST['correo_electronico'];
        $emp->cargo= $_REQUEST['cargo'];
        $emp->fecha_nacimiento= $_REQUEST['fecha_nacimiento'];
        $emp->codigo_usuario= $_REQUEST['codigo_usuario'];

        $this->model->Registrar($emp);

        header('Location: index.php?c=empleado');
    }

    public function Editar(){
        $emp = new Empleado();
        $emp->numero_documento_empleado = $_REQUEST['numero_documento_empleado'];
        $emp->nombre = $_REQUEST['nombre'];
        $emp->direccion= $_REQUEST['direccion'];
        $emp->telefono= $_REQUEST['telefono'];
        $emp->genero= $_REQUEST['genero'];
        $emp->correo_electronico= $_REQUEST['correo_electronico'];
        $emp->cargo= $_REQUEST['cargo'];
        $emp->fecha_nacimiento= $_REQUEST['fecha_nacimiento'];
        $emp->codigo_usuario= $_REQUEST['codigo_usuario'];

        $this->model->Actualizar($emp);

        header('Location: index.php?c=empleado');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['numero_documento_empleado']);
        header('Location: index.php?c=empleado');
    }
    
    public function consul()
    {
    require_once 'view/header.php';
    require_once 'view/empleado/empleado-consultar.php';
    require_once 'view/footer.php';
    }
}
?>