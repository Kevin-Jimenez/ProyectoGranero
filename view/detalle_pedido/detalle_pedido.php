<?php
session_start();
if(!isset($_SESSION['codigo_usuario'])){
  header('location: index.php?c=login');
}
$usuario = $_SESSION['codigo_usuario'];
foreach ($usuario as $usu){
?>
<h1 class="page-header">Detalle pedido </h1>

<div class="well well-sm text-right">
 
    <a class="btn btn-warning" href="?c=detalle_pedido&a=Nuevo">Nuevo Detalle pedido</a>
   <a class="btn btn-warning pull-right rrr" href="?c=detalle_pedido&a=consul">Buscar</a>
   <br></br>
    <a class="btn btn-default" href="model/reportes/pdf_detalle_pedido.php"target="_blank ">Generar Reporte</a>
    <a class="btn btn-default" href="model/reportes/pdf_detalle_pedido.php"download="reportecliente ">Descargar Reporte</a>
    <br></br>

</div>

<table class="table table-hover">
    <thead>
        <tr>

            <th style="width:120px;">Codigo Detalle Pedido</th>
            <th style="width:180px;">Codigo producto</th>
            <th style="width:120px;">Numero id Proveedor</th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr> 

            <td><?php echo $r->codigo_detalle_pedido; ?></td>
            <td><?php echo $r->codigo_producto; ?></td>
            <td><?php echo $r->numero_documento_proveedor; ?></td>
            
           <td class=warning">
                <a class="btn btn-warning"href="?c=detalle_pedido&a=Crud&codigo_detalle_pedido=<?php echo $r->codigo_detalle_pedido; ?>">Editar</a>
            </td>
            <td class="warning">
                <a class="btn btn-warning"onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=detalle_pedido&a=Eliminar&codigo_detalle_pedido=<?php echo $r->codigo_detalle_pedido; ?>">Eliminar</a>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a class="btn btn-default" href="menu.php">Menu</a>
<?php } ?>
