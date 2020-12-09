<?php
session_start();
if(!isset($_SESSION['codigo_usuario'])){
  header('location: index.php?c=login');
}
$usuario = $_SESSION['codigo_usuario'];
foreach ($usuario as $usu){
?>
<h1 class="page-header">Detalle venta </h1>

<div class="well well-sm text-right">
    <a class="btn btn-warning" href="?c=detalle_venta&a=Nuevo">Nuevo Detalle venta</a>
    <a class="btn btn-warning pull-right rrr" href="?c=detalle_venta&a=consul">Buscar</a>
    <br></br>
    <a class="btn btn-default" href="model/reportes/pdf_detalle_venta.php"target="_blank ">Generar Reporte</a>
    <a class="btn btn-default" href="model/reportes/pdf_detalle_venta.php"download="reportecliente ">Descargar Reporte</a>

</div>

<table class="table table-hover">
    <thead>
        <tr>

            <th style="width:120px;">Codigo detalle venta</th>
            <th style="width:180px;">Codigo venta</th>
            <th style="width:120px;">Codigo producto</th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr> 

            <td><?php echo $r->codigo_detalle_venta; ?></td>
            <td><?php echo $r->codigo_venta; ?></td>
            <td><?php echo $r->codigo_producto; ?></td>
            
           <td>
                <a class="btn btn-warning"href="?c=detalle_venta&a=Crud&codigo_detalle_venta=<?php echo $r->codigo_detalle_venta; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-warning" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=detalle_venta&a=Eliminar&codigo_detalle_venta=<?php echo $r->codigo_detalle_venta; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a class="btn btn-default" href="menu.php">Menu</a>
<?php } ?>