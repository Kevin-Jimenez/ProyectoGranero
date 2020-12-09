<?php
require_once 'model/producto.php';

class ProductoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Producto();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/producto/producto.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $pro = new Producto();
        
        if(isset($_REQUEST['codigo_producto'])){
            $pro = $this->model->Obtener($_REQUEST['codigo_producto']);
        }
        
        require_once 'view/header.php';
        require_once 'view/producto/producto-editar.php';
        require_once 'view/footer.php';
    }
    public function Nuevo(){
        $pro = new Producto();

        require_once 'view/header.php';
        require_once 'view/producto/producto-nuevo.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $pro = new Producto();
        
        $pro->codigo_producto = $_REQUEST['codigo_producto'];
        $pro->nombre = $_REQUEST['nombre'];
        $pro->tamaño= $_REQUEST['tamaño'];
        $pro->precio= $_REQUEST['precio'];
        $pro->marca= $_REQUEST['marca'];
        $pro->fecha_vencimiento= $_REQUEST['fecha_vencimiento'];
        $pro->cantidad_actual= $_REQUEST['cantidad_actual'];
        $pro->cantidad_ingreso= $_REQUEST['cantidad_ingreso'];
        $pro->cantidad_total_existencial= $_REQUEST['cantidad_total_existencial'];

        $this->model->Registrar($pro);

        header('Location: index.php?c=producto');
    }

    public function Editar(){
        $pro = new Producto();
        $pro->codigo_producto = $_REQUEST['codigo_producto'];
        $pro->nombre = $_REQUEST['nombre'];
        $pro->tamaño= $_REQUEST['tamaño'];
        $pro->precio= $_REQUEST['precio'];
        $pro->marca= $_REQUEST['marca'];
        $pro->fecha_vencimiento= $_REQUEST['fecha_vencimiento'];
        $pro->cantidad_actual= $_REQUEST['cantidad_actual'];
        $pro->cantidad_ingreso= $_REQUEST['cantidad_ingreso'];
        $pro->cantidad_total_existencial= $_REQUEST['cantidad_total_existencial'];

        $this->model->Actualizar($pro);

        header('Location: index.php?c=producto');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['codigo_producto']);
        header('Location: index.php?c=producto');
    }
     public function consul()
    {
    require_once 'view/producto/header_p.php';
    require_once 'view/producto/producto-consulta.php';
    require_once 'view/footer.php';
    }
}