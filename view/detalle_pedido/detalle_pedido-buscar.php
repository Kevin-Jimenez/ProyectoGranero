<?php

 $mysqli = new mysqli("localhost","root","","granero_la_90");
 $salida="";
 $query = "SELECT * FROM detalle_pedido ORDER BY codigo_detalle_pedido";

if(isset($_POST['consulta'])){
  $q= $mysqli->real_escape_string($_POST['consulta']);
  $query = "SELECT codigo_detalle_pedido,codigo_producto, numero_documento_proveedor FROM detalle_pedido WHERE codigo_detalle_pedido LIKE '%".$q."%' OR codigo_producto LIKE  '%".$q."%' OR numero_documento_proveedor LIKE  '%".$q."%'";


 }
  $resultado = $mysqli->query($query);
  $salida="";
  if($resultado->num_rows>0){
    $salida.="<table class='table table-striped table-hover' id='table'>
    <thead class='table-dark'>
      <tr>
        <th class='title-table'>Codigo detalle pedido</th> 
        <th class='title-table'>Codigo producto</th> 
        <th class='title-table'>Numero documento proveedor</th>   
        
      </tr>
    </thead>";
    
    while($fila = $resultado->fetch_assoc()){
      $salida.="<tr>
      
      <td>".$fila['codigo_detalle_pedido']."</td>
      <td>".$fila['codigo_producto']."</td>
      <td>".$fila['numero_documento_proveedor']."</td>
      </tr>";
    }
 $salida.="</tbody></table>";

  }else{
    $salida.="No hay datos registrados";
  }
  echo $salida;
  $mysqli->close();
 ?>