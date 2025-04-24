<?php
$con = new mysqli('localhost', 'root', '', 'formulario_contacto');
if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
} else {
    echo "Conexión exitosa a la base de datos.";
}
?>
