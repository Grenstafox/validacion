<?php
        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $dbname     = "validacion";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if($conn->connect_error){
            die("conexion fallida: ". $conn->connect_error);
        }

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $fnombre    = mysqli_real_escape_string($conn, $_POST['fnombre']);
            $fapellidos = mysqli_real_escape_string($conn, $_POST['fapellidos']);

            $encription_key = "clave_secreta";

            $sql = "INSERT INTO usuarios(nombre, apellidos) VALUES(
                AES_ENCRYPT('$nombre', '$encription_key'), 
                AES_ENCRYPT('$apellidos', '$encription_key'))";

        if($conn->query($sql)=== TRUE){
            echo "los datos se guardaron correctamente";
        }else{
            echo "conexion fallida: ". $conn->connect_error;
        }
    }

    $conn->close();
?>

<form action="validario.php" method="POST">
    Nombre: <input type= "text" name="nombre" required><br>
    Apellidos: <input type= "text" name="apellidos" required><br>
    <input type="submit" value="Guardar datos"><br>
</form>