<h1 class="page-header">
    <?php echo $dp->codigo_detalle_pedido != null ? $dp->codigo_producto : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=detalle_pedido">Detalle pedido</a></li>
  <li class="active"><?php echo $dp->codigo_detalle_pedido != null ? $dp->codigo_producto : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-detalle_pedido" action="?c=detalle_pedido&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="codigo_detalle_pedido" value="<?php echo $dp->codigo_detalle_pedido; ?>" />
    
  <div class="form-group">
        <label>Codigo producto</label>
        <select name="codigo_producto" class="form-control">

    <?php foreach ($this->model->listar_producto() as $arre):?> 
       <option value="<?php echo $arre -> codigo_producto ?> ">
        <?php echo $arre -> nombre ?>
       </option>
    <?php endforeach; ?>
       
   </select>
    </div>

    <div class="form-group">
        <label>Numero id del proveedor</label>
       <select name="numero_documento_proveedor" class="form-control">

    <?php foreach ($this->model->listar_proveedor() as $arre):?> 
       <option value="<?php echo $arre -> numero_documento_proveedor ?> ">
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
        $("#frm-detalle_pedido").submit(function(){
            return $(this).validate();
        });
    })
</script>