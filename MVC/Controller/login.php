<?php
require_once 'Model/LoginModelo.php';

// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cambalaches";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear una instancia del modelo de inicio de sesión
$loginModelo = new LoginModelo($conn);

// Manejar la solicitud de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    // Verificar las credenciales del usuario
    $usuario = $loginModelo->verificarCredenciales($email, $contrasena);

    if ($usuario != null) {
        // Iniciar sesión y redireccionar al usuario a la página de inicio
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: View/PagPrincipal.html");
    } else {
        // Credenciales inválidas, mostrar mensaje de error
        $mensajeError = "Credenciales inválidas. Inténtalo nuevamente.";
    }
}

$conn->close();
?>
