<?php
session_start(); // Asegúrate de que la sesión esté iniciada
require_once dirname(__FILE__) . '/config.php';
require_once 'Database.php'; // Incluye la clase Database

// Instanciamos la clase Database
$db = new Database();

// Recibimos los datos del formulario
$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$mensaje = $_POST['mensaje'] ?? '';


// Validación simple
if (!empty($nombre) && !empty($correo) && !empty($mensaje)) {
  // Intentamos insertar el mensaje
  if ($db->insertMessage($nombre, $correo, $mensaje)) {
    // Redirigir a la página de agradecimiento
    echo "✅ Mensaje enviado correctamente.";
  } else {
    echo "❌ Error al enviar el mensaje.";
  }
} else {
  echo "⚠️ Todos los campos son obligatorios.";
}

// Cerrar la conexión
$db->closeConnection();
?>



