<<?php
require_once 'model/detalle_pedido.php';

class Detalle_pedidoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Detalle_pedido();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/detalle_pedido/detalle_pedido.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $dp = new Detalle_pedido();
        
        if(isset($_REQUEST['codigo_detalle_pedido'])){
            $dp = $this->model->Obtener($_REQUEST['codigo_detalle_pedido']);
        }
        
        require_once 'view/header.php';
        require_once 'view/detalle_pedido/detalle_pedido-editar.php';
        require_once 'view/footer.php';
    }
    public function Nuevo(){
        $dp = new Detalle_pedido();

        require_once 'view/header.php';
        require_once 'view/detalle_pedido/detalle_pedido-nuevo.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $dp = new Detalle_pedido();
        
        $dp->codigo_detalle_pedido = $_REQUEST['codigo_detalle_pedido'];
        $dp->codigo_producto = $_REQUEST['codigo_producto'];
        $dp->numero_documento_proveedor= $_REQUEST['numero_documento_proveedor'];
       

        $this->model->Registrar($dp);

        header('Location:index.php?c=detalle_pedido');
    }

    public function Editar(){
        $dp = new Detalle_pedido();
        $dp->codigo_detalle_pedido = $_REQUEST['codigo_detalle_pedido'];
        $dp->codigo_producto = $_REQUEST['codigo_producto'];
        $dp->numero_documento_proveedor= $_REQUEST['numero_documento_proveedor'];
       

        $this->model->Actualizar($dp);

        header('Location: index.php?c=detalle_pedido');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['codigo_detalle_pedido']);
        header('Location: index.php?c=detalle_pedido');
    }
       public function consul()
    {
    require_once 'view/detalle_pedido/header_dp.php';
    require_once 'view/detalle_pedido/detalle_pedido-consulta.php';
    require_once 'view/footer.php';
    }
}