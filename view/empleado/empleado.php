<?php
session_start();
if(!isset($_SESSION['codigo_usuario'])){
  header('location: index.php?c=login');
}
$usuario = $_SESSION['codigo_usuario'];
foreach ($usuario as $usu){
?>
<h1 class="page-header">Empleado </h1>

<div class="well well-sm text-right">
   
    <a class="btn btn-warning" href="?c=empleado&a=Nuevo">Nuevo Empleado</a>
    <a class="btn btn-warning pull-right rrr" href="?c=empleado&a=consul">Buscar</a>
    <br></br>
    <a class="btn btn-default" href="model/reportes/pdf_empleado.php"target="_blank ">Generar Reporte</a>
    <a class="btn btn-default" href="model/reportes/pdf_empleado.php"download="reportecliente ">Descargar Reporte</a>
    

</div>

<table class="table table-hover">
    <thead>
        <tr>

            <th style="width:120px;">Numero documento empleado</th>
            <th style="width:180px;">Nombre</th>
            <th style="width:120px;">Direccion</th>
            <th style="width:120px;">Telefono</th>
            <th style="width:120px;">Genero</th>
            <th style="width:120px;">Correo electronico</th>
            <th style="width:120px;">Cargo</th>
            <th style="width:120px;">Fecha nacimiento</th>
            <th style="width:120px;">Codigo usuario</th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr> 

            <td><?php echo $r->numero_documento_empleado; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->direccion; ?></td>
            <td><?php echo $r->telefono; ?></td>
            <td><?php echo $r->genero == 1 ? 'Hombre' : 'Mujer'; ?></td>
            <td><?php echo $r->correo_electronico; ?></td>
            <td><?php echo $r->cargo; ?></td>
            <td><?php echo $r->fecha_nacimiento; ?></td>
            <td><?php echo $r->codigo_usuario; ?></td>
           
           
           
            <td>
                <a class="btn btn-warning"href="?c=empleado&a=Crud&numero_documento_empleado=<?php echo $r->numero_documento_empleado; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-warning"onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=empleado&a=Eliminar&numero_documento_empleado=<?php echo $r->numero_documento_empleado; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a class="btn btn-default" href="menu.php">Menu</a>
<?php } ?>