<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=detalle_pedido"> Detalle_pedido</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form codigo_detalle_pedido="frm-detalle_pedido" action="?c=detalle_pedido&a=Guardar" method="post" enctype="multipart/form-data">

   <div class="form-group">
        <label>Codigo detalle pedido</label>
        <input type="number" name="codigo_detalle_pedido" value="<?php echo $dp->codigo_detalle_pedido; ?>" class="form-control" placeholder="Ingrese el codigo detalle pedido" data-validacion-tipo="requerido|min:5" />
    </div>

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
        <button class="btn btn-warning">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-detalle_pedido").submit(function(){
            return $(this).validate();
        });
    })
</script>