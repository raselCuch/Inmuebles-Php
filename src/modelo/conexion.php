<?php

// $conexion=new mysqli("localhost", "root", "root", "gestion_inmuebles", 3307, '/var/run/mysqld/mysqld.sock');
// $conexion->set_charset ("utf8");
// // echo "hello2";

$conexion = new mysqli( 'mysql_db', 'root' , 'root' , 'gestion_inmuebles');
$conexion->set_charset ("utf8");

if($conexion){
// echo "Connected !!!";
// echo "Soy rasel cucho !!!";
}

?>
