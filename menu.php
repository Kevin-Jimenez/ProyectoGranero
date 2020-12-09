<?php
session_start();
if(!isset($_SESSION['codigo_usuario'])){
  header('location: index.php?c=login');
}
$usuario = $_SESSION['codigo_usuario'];
foreach ($usuario as $usu){
?>
<!DOCTYPE html>
<html>
<head>
	<title> Granero| Super Exito La 90 </title>
	 <link rel="stylesheet" type="text/css" href="Librerias/esltilo2.css">
	 <link rel="shortcut icon" href="Librerias/imagenes/90.png">
</head>
<section id="cabesera">
    	<div class="contenedor">

    		<h1>Sistema De Informacion Para La Gestion De Ventas e Inventario</h1>
    	</div>
    	<br></br>
    	<img src="Librerias/imagenes/la.png">
    	<h1>Hola <?php echo $usu->rol ?></h1>

  </section>

<body>
		
	<style type="text/css">
	    img{
	    	width: 400px;

	    }
		body{
			 font-family: "Homer Simpson", cursive;
		}
	</style>
     
	<input type="checkbox" class="checkbox" id="check">
	

	
	<label class="menu" for="check"> >>> </label>

	<div class="left-panel">
		<div class="h1">
			
		<ul> 
			
			<?php if($usu->rol == "Cliente"){ ?>
			<a href="index.php?c=cliente"><li>Cliente</li></a>
            <?php } ?>

            <?php if($usu->rol == "Empleado") { ?>
			<a href="index.php?c=detalle_pedido"><li>Detalle pedido</li></a>
			 <?php } ?>

            <?php if($usu->rol == "Empleado") { ?>
			<a href="index.php?c=detalle_venta"><li>Detalle venta</li></a>
			 <?php } ?>
			
            <?php if($usu->rol== "Empleado"){ ?>
			<a href="index.php?c=empleado"><li>Empleado</li></a>
				<?php } ?>

			<a href="index.php?c=producto"><li>Producto</li></a>

            <?php if($usu->rol== "Empleado"){ ?>
			<a href="index.php?c=proveedor"><li>Proveedor</li></a>
			<?php } ?>

            <?php if($usu->rol== "Cliente"){ ?>
			<a href="index.php?c=usuario"><li>Usuario</li></a>
			<?php } ?>

            <?php if($usu->rol== "Cliente"){ ?>
			<a href="index.php?c=venta"><li>Venta</li></a>
			
			<?php } ?>
			<?php if($usu->rol== "Empleado"){ ?>
				<a href="index.php?c=venta"><li>Venta</li></a>
			
			<?php } ?>

			<?php if($usu->rol== "administ"){ ?>
				<a href="index.php?c=cliente"><li>Cliente</li></a>
				<a href="index.php?c=detalle_pedido"><li>Detalle pedido</li></a>
				<a href="index.php?c=detalle_venta"><li>Detalle venta</li></a>
				<a href="index.php?c=empleado"><li>Empleado</li></a>
				<a href="index.php?c=producto"><li>Producto</li></a>
				<a href="index.php?c=proveedor"><li>Proveedor</li></a>
				<a href="index.php?c=usuario"><li>Usuario</li></a>
				<a href="index.php?c=venta"><li>Venta</li></a>
				<?php } ?>


			<a href="index.php?c=login"><li>Cerrar Sesion</li></a>

			
			


		</ul>
	 </div>


</body>
</html>
   
<?php } ?>
