<?php

 $mysqli = new mysqli("localhost","root","","granero_la_90");
 $salida="";
 $query = "SELECT * FROM detalle_venta ORDER BY codigo_detalle_venta";

if(isset($_POST['consulta'])){
  $q= $mysqli->real_escape_string($_POST['consulta']);
  $query = "SELECT codigo_detalle_venta,codigo_venta,codigo_producto FROM detalle_venta WHERE codigo_detalle_venta LIKE '%".$q."%' OR codigo_venta LIKE  '%".$q."%' OR codigo_producto LIKE  '%".$q."%'";
 }
  $resultado = $mysqli->query($query);
  $salida="";
  if($resultado->num_rows>0){
    $salida.="<table class='table table-striped table-hover' id='table'>
    <thead class='table-dark'>
      <tr>
        <th class='title-table'>Codigo detalle venta</th> 
        <th class='title-table'>Codigo venta</th> 
        <th class='title-table'>Codigo producto</th>   
        
      </tr>
    </thead>";
    
    while($fila = $resultado->fetch_assoc()){
      $salida.="<tr>
      
      <td>".$fila['codigo_detalle_venta']."</td>
      <td>".$fila['codigo_venta']."</td>
      <td>".$fila['codigo_producto']."</td>
      </tr>";
    }
 $salida.="</tbody></table>";

  }else{
    $salida.="No hay datos registrados";
  }
  echo $salida;
  $mysqli->close();
 ?>