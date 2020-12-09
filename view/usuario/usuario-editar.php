<h1 class="page-header">
    <?php echo $usu->codigo_usuario != null ? $usu->rol : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=usuario">Usuario</a></li>
  <li class="active"><?php echo $usu->codigo_usuario != null ? $usu->rol : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-usuario" action="?c=usuario&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="codigo_usuario" value="<?php echo $usu->codigo_usuario; ?>" />
    
    <div class="form-group">
        <label>Rol</label>
        <input type="text" name="rol" value="<?php echo $usu->rol; ?>" class="form-control" placeholder="Ingrese su rol" data-validacion-tipo="requerido|min:8" />
    </div>
    
    <div class="form-group">
        <label>Usuario </label>
         <input type="email" name="usuario" value="<?php echo $usu->usuario; ?>" class="form-control" placeholder="Ingrese su usuario " data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Contraseña </label>
        <input type="password" name="contraseña" value="<?php echo $usu->contraseña; ?>" class="form-control" placeholder="Ingrese su contraseña " data-validacion-tipo="requerido|min:8" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-warning">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-usuario").submit(function(){
            return $(this).validate();
        });
    })
</script>