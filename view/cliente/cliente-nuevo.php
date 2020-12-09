<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=cliente"> Cliente</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form numero_documento_cliente="frm-cliente" action="?c=cliente&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Numero documento cliente</label>
<input type="number" name="numero_documento_cliente" value="<?php echo $cli->numero_documento_cliente;?>" class="form-control" placeholder="Ingrese numero del documento" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Nombre </label>
        <input type="text" name="nombre" value="<?php echo $cli->nombre; ?>" class="form-control" placeholder="Ingrese el nombre" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Direccion</label>
        <input type="text" name="direccion" value="<?php echo $cli->direccion; ?>" class="form-control" placeholder="Ingrese su direccion" data-validacion-tipo="requerido|min:10" />
    </div>


    <div class="form-group">
        <label>Telefono</label>
        <input type="number" name="telefono" value="<?php echo $cli->telefono; ?>" class="form-control" placeholder="Ingrese su numero telefonico" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Genero</label>
        <select name="genero" class="form-control">
            <option <?php echo $cli->genero == 1 ? 'selected' : ''; ?> value="1">Masculino</option>
            <option <?php echo $cli->genero == 2 ? 'selected' : ''; ?> value="2">Femenino</option>
        </select>
    </div>


    <div class="form-group">
        <label>Fecha nacimiento</label>
        <input type="date" name="fecha_nacimiento" value="<?php echo $cli->fecha_nacimiento; ?>" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" data-validacion-tipo="requerido|date" />
    </div>

<div class="form-group">
        <label>Correo electronico </label>
        <input type="email" name="correo_electronico" value="<?php echo $cli->correo_electronico; ?>" class="form-control" placeholder="Ingrese su email" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Codigo usuario </label>
        <input type="number" name="codigo_usuario" value="<?php echo $cli->codigo_usuario; ?>" class="form-control" placeholder="Ingrese el codigo de usuario" data-validacion-tipo="requerido" />
    </div>

    

    <hr />

    <div class="text-right">
        <button class="btn btn-warning">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-cliente").submit(function(){
            return $(this).validate();
        });
    })
</script>