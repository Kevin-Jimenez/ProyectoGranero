<?php
session_start();
if(!isset($_SESSION['codigo_usuario'])){
  header('location: index.php?c=login');
}
$usuario = $_SESSION['codigo_usuario'];
foreach ($usuario as $usu){
?>
<h1 class="page-header">Producto </h1>

<div class="well well-sm text-right">
    <?php if($usu->rol== "Empleado"){ ?>
    <a class="btn btn-warning" href="?c=producto&a=Nuevo">Nuevo Producto</a>
<?php } ?>
    <a class="btn btn-warning pull-right rrr" href="?c=producto&a=consul">Buscar</a>
    <br></br>
    <?php if($usu->rol == "Empleado") { ?>
    <a class="btn btn-default" href="model/reportes/pdf_producto.php"target="_blank ">Generar Reporte</a>
    <?php } ?>

    <?php if($usu->rol == "Empleado") { ?>
    <a class="btn btn-default" href="model/reportes/pdf_producto.php"download="reportecliente ">Descargar Reporte</a>
    <?php } ?>

    <?php if($usu->rol== "administ"){ ?>
        <a class="btn btn-warning" href="?c=producto&a=Nuevo">Nuevo Producto</a>
        <a class="btn btn-default" href="model/reportes/pdf_producto.php"target="_blank ">Generar Reporte</a>
        <a class="btn btn-default" href="model/reportes/pdf_producto.php"download="reportecliente ">Descargar Reporte</a>
        <?php } ?>
</div>

<table class="table table-hover">
    <thead>
        <tr>

            <th style="width:120px;">Codigo producto</th>
            <th style="width:180px;">Nombre</th>
            <th style="width:120px;">Tamaño</th>
            <th style="width:120px;">Precio</th>
            <th style="width:120px;">Marca</th>
            <th style="width:120px;">Fecha vencimiento</th>
            <th style="width:120px;">Cantidad actual</th>
            <th style="width:120px;">Cantidad ingreso</th>
            <th style="width:120px;">Cantidad total existencial</th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr> 

            <td><?php echo $r->codigo_producto; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->tamaño; ?></td>
            <td><?php echo $r->precio; ?></td>
            <td><?php echo $r->marca; ?></td>
            <td><?php echo $r->fecha_vencimiento; ?></td>
            <td><?php echo $r->cantidad_actual; ?></td>
            <td><?php echo $r->cantidad_ingreso; ?></td>
            <td><?php echo $r->cantidad_total_existencial; ?></td>
           
           <td>
           <?php if($usu->rol == "Cliente") { ?>
                <a class="btn btn-warning"href="?c=producto&a=Crud&codigo_producto=<?php echo $r->codigo_producto; ?>">Editar</a>
            <?php } ?>
            </td>
            <td>
                <?php if($usu->rol == "Empleado") { ?>
                <a class="btn btn-warning"onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=producto&a=Eliminar&codigo_producto=<?php echo $r->codigo_producto; ?>">Eliminar</a>
                <?php } ?>


                <?php if($usu->rol == "administ") { ?>
                     <a class="btn btn-warning"href="?c=producto&a=Crud&codigo_producto=<?php echo $r->codigo_producto; ?>">Editar</a>
                     </td>

                      <td>
                      <a class="btn btn-warning"onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=producto&a=Eliminar&codigo_producto=<?php echo $r->codigo_producto; ?>">Eliminar</a>
                      </td>
                <?php } ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a class="btn btn-default" href="menu.php">Menu</a>
<?php } ?>