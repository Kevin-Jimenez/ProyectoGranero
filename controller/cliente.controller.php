<?php
require_once 'model/cliente.php';

class ClienteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Cliente();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/cliente/cliente.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $cli = new Cliente();
        
        if(isset($_REQUEST['numero_documento_cliente'])){
            $cli = $this->model->Obtener($_REQUEST['numero_documento_cliente']);
        }
        
        require_once 'view/header.php';
        require_once 'view/cliente/cliente-editar.php';
        require_once 'view/footer.php';
    }
    public function Nuevo(){
        $cli = new Cliente();

        require_once 'view/header.php';
        require_once 'view/cliente/cliente-nuevo.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $cli = new Cliente();
        
        $cli->numero_documento_cliente = $_REQUEST['numero_documento_cliente'];
        $cli->nombre = $_REQUEST['nombre'];
        $cli->direccion= $_REQUEST['direccion'];
        $cli->telefono= $_REQUEST['telefono'];
        $cli->genero= $_REQUEST['genero'];
        $cli->fecha_nacimiento= $_REQUEST['fecha_nacimiento'];
        $cli->correo_electronico= $_REQUEST['correo_electronico'];
        $cli->codigo_usuario= $_REQUEST['codigo_usuario'];

        $this->model->Registrar($cli);

        header('Location: index.php?c=cliente');
    }

    public function Editar(){
        $cli = new Cliente();
        $cli->numero_documento_cliente = $_REQUEST['numero_documento_cliente'];
        $cli->nombre = $_REQUEST['nombre'];
        $cli->direccion= $_REQUEST['direccion'];
        $cli->telefono= $_REQUEST['telefono'];
        $cli->genero= $_REQUEST['genero'];
        $cli->fecha_nacimiento= $_REQUEST['fecha_nacimiento'];
        $cli->correo_electronico= $_REQUEST['correo_electronico'];
        $cli->codigo_usuario= $_REQUEST['codigo_usuario'];


        $this->model->Actualizar($cli);

        header('Location: index.php?c=cliente');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['numero_documento_cliente']);
        header('Location: index.php?c=cliente');
    }
     public function consul()
    {
    require_once 'view/header_c.php';
    require_once 'view/cliente/cliente-consulta.php';
    require_once 'view/footer.php';
    }
}
?>