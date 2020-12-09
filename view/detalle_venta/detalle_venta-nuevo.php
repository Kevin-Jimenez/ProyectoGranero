<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=detalle_venta"> Detalle venta</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form codigo_detalle_venta="frm-detalle_venta" action="?c=detalle_venta&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Codigo detalle venta</label>
<input type="number" name="codigo_detalle_venta" value="<?php echo $dv->codigo_detalle_venta;?>" class="form-control" placeholder="Ingrese el codigo de detalle de la venta" data-validacion-tipo="requerido|min:5" />
    </div>

    <div class="form-group">
        <label>Codigo de la venta </label>
       <select name="codigo_venta" class="form-control">

    <?php foreach ($this->model->listar_venta() as $arre):?> 
       <option value="<?php echo $arre -> codigo_venta ?> ">
        <?php echo $arre -> fecha_venta ?>
       </option>
    <?php endforeach; ?>
       
   </select>
    </div>

    <div class="form-group">
        <label>Codigo del producto</label>
       <select name="codigo_producto" class="form-control">

    <?php foreach ($this->model->listar_producto() as $arre):?> 
       <option value="<?php echo $arre -> codigo_producto ?> ">
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
        $("#frm-detalle_venta").submit(function(){
            return $(this).validate();
        });
    })
</script>