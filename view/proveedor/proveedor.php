<?php
session_start();
if(!isset($_SESSION['codigo_usuario'])){
  header('location: index.php?c=login');
}
$usuario = $_SESSION['codigo_usuario'];
foreach ($usuario as $usu){
?>
<h1 class="page-header">Proveedor </h1>

<div class="well well-sm text-right">
    <a class="btn btn-warning" href="?c=proveedor&a=Nuevo">Nuevo Proveedor</a>
    <a class="btn btn-warning pull-right rrr" href="?c=proveedor&a=consul">Buscar</a>
    <br></br>
    <?php if($usu->rol == "Empleado") { ?>
    <a class="btn btn-default" href="model/reportes/pdf_proveedor.php"target="_blank ">Generar Reporte</a>
<?php } ?>
    <?php if($usu->rol == "Empleado") { ?>
    <a class="btn btn-default" href="model/reportes/pdf_proveedor.php"download="reportecliente ">Descargar Reporte</a>
    <?php } ?>

    <?php if($usu->rol== "administ"){ ?>
        <a class="btn btn-default" href="model/reportes/pdf_proveedor.php"target="_blank ">Generar Reporte</a>
        <a class="btn btn-default" href="model/reportes/pdf_proveedor.php"download="reportecliente ">Descargar Reporte</a>
        <?php } ?>
</div>

<table class="table table-hover">
    <thead>
        <tr>

            <th style="width:120px;">Numero documento proveedor</th>
            <th style="width:180px;">Nombre</th>
            <th style="width:180px;">Nombre empresa</th>
            <th style="width:120px;">Direccion</th>
            <th style="width:120px;">Telefono</th>
            <th style="width:120px;">Genero</th>
            <th style="width:120px;">Correo electronico</th>
            <th style="width:120px;">Codigo usuario</th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr> 

            <td><?php echo $r->numero_documento_proveedor; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->nombre_empresa; ?></td>
            <td><?php echo $r->direccion; ?></td>
            <td><?php echo $r->telefono; ?></td>
            <td><?php echo $r->genero == 1 ? 'Hombre' : 'Mujer'; ?></td>
            <td><?php echo $r->correo_electronico; ?></td>
            <td><?php echo $r->codigo_usuario; ?></td>
           
            <td>
                <a class="btn btn-warning"href="?c=proveedor&a=Crud&numero_documento_proveedor=<?php echo $r->numero_documento_proveedor; ?>">Editar</a>
            </td>
            <td>
                <?php if($usu->rol == "Empleado") { ?>
                <a class="btn btn-warning"onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=proveedor&a=Eliminar&numero_documento_proveedor=<?php echo $r->numero_documento_proveedor; ?>">Eliminar</a>
                <?php } ?>

                <?php if($usu->rol == "administ") { ?>
                     <a class="btn btn-warning"onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=proveedor&a=Eliminar&numero_documento_proveedor=<?php echo $r->numero_documento_proveedor; ?>">Eliminar</a>
                     <?php } ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a class="btn btn-default" href="menu.php">Menu</a>
<?php } ?>