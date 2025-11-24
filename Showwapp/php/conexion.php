<?php
     $server ="localhost";
     $puerto ="3306";
     $user ="root";
     $password ="";
     $name_db = "shopwapp";
     $con = new mysqli($server,$user,$password,$name_db);
     if ($con->connect_error ){
        die ("no se puede conectar la base de datos");

     }

?>