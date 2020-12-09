<?php
require_once 'model/proveedor.php';

class ProveedorController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Proveedor();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/proveedor/proveedor.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $prove = new Proveedor();
        
        if(isset($_REQUEST['numero_documento_proveedor'])){
            $prove = $this->model->Obtener($_REQUEST['numero_documento_proveedor']);
        }
        
        require_once 'view/header.php';
        require_once 'view/proveedor/proveedor-editar.php';
        require_once 'view/footer.php';
    }
    public function Nuevo(){
        $prove = new Proveedor();

        require_once 'view/header.php';
        require_once 'view/proveedor/proveedor-nuevo.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $prove = new Proveedor();
        
        $prove->numero_documento_proveedor = $_REQUEST['numero_documento_proveedor'];
        $prove->nombre = $_REQUEST['nombre'];
        $prove->nombre_empresa = $_REQUEST['nombre_empresa'];
        $prove->direccion= $_REQUEST['direccion'];
        $prove->telefono= $_REQUEST['telefono'];
        $prove->genero= $_REQUEST['genero'];
        $prove->correo_electronico= $_REQUEST['correo_electronico'];
        $prove->codigo_usuario= $_REQUEST['codigo_usuario'];

        $this->model->Registrar($prove);

        header('Location: index.php?c=proveedor');
    }

    public function Editar(){
        $prove = new Proveedor();
        $prove->numero_documento_proveedor = $_REQUEST['numero_documento_proveedor'];
        $prove->nombre = $_REQUEST['nombre'];
        $prove->nombre_empresa = $_REQUEST['nombre_empresa'];
        $prove->direccion= $_REQUEST['direccion'];
        $prove->telefono= $_REQUEST['telefono'];
        $prove->genero= $_REQUEST['genero'];
        $prove->correo_electronico= $_REQUEST['correo_electronico'];
        $prove->codigo_usuario= $_REQUEST['codigo_usuario'];

        $this->model->Actualizar($prove);

        header('Location: index.php?c=proveedor');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['numero_documento_proveedor']);
        header('Location: index.php?c=proveedor');
    }
      public function consul()
    {
    require_once 'view/header/header_pro.php';
    require_once 'view/proveedor/proveedor-consulta.php';
    require_once 'view/footer.php';
    }
}