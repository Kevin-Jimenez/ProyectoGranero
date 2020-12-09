<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=usuario"> Venta</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form codigo_usuario="frm-usuario" action="?c=usuario&a=Guardar" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label>Codigo del usuario</label>
        <input type="number" name="codigo_usuario" value="<?php echo $usu->codigo_usuario; ?>" class="form-control" placeholder="Ingrese el codigo del usuario" data-validacion-tipo="requerido|min:5" />
    </div>
    
    <div class="form-group">
        <label>Rol</label>
        <input type="text" name="rol" value="<?php echo $usu->rol; ?>" class="form-control" placeholder="Ingrese su rol" data-validacion-tipo="requerido|min:8" />
    </div>
    
    <div class="form-group">
        <label>Usuario </label>
        <input type="email" name="usuario" value="<?php echo $usu->usuario; ?>" class="form-control" placeholder="Ingrese su usuario " data-validacion-tipo="requerido|min:1" />
    </div>

    <div class="form-group">
        <label>Contraseña </label>
        <input type="password" name="contraseña" value="<?php echo $usu->contraseña; ?>" class="form-control" placeholder="Ingrese su contraseña " data-validacion-tipo="requerido|min:8" />
    </div>

    <hr />
    
    <div class="text-right">
        <button class="btn btn-warning">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-producto").submit(function(){
            return $(this).validate();
        });
    })
</script>