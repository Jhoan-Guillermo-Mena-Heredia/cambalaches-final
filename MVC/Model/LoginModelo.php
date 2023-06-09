<?php

class LoginModelo {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function verificarCredenciales($email, $contrasena) {
        $email = $this->conn->real_escape_string($email);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND contrasena = '$contrasena'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
?>

