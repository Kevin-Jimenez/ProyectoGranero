<?php

 $mysqli = new mysqli("localhost","root","","granero_la_90");
 $salida="";
 $query = "SELECT * FROM producto ORDER BY codigo_producto";

if(isset($_POST['consulta'])){
  $q= $mysqli->real_escape_string($_POST['consulta']);
  $query = "SELECT codigo_producto, nombre, marca FROM producto WHERE codigo_producto LIKE '%".$q."%' OR nombre LIKE  '%".$q."%' OR marca LIKE  '%".$q."%'";

 }
  $resultado = $mysqli->query($query);
  $salida="";
  if($resultado->num_rows>0){
    $salida.="<table class='table table-striped table-hover' id='table'>
    <thead class='table-dark'>
      <tr>
        <th class='title-table'>Codigo producto</th> 
        <th class='title-table'>Nombre</th>   
        <th class='title-table'>Marca</th> 
        
        
      </tr>
    </thead>";
    
    while($fila = $resultado->fetch_assoc()){
      $salida.="<tr>
      
      <td>".$fila['codigo_producto']."</td>
      <td>".$fila['nombre']."</td>
      <td>".$fila['marca']."</td>
      </tr>";
    }
 $salida.="</tbody></table>";

  }else{
    $salida.="No hay datos registrados";
  }
  echo $salida;
  $mysqli->close();
 ?>
