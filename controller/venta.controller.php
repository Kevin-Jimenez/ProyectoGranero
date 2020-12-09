<?php
require_once 'model/venta.php';

class VentaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Venta();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/venta/venta.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $ven = new Venta();
        
        if(isset($_REQUEST['codigo_venta'])){
            $ven = $this->model->Obtener($_REQUEST['codigo_venta']);
        }
        
        require_once 'view/header.php';
        require_once 'view/venta/venta-editar.php';
        require_once 'view/footer.php';
    }
    public function Nuevo(){
        $ven = new Venta();

        require_once 'view/header.php';
        require_once 'view/venta/venta-nuevo.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $ven = new Venta();
        
        $ven->codigo_venta = $_REQUEST['codigo_venta'];
        $ven->fecha_venta = $_REQUEST['fecha_venta'];
        $ven->cantidad_venta = $_REQUEST['cantidad_venta'];
        $ven->total_venta= $_REQUEST['total_venta'];
        $ven->numero_documento_cliente= $_REQUEST['numero_documento_cliente'];
        $ven->numero_documento_empleado= $_REQUEST['numero_documento_empleado'];

        $this->model->Registrar($ven);

        header('Location: index.php?c=venta');
    }

    public function Editar(){
        $ven = new Venta();
        $ven->codigo_venta = $_REQUEST['codigo_venta'];
        $ven->fecha_venta = $_REQUEST['fecha_venta'];
        $ven->cantidad_venta = $_REQUEST['cantidad_venta'];
        $ven->total_venta= $_REQUEST['total_venta'];
        $ven->numero_documento_cliente= $_REQUEST['numero_documento_cliente'];
        $ven->numero_documento_empleado= $_REQUEST['numero_documento_empleado'];

        $this->model->Actualizar($ven);

        header('Location: index.php?c=venta');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['codigo_venta']);
        header('Location: index.php?c=venta');
    }
      public function consul()
    {
    require_once 'view/header/header_v.php';
    require_once 'view/venta/venta-consulta.php';
    require_once 'view/footer.php';
    }
}