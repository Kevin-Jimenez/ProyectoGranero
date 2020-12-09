<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inicie Sesion</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<style type="text/css">
body{
         background: linear-gradient(#000000, #f3f781);
         background: url(Librerias/imagenes/90.png) no-repeat center top;

      }
      form{
        margin: auto;
        width: 100%;
        max-width: 500px;
        padding: 30px;
        border:1px solid rgba(0,0,0,2);
      }
      *{
        font-family: "Homer Simpson", cursive;
        box-sizing: border-box;
      }
     h2{
        text-align: center;
        margin-bottom: 30px;
        color:#000000; 
   }

   input{
    display: block;
    padding: 10px;
    width: 100%;
    font-size: 20px;
    margin: 30px 0;
   }
   input[type="submit"]{
    background: linear-gradient(#f3f781, #ff8949);
    border: 0;
    color: brown;
    opacity:0.8;
    cursor: pointer;
    border-radius: 20px;
    margin-bottom: 0;
    border-radius: 35px 0px 35px 0px;
   -moz-border-radius: 35px 0px 35px 0px;
   -webkit-border-radius: 35px 0px 35px 0px;
   
   }
    .login-form {
        width: 600px;
        margin: 150px auto;

    }
    .login-form form {
        margin-bottom: 15px;
        font-family:"Homer Simpson", cursive;
        background: linear-gradient(gold, #ffffff, gold);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
        border: gray 5px outset;
        border-radius: 90px 0px 90px 0px;
        -moz-border-radius: 90px 0px 90px 0px;
        -webkit-border-radius: 90px 0px 90px 0px;

    }
    .login-form h2 {
        margin: 0 0 15px;

        
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 3px;
        border-radius: 35px 0px 35px 0px;
        -moz-border-radius: 35px 0px 35px 0px;
        -webkit-border-radius: 35px 0px 35px 0px;
         
    }
    .btn {      
        color:black;  
        font-size: 15px;
        font-weight: bold;

    }
    .form-group{
      text-align: center;
      color:black;  
    }
      
</style>

</head>
<link rel="shortcut icon" href="Librerias/imagenes/90.png">
<body>
 
<div class="login-form">
    <form action="?c=usuario&a=Ingreso" method="post">
        <h2 class="text-center">Inicie Sesion</h2> 
        <p align="center">Granero La 90</p>
        <label>Usuario</label>      
        <div class="form-group">

            
         <input type="text" class="form-control" name="codigo_usuario" placeholder="Codigo usuario" required="required">
        </div>
        <label>Contraseña</label>
        <div class="form-group">
            <input type="password" class="form-control" name="contraseña" placeholder="Contraseña" required="required">
        </div>
        <div class="form-group">
            <input type="submit" name="Ingresar" class="btn btn-primary btn-block" value="Iniciar Sesion">
        </div>
        <div class="form-group">
            <a type="text" href="Php/RecuperarContraseña.php" name="Recuperar"  class="text-center" >Recordar Contraseña?</a>
        </div>        
    </form>
</div>
</body>

</html>                                                                 