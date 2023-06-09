<?php
require_once 'Model/RegistroModelo.php';

// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cambalaches";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear una instancia del modelo de registro
$registroModelo = new RegistroModelo($conn);

// Manejar la solicitud de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoDocumento = $_POST["tipo_documento"];
    $identificacion = $_POST["identificacion"];
    $nombre = $_POST["nombre"];
    $nombre2 = $_POST["nombre2"];
    $apellido = $_POST["apellido"];
    $apellido2 = $_POST["apellido2"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    // Guardar los datos en la base de datos
    $usuario = [
        "pk_fk_tdoc" => $tipoDocumento,
        "id_usuario" => $identificacion,
        "nom_persona" => $nombre,
        "nom2_persona" => $nombre2,
        "apell_persona" => $apellido,
        "apell2_persona" => $apellido2,
        "direccion_persona" => $direccion,
        "telefono" => $telefono,
        "email" => $email,
        "contrasena" => $contrasena
    ];

    $registroModelo->guardarUsuario($usuario);

    // Redireccionar al usuario a la página de inicio de sesión
    header("Location: login.html");
}

$conn->close();
?>

