<?php

 $mysqli = new mysqli("localhost","root","","granero_la_90");
 $salida="";
 $query = "SELECT * FROM venta ORDER BY codigo_venta";

if(isset($_POST['consulta'])){
  $q= $mysqli->real_escape_string($_POST['consulta']);
  $query = "SELECT codigo_venta, fecha_venta,numero_documento_empleado,numero_documento_cliente FROM venta WHERE codigo_venta LIKE '%".$q."%' OR fecha_venta LIKE  '%".$q."%' OR numero_documento_empleado LIKE  '%".$q."%' OR numero_documento_cliente LIKE '%".$q."%'";

 }
  $resultado = $mysqli->query($query);
  $salida="";
  if($resultado->num_rows>0){
  	$salida.="<table class='table table-striped table-hover' id='table'>
  	<thead class='table-dark'>
			<tr>
				<th class='title-table'>Codigo venta</th>	
				<th class='title-table'>Fecha venta</th>	
				<th class='title-table'>Numero id empleado</th>	
				<th class='title-table'>Numero id cliente</th>	
				
			</tr>
		</thead>";
	  
  	while($fila = $resultado->fetch_assoc()){
  		$salida.="<tr>
  		
  		<td>".$fila['codigo_venta']."</td>
  		<td>".$fila['fecha_venta']."</td>
  		<td>".$fila['numero_documento_empleado']."</td>
  		<td>".$fila['numero_documento_cliente']."</td>
  		</tr>";
  	}
 $salida.="</tbody></table>";

  }else{
  	$salida.="No hay datos";
  }
  echo $salida;
  $mysqli->close();
 ?>