<?php

 $mysqli = new mysqli("localhost","root","","granero_la_90");
 $salida="";
 $query = "SELECT * FROM cliente ORDER BY numero_documento_cliente";

if(isset($_POST['consulta'])){
  $q= $mysqli->real_escape_string($_POST['consulta']);
  $query = "SELECT numero_documento_cliente, nombre, direccion,telefono,genero,fecha_nacimiento,correo_electronico FROM cliente WHERE numero_documento_cliente LIKE '%".$q."%' OR nombre LIKE  '%".$q."%' OR direccion LIKE  '%".$q."%' OR telefono LIKE  '%".$q."%' OR genero LIKE  '%".$q."%' OR fecha_nacimiento LIKE  '%".$q."%' OR correo_electronico LIKE  '%".$q."%' OR codigo_usuario LIKE '%".$q."%'";

 }
  $resultado = $mysqli->query($query);
  $salida="";
  if($resultado->num_rows>0){
    $salida.="<table class='table table-striped table-hover' id='table'>
    <thead class='table-dark'>
      <tr>
        <th class='title-table'>Numero documento cliente</th> 
        <th class='title-table'>Nombre</th> 
        <th class='title-table'>Direccion</th>   
        <th class='title-table'>Telefono</th>
        <th class='title-table'>Genero</th>
        <th class='title-table'>Fecha nacimiento</th>
        <th class='title-table'>Correo electronico</th>
        <th class='title-table'>Codigo usuario</th>

        
      </tr>
    </thead>";
    
    while($fila = $resultado->fetch_assoc()){
      $salida.="<tr>
      
      <td>".$fila['numero_documento_cliente']."</td>
      <td>".$fila['nombre']."</td>
      <td>".$fila['direccion']."</td>
      <td>".$fila['telefono']."</td>
      <td>".$fila['genero']."</td>
      <td>".$fila['fecha_nacimiento']."</td>
      <td>".$fila['correo_electronico']."</td>
      <td>".$fila['codigo_usuario']."</td>
      </tr>";
    }
 $salida.="</tbody></table>";

  }else{
    $salida.="No hay datos registrados";
  }
  echo $salida;
  $mysqli->close();
 ?>