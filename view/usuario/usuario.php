<?php
session_start();
if(!isset($_SESSION['codigo_usuario'])){
  header('location: index.php?c=login');
}
$usuario = $_SESSION['codigo_usuario'];
foreach ($usuario as $usu){
?>
<h1 class="page-header">Usuario </h1>

<div class="well well-sm text-right">

    <?php if($usu->rol == "Empleado") { ?>
    <a class="btn btn-warning" href="?c=usuario&a=Nuevo">Nuevo Usuario</a>
     <?php } ?>

    <a class="btn btn-warning pull-right rrr" href="?c=usuario&a=consul">Buscar</a>
    <br></br>
    <?php if($usu->rol == "Empleado") { ?>
    <a class="btn btn-default" href="model/reportes/pdf_usuarios.php"target="_blank ">Generar Reporte</a>
    <?php } ?>
    <?php if($usu->rol == "Empleado") { ?>
    <a class="btn btn-default" href="model/reportes/pdf_usuarios.php"download="reportecliente ">Descargar Reporte</a>
    <?php } ?>
    
    <?php if($usu->rol== "administ"){ ?>
        <a class="btn btn-warning" href="?c=usuario&a=Nuevo">Nuevo Usuario</a>
        <a class="btn btn-default" href="model/reportes/pdf_usuarios.php"target="_blank ">Generar Reporte</a>
        <a class="btn btn-default" href="model/reportes/pdf_usuarios.php"download="reportecliente ">Descargar Reporte</a>
    <?php } ?>
</div>

<table class="table table-hover">
    <thead>
        <tr>

            <th style="width:120px;">Codigo usuario</th>
            <th style="width:180px;">Rol</th>
            <th style="width:120px;">Usuario</th>
            <th style="width:120px;">Contraseña</th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr> 

            <td><?php echo $r->codigo_usuario; ?></td>
            <td><?php echo $r->rol; ?></td>
            <td><?php echo $r->usuario; ?></td>
            <td><?php echo $r->contraseña; ?></td>
            
           <td>
                <a class="btn btn-warning"href="?c=usuario&a=Crud&codigo_usuario=<?php echo $r->codigo_usuario; ?>">Editar</a>
            </td>
            <td>
                <?php if($usu->rol == "Empleado") { ?>

                <a class="btn btn-warning"onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=usuario&a=Eliminar&codigo_usuario=<?php echo $r->codigo_usuario; ?>">Eliminar</a>
               <?php } ?>

               <?php if($usu->rol == "administ") { ?>
                <tb>
                <a class="btn btn-warning"href="?c=usuario&a=Crud&codigo_usuario=<?php echo $r->codigo_usuario; ?>">Editar</a>
                </tb>
                <tb>
                <a class="btn btn-warning"onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=usuario&a=Eliminar&codigo_usuario=<?php echo $r->codigo_usuario; ?>">Eliminar</a>
            </tb>

              <?php } ?>


            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
</table>
 <a class="btn btn-default" href="menu.php">Menu</a>
 <?php } ?>