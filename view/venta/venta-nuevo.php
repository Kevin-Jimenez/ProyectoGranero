<<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=venta"> Venta</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form codigo_venta="frm-venta" action="?c=venta&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Codigo de la venta</label>
<input type="number" name="codigo_venta" value="<?php echo $ven->codigo_venta;?>" class="form-control" placeholder="Ingrese el codigo de la venta" data-validacion-tipo="requerido|min:20" />
    </div>

  <div class="form-group">
        <label>Fecha venta</label>
        <input type="date" name="fecha_venta" value="<?php echo $ven->fecha_venta; ?>" class="form-control datepicker" placeholder="Ingrese la fecha de venta" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Cantidad de la venta </label>
        <input type="number" name="cantidad_venta" value="<?php echo $ven->cantidad_venta; ?>" class="form-control" placeholder="Ingrese la cantidad de la venta " data-validacion-tipo="requerido|min:5" />
    </div>

    <div class="form-group">
        <label>Total venta </label>
        <input type="number" name="total_venta" value="<?php echo $ven->total_venta; ?>" class="form-control" placeholder="Ingrese el total de la venta " data-validacion-tipo="requerido|min:5" />
    </div>

    <div class="form-group">
        <label>Numero documento del cliente </label>
       
     <select name="numero_documento_cliente"  class="form-control">

    <?php foreach ($this->model-> mostrar_cliente() as$arre):?> 
       <option value="<?php echo $arre -> numero_documento_cliente ?> ">
        <?php echo $arre -> nombre ?>
       </option>
    <?php endforeach; ?>
       
   </select>
    </div>

    <div class="form-group">
        <label>Numero documento del empleado </label>
        <select name="numero_documento_empleado" class="form-control">

    <?php foreach ($this->model->listar_empleado() as $arre):?> 
       <option value="<?php echo $arre -> numero_documento_empleado ?> ">
        <?php echo $arre -> nombre ?>
       </option>
    <?php endforeach; ?>
       
   </select>
    </div>
    
    <hr />

    <div class="text-right">
        <button class="btn btn-warning">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-venta").submit(function(){
            return $(this).validate();
        });
    })
</script>