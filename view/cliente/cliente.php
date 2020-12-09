<?php
session_start();
if(!isset($_SESSION['codigo_usuario'])){
  header('location: index.php?c=login');
}
$usuario = $_SESSION['codigo_usuario'];
foreach ($usuario as $usu){
?>

<h1 class="page-header">Cliente </h1>

<div class="well well-sm text-right">
    
    <a class="btn btn-warning" href="?c=cliente&a=Nuevo">Nuevo Cliente</a>

    <a class="btn btn-warning pull-right rrr" href="?c=cliente&a=consul">Buscar</a>
    <br></br>
    <?php if($usu->rol == "Empleado") { ?>
    <a class="btn btn-default" href="model/reportes/pdf_cliente.php"target="_blank ">Generar Reporte</a>
    <?php } ?>
    <?php if($usu->rol == "Empleado") { ?>
    <a class="btn btn-default" href="model/reportes/pdf_cliente.php"download="reportecliente ">Descargar Reporte</a>
    <?php } ?>

    <?php if($usu->rol == "administ") { ?>
        <a class="btn btn-warning" href="?c=cliente&a=Nuevo">Nuevo Cliente</a>
        <a class="btn btn-warning pull-right rrr" href="?c=cliente&a=consul">Buscar</a>
        <a class="btn btn-default" href="model/reportes/pdf_cliente.php"target="_blank ">Generar Reporte</a>
        <a class="btn btn-default" href="model/reportes/pdf_cliente.php"download="reportecliente ">Descargar Reporte</a>

        <?php } ?>

</div>

<table class="table table-hover">
    <thead>
        <tr>

            <th style="width:120px;">Numero documento cliente</th>
            <th style="width:180px;">Nombre</th>
            <th style="width:120px;">Direccion</th>
            <th style="width:120px;">Telefono</th>
            <th style="width:120px;">Genero</th>
            <th style="width:120px;">Fecha nacimiento</th>
            <th style="width:120px;">Correo electronico</th>
            <th style="width:120px;">Codigo usuario</th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr> 

            <td class="warning"><?php echo $r->numero_documento_cliente; ?></td>
            <td class="warning"><?php echo $r->nombre; ?></td>
            <td class="warning"><?php echo $r->direccion; ?></td>
            <td class="warning"><?php echo $r->telefono; ?></td>
            <td class="warning"><?php echo $r->genero == 1 ? 'Hombre' : 'Mujer'; ?></td>
            <td class="warning"><?php echo $r->fecha_nacimiento; ?></td>
            <td class="warning"><?php echo $r->correo_electronico; ?></td>
            <td class="warning"><?php echo $r->codigo_usuario; ?></td>
           
           
            <td class="warning">
            
                <a class="btn btn-warning" href="?c=cliente&a=Crud&numero_documento_cliente=<?php echo $r->numero_documento_cliente; ?>">Editar</a>
            </td>
            
            
            <td class="warning">
                <?php if($usu->rol == "Empleado") { ?>
                <a  class="btn btn-warning"onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=cliente&a=Eliminar&numero_documento_cliente=<?php echo $r->numero_documento_cliente; ?>">Eliminar</a>
                <?php } ?>

                <?php if($usu->rol == "administ") { ?>
                    <a  class="btn btn-warning"onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=cliente&a=Eliminar&numero_documento_cliente=<?php echo $r->numero_documento_cliente; ?>">Eliminar</a>
                <?php } ?>
            </td>
      
        </tr>
       <?php endforeach; ?>
    </tbody>
</table>
<a class="btn btn-default" href="menu.php">Menu</a>
<?php } ?>


