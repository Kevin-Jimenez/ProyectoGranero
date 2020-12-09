<h1 class="page-header">
    <?php echo $emp->numero_documento_empleado != null ? $emp->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=empleado">Empleado</a></li>
  <li class="active"><?php echo $emp->numero_documento_empleado != null ? $emp->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-empleado" action="?c=empleado&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="numero_documento_empleado" value="<?php echo $emp->numero_documento_empleado; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $emp->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Direccion</label>
        <input type="text" name="direccion" value="<?php echo $emp->direccion; ?>" class="form-control" placeholder="Ingrese la direccion" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Telefono</label>
        <input type="number" name="telefono" value="<?php echo $emp->telefono; ?>" class="form-control" placeholder="Ingrese su numero telefonico" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Genero</label>
        <select name="genero" class="form-control">
            <option <?php echo $emp->genero == 1 ? 'selected' : ''; ?> value="1">Masculino</option>
            <option <?php echo $emp->genero == 2 ? 'selected' : ''; ?> value="2">Femenino</option>
        </select>
    </div>

     <div class="form-group">
        <label>Correo electronico </label>
        <input type="email" name="correo_electronico" value="<?php echo $emp->correo_electronico; ?>" class="form-control" placeholder="Ingrese su email" data-validacion-tipo="requerido" />
    </div>


    <div class="form-group">
        <label>Cargo</label>
        <input type="text" name="cargo" value="<?php echo $emp->cargo; ?>" class="form-control" placeholder="Ingrese su cargo" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Fecha nacimiento</label>
        <input type="date" name="fecha_nacimiento" value="<?php echo $emp->fecha_nacimiento; ?>" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" data-validacion-tipo="requerido|date" />
    </div>

    <div class="form-group">
        <label>Codigo usuario </label>
        <input type="number" name="codigo_usuario" value="<?php echo $emp->codigo_usuario; ?>" class="form-control" placeholder="Ingrese el codigo de usuario" data-validacion-tipo="requerido" />
    </div>
    
    <hr />    
    <div class="text-right">
        <button class="btn btn-warning">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-empleado").submit(function(){
            return $(this).validate();
        });
    })
</script>