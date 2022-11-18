<?php

//essa pagina é somente do admin.
    include "include/banco.php";

    if(isset($_COOKIE['admin'])){ 
      header("Location:homeadmin.php?inicio=");
    }
    if(isset($_COOKIE['usuario'])){
      header("Location:homeusuario.php?inicio=");
    }
    if(isset($_COOKIE['tecnico'])){
        header("Location:hometech.php?inicio=");
    }
    if(empty($_COOKIE[''])){
        header("Refresh:0.9, ../index.php");
    }
    
    
?>