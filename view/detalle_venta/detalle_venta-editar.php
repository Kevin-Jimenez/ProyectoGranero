<h1 class="page-header">
    <?php echo $dv->codigo_detalle_venta != null ? $dv->codigo_venta : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=detalle_venta">Detalle_venta</a></li>
  <li class="active"><?php echo $dv->codigo_detalle_venta != null ? $dv->codigo_venta : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-detalle_venta" action="?c=detalle_venta&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="codigo_detalle_venta" value="<?php echo $dv->codigo_detalle_venta; ?>" />
    
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
        <button class="btn btn-warning">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-detalle_venta").submit(function(){
            return $(this).validate();
        });
    })
</script>