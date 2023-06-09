<?php

class RegistroModelo {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function guardarUsuario($usuario) {
        $tipoDocumento = $usuario['pk_fk_tdoc'];
        $identificacion = $usuario['id_usuario'];
        $nombre = $usuario['nom_persona'];
        $nombre2 = $usuario['nom2_persona'];
        $apellido = $usuario['apell_persona'];
        $apellido2 = $usuario['apell2_persona'];
        $direccion = $usuario['direccion_persona'];
        $telefono = $usuario['telefono'];
        $email = $usuario['email'];
        $contrasena = $usuario['contrasena'];

        // Insertar los datos en la tabla usuarios
        $sql = "INSERT INTO usuarios (pk_fk_tdoc, id_usuario, nom_persona, nom2_persona, apell_persona, apell2_persona, direccion_persona, telefono, email, contrasena) VALUES ('$tipoDocumento', '$identificacion', '$nombre', '$nombre2', '$apellido', '$apellido2', '$direccion', '$telefono', '$email', '$contrasena')";

        if ($this->conn->query($sql) === TRUE) {
            echo "Usuario registrado exitosamente.";
        } else {
            echo "Error al registrar el usuario: " . $this->conn->error;
        }
    }
}
?>

