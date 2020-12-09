<<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=producto"> Producto</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form codigo_producto="frm-producto" action="?c=producto&a=Guardar" method="post" enctype="multipart/form-data">

     <div class="form-group">
        <label>Codigo producto</label>
        <input type="number" name="codigo_producto" value="<?php echo $pro->codigo_producto; ?>" class="form-control" placeholder="Ingrese el codigo del producto" data-validacion-tipo="requerido|min:5" />
    </div>
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $pro->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Tamaño </label>
        <input type="text" name="tamaño" value="<?php echo $pro->tamaño; ?>" class="form-control" placeholder="Ingrese el tamaño " data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Precio </label>
        <input type="number" name="precio" value="<?php echo $pro->precio; ?>" class="form-control" placeholder="Ingrese el precio " data-validacion-tipo="requerido|min:6" />
    </div>

    <div class="form-group">
        <label>Marca </label>
        <input type="text" name="marca" value="<?php echo $pro->marca; ?>" class="form-control" placeholder="Ingrese la marca" data-validacion-tipo="requerido|min:8" />
    </div>

    <div class="form-group">
        <label>Fecha de vencimiento </label>
        <input type="date" name="fecha_vencimiento" value="<?php echo $pro->fecha_vencimiento; ?>" class="form-control" placeholder="Ingrese la fecha de vencimiento" data-validacion-tipo="requerido|date" />
    </div>

    <div class="form-group">
        <label>Cantidad actual </label>
        <input type="number" name="cantidad_actual" value="<?php echo $pro->cantidad_actual; ?>" class="form-control" placeholder="Ingrese la cantidad actual " data-validacion-tipo="requerido|min:5" />
    </div>

    <div class="form-group">
        <label>Cantidad ingreso</label>
        <input type="number" name="cantidad_ingreso" value="<?php echo $pro->cantidad_ingreso; ?>" class="form-control" placeholder="Ingrese la cantidad de ingreso " data-validacion-tipo="requerido|min:5" />
    </div>

    <div class="form-group">
        <label>Cantidad total existencial</label>
        <input type="number" name="cantidad_total_existencial" value="<?php echo $pro->cantidad_total_existencial; ?>" class="form-control" placeholder="Ingrese la cantidad total existencial " data-validacion-tipo="requerido|min:5" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-warning">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-producto").submit(function(){
            return $(this).validate();
        });
    })
</script>