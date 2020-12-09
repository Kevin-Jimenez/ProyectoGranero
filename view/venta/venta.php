<?php
session_start();
if(!isset($_SESSION['codigo_usuario'])){
  header('location: index.php?c=login');
}
$usuario = $_SESSION['codigo_usuario'];
foreach ($usuario as $usu){
?>
<h1 class="page-header">Venta </h1>

<div class="well well-sm text-right">

    <?php if($usu->rol == "Empleado") { ?>
    <a class="btn btn-warning" href="?c=venta&a=Nuevo">Nuevo Venta</a>
    <?php } ?>

    <a class="btn btn-warning pull-right rrr" href="?c=venta&a=consul">Buscar</a>
    <br></br>
    <?php if($usu->rol == "Empleado") { ?>
    <a class="btn btn-default" href="model/reportes/pdf_venta.php"target="_blank ">Generar Reporte</a>
<?php } ?>

    <?php if($usu->rol == "Empleado") { ?>
    <a class="btn btn-default" href="model/reportes/pdf_venta.php"download="reportecliente ">Descargar Reporte</a>
    <?php } ?>
    
    <?php if($usu->rol== "administ"){ ?>
        <a class="btn btn-warning" href="?c=venta&a=Nuevo">Nuevo Venta</a>
         <a class="btn btn-default" href="model/reportes/pdf_venta.php"target="_blank ">Generar Reporte</a>
         <a class="btn btn-default" href="model/reportes/pdf_venta.php"download="reportecliente ">Descargar Reporte</a>
    <?php } ?>
</div>

<table class="table table-hover">
    <thead>
        <tr>

            <th style="width:120px;">Codigo venta</th>
            <th style="width:180px;">Fecha venta</th>
            <th style="width:120px;">Cantidad venta</th>
            <th style="width:120px;">Total venta</th>
            <th style="width:120px;">Numero documento cliente</th>
            <th style="width:120px;">Numero documento empleado</th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr> 

            <td><?php echo $r->codigo_venta; ?></td>
            <td><?php echo $r->fecha_venta; ?></td>
            <td><?php echo $r->cantidad_venta; ?></td>
            <td><?php echo $r->total_venta; ?></td>
            <td><?php echo $r->numero_documento_cliente; ?></td>
            <td><?php echo $r->numero_documento_empleado; ?></td>
            
           <td>
              <?php if($usu->rol == "Empleado") { ?>
                <a class="btn btn-warning"href="?c=venta&a=Crud&codigo_venta=<?php echo $r->codigo_venta; ?>">Editar</a>
            <?php } ?>
            </td>
            <td>
                <?php if($usu->rol == "Empleado") { ?>
                <a class="btn btn-warning"onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=venta&a=Eliminar&codigo_venta=<?php echo $r->codigo_venta; ?>">Eliminar</a>
                <?php } ?>

                <?php if($usu->rol == "administ") { ?>
                    <tb>
                    <a class="btn btn-warning"href="?c=venta&a=Crud&codigo_venta=<?php echo $r->codigo_venta; ?>">Editar</a>
                    </tb>
                    <tb>
                     <a class="btn btn-warning"onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=venta&a=Eliminar&codigo_venta=<?php echo $r->codigo_venta; ?>">Eliminar</a>
                     </td>
                     <?php } ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a class="btn btn-default" href="menu.php">Menu</a>
<?php } ?>