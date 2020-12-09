<?php

 $mysqli = new mysqli("localhost","root","","granero_la_90");
 $salida="";
 $query = "SELECT * FROM proveedor ORDER BY numero_documento_proveedor";

 if(isset($_POST['consulta'])){
 	$q= $mysqli->real_escape_string($_POST['consulta']);
 	$query = "SELECT numero_documento_proveedor, nombre,nombre_empresa,direccion,correo_electronico FROM proveedor WHERE numero_documento_proveedor LIKE '%".$q."%' OR nombre LIKE  '%".$q."%' OR nombre_empresa LIKE  '%".$q."%' OR direccion LIKE  '%".$q."%' OR correo_electronico LIKE '%".$q."%' OR codigo_usuario LIKE '%".$q."%'";
 }
  $resultado = $mysqli->query($query);
  $salida="";
  if($resultado->num_rows>0){
  	$salida.="<table class='table table-striped table-hover' id='table'>
  	<thead class='table-dark'>
			<tr>
				<th class='title-table'>Numero documento</th>	
				<th class='title-table'>Nombre</th>	
        <th class='title-table'>Nombre empresa</th>
				<th class='title-table'>Direccion</th>	
				<th class='title-table'>Correo</th>	
        <th class='title-table'>Codigo</th>
				
			</tr>
		</thead>";
	  
  	while($fila = $resultado->fetch_assoc()){
  		$salida.="<tr>
  		
  		<td>".$fila['numero_documento_proveedor']."</td>
  		<td>".$fila['nombre']."</td>
      <td>".$fila['nombre_empresa']."</td>
  		<td>".$fila['direccion']."</td>
  		<td>".$fila['correo_electronico']."</td>
      <td>".$fila['codigo_usuario']."</td>
  		</tr>";
  	}
 $salida.="</tbody></table>";

  }else{
  	$salida.="No hay datos";
  }
  echo $salida;
  $mysqli->close();
 ?>