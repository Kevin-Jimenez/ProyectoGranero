<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=proveedor"> Proveedor</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form numero_documento_proveedor="frm-proveedor" action="?c=proveedor&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Numero de documento del proveedor</label>
<input type="number" name="numero_documento_proveedor" value="<?php echo $prove->numero_documento_proveedor;?>" class="form-control" placeholder="Ingrese numero del documento" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $prove->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Nombre de la empresa</label>
        <input type="text" name="nombre_empresa" value="<?php echo $prove->nombre_empresa; ?>" class="form-control" placeholder="Ingrese el nombre de la empresa" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Direccion</label>
        <input type="text" name="direccion" value="<?php echo $prove->direccion; ?>" class="form-control" placeholder="Ingrese la direccion" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Telefono</label>
        <input type="number" name="telefono" value="<?php echo $prove->telefono; ?>" class="form-control" placeholder="Ingrese su numero telefonico" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Genero</label>
        <select name="genero" class="form-control">
            <option <?php echo $prove->genero == 1 ? 'selected' : ''; ?> value="1">Masculino</option>
            <option <?php echo $prove->genero == 2 ? 'selected' : ''; ?> value="2">Femenino</option>
        </select>
    </div>
    
    <div class="form-group">
        <label>Correo electronico </label>
        <input type="email" name="correo_electronico" value="<?php echo $prove->correo_electronico; ?>" class="form-control" placeholder="Ingrese su email" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Codigo usuario </label>
        <input type="number" name="codigo_usuario" value="<?php echo $prove->codigo_usuario; ?>" class="form-control" placeholder="Ingrese el codigo de usuario" data-validacion-tipo="requerido" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-warning">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-proveedor").submit(function(){
            return $(this).validate();
        });
    })
</script>