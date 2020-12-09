<?php
require_once 'model/detalle_venta.php';

class Detalle_ventaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Detalle_venta();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/detalle_venta/detalle_venta.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $dv = new Detalle_venta();
        
        if(isset($_REQUEST['codigo_detalle_venta'])){
            $dv = $this->model->Obtener($_REQUEST['codigo_detalle_venta']);
        }
        
        require_once 'view/header.php';
        require_once 'view/detalle_venta/detalle_venta-editar.php';
        require_once 'view/footer.php';
    }
    public function Nuevo(){
        $dv = new Detalle_venta();

        require_once 'view/header.php';
        require_once 'view/detalle_venta/detalle_venta-nuevo.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $dv = new Detalle_venta();
        
        $dv->codigo_detalle_venta= $_REQUEST['codigo_detalle_venta'];
        $dv->codigo_venta = $_REQUEST['codigo_venta'];
        $dv->codigo_producto= $_REQUEST['codigo_producto'];
        
        $this->model->Registrar($dv);

        header('Location: index.php?c=detalle_venta');
    }

    public function Editar(){
        $dv = new Detalle_venta();
        $dv->codigo_detalle_venta= $_REQUEST['codigo_detalle_venta'];
        $dv->codigo_venta = $_REQUEST['codigo_venta'];
        $dv->codigo_producto= $_REQUEST['codigo_producto'];


        $this->model->Actualizar($dv);

        header('Location: index.php?c=detalle_venta');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['codigo_detalle_venta']);
        header('Location: index.php?c=detalle_venta');
    }
     public function consul()
    {
    require_once 'view/header/header_dv.php';
    require_once 'view/detalle_venta/detalle_venta-consulta.php';
    require_once 'view/footer.php';
    }
}