<?php

 $mysqli = new mysqli("localhost","root","","granero_la_90");
 $salida="";
 $query = "SELECT * FROM usuario ORDER BY codigo_usuario";

 if(isset($_POST['consulta'])){
 	$q= $mysqli->real_escape_string($_POST['consulta']);
 	$query = "SELECT codigo_usuario, rol,usuario,numero_documento_empleado FROM usuario WHERE codigo_usuario LIKE '%".$q."%' OR rol LIKE  '%".$q."%' OR usuario LIKE  '%".$q."%'";
 }
  $resultado = $mysqli->query($query);
  $salida="";
  if($resultado->num_rows>0){
  	$salida.="<table class='table table-striped table-hover' id='table'>
  	<thead class='table-dark'>
			<tr>
				<th class='title-table'>Codigo usuario</th>	
				<th class='title-table'>Rol</th>	
        <th class='title-table'>Usuario</th>
			</tr>
		</thead>";
	  
  	while($fila = $resultado->fetch_assoc()){
  		$salida.="<tr>
  		
  		<td>".$fila['codigo_usuario']."</td>
  		<td>".$fila['rol']."</td>
      <td>".$fila['usuario']."</td>
  		</tr>";
  	}
 $salida.="</tbody></table>";

  }else{
  	$salida.="No hay datos";
  }
  echo $salida;
  $mysqli->close();
 ?>