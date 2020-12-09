<?php
require_once 'model/usuario.php';

class UsuarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/usuario/usuario.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $usu = new Usuario();
        
        if(isset($_REQUEST['codigo_usuario'])){
            $usu = $this->model->Obtener($_REQUEST['codigo_usuario']);
        }
        
        require_once 'view/header.php';
        require_once 'view/usuario/usuario-editar.php';
        require_once 'view/footer.php';
    }
    public function Nuevo(){
        $usu = new Usuario();

        require_once 'view/header.php';
        require_once 'view/usuario/usuario-nuevo.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $usu = new Usuario();

        $usu->codigo_usuario = $_REQUEST['codigo_usuario'];
        $usu->rol = $_REQUEST['rol'];
        $usu->usuario= $_REQUEST['usuario'];
        $usu->contraseña= $_REQUEST['contraseña'];
       
        $this->model->Registrar($usu);

        header('Location: index.php?c=usuario');
    }

    public function Editar(){
        $usu = new Usuario();
        
        $usu->codigo_usuario = $_REQUEST['codigo_usuario'];
        $usu->rol = $_REQUEST['rol'];
        $usu->usuario= $_REQUEST['usuario'];
        $usu->contraseña= $_REQUEST['contraseña'];
       
        $this->model->Actualizar($usu);

        header('Location: index.php?c=usuario');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['codigo_usuario']);
        header('Location: index.php?c=usuario');
    }
      public function consul()
    {
    require_once 'view/header/header_usu.php';
    require_once 'view/usuario/usuario-consulta.php';
    require_once 'view/footer.php';
    }

    public function Ingreso(){
        $codigo_usuario = $_POST['codigo_usuario'];
        $contraseña = $_POST['contraseña'];

        $this -> model -> ingreso($codigo_usuario, $contraseña);
    }

    
    
}