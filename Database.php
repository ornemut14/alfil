<?php
class Database
{
  private $host;
  private $user;
  private $pass;
  private $dbname;
  private $con;

  public function __construct()
  {
    $this->host = 'localhost';
    $this->user = 'root';
    $this->pass = '';
    $this->dbname = 'formulario_contacto';  
    $this->con = $this->connect();
  }

  private function connect()
  {
    try {
      // Conexión a la base de datos
      $con = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
      if ($con->connect_error) {
        throw new Exception("Conexión fallida: " . $con->connect_error);
      }
      return $con;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
      exit;
    }
  }

  public function getConnection()
  {
    return $this->con;
  }

  public function closeConnection()
  {
    if ($this->con) {
      $this->con->close();
    }
  }

  // Método para insertar datos
  public function insertMessage($nombre, $correo, $mensaje)
  {
    // Preparar la consulta
    $stmt = $this->con->prepare("INSERT INTO mensajes (nombre, correo, mensaje) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $correo, $mensaje); // Vincula los parámetros

    // Ejecutar la consulta y verificar si tuvo éxito
    if ($stmt->execute()) {
      return true;  // Si la inserción fue exitosa
    } else {
      return false;  // Si ocurrió un error
    }

    $stmt->close();
  }
}
?>

