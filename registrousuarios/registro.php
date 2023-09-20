<?php
include 'cn.php';
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$telefono = $_POST["telefono"];
$expresion = "/\w+@w+\.[a-zA-Z]{2,6}/";

$insertar = "INSERT INTO usuario(nombre, apellidos, correo, usuario, clave, telefono)
VALUES ('$nombre','$apellidos','$correo','$usuario','$clave','$telefono')";

if(isset($_POST['boton'])){
    if(empty($nombre) || empty($apellidos) || empty($correo) || empty($usuario) || empty($clave) || empty($telefono))
    {
        echo '<script language = "javascript">
        alert("Por favor rellenar todos los campo");
        windows.location("index.html");
        </script>';
        exit();
    }
}

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario='$usuario'");
if(mysqli_num_rows($verificar_usuario) > 0){
    echo '¡ERROR! el usuario ya existe';
    
    echo '<script language = "javascript">alert("El usuario ya existe, intente de nuevo");window.location="index.html";
    windows.history.go(-1);
    </script>';
    exit;
}

$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo'");
if(mysqli_num_rows($verificar_correo) > 0){
    echo '¡ERROR! el correo ya existe';
    
    echo '<script language = "javascript">alert("El usuario ya existe, intente de nuevo");window.location="index.html"
    windows.history.go(-1);
    </script>';
    exit;
}

if(strlen($nombre)>10){
    echo '<script language = "javascript">alert("se execedio de la capacidad del campo nombre");window.location="index.html"
    windows.history.go(-1);
    </script>';
    exit;
}

if(strlen($apellidos)>10){
    echo '<script language = "javascript">alert("se execedio de la capacidad del campo apellidos");window.location="index.html"
    windows.history.go(-1);
    </script>';
}

if(strlen($correo)>40){
    echo '<script language = "javascript">alert("se execedio de la capacidad del campo correo");window.location="index.html"
    windows.history.go(-1);
    </script>';
}

if(preg_match("$expresion", $correo)){
 
    echo '<script language = "javascript">alert("El correo invalido");window.location="index.html"
    windows.history.go(-1);
    </script>';
    exit;
}

if(strlen($usuario)>20){
    echo '<script language = "javascript">alert("se execedio de la capacidad del campo usuario");window.location="index.html"
    windows.history.go(-1);
    </script>';
}

if(strlen($clave)>20){
    echo '<script language = "javascript">alert("se execedio de la capacidad del campo clave");window.location="index.html"
    windows.history.go(-1);
    </script>';
}

if(strlen($telefono)>10){
    echo '<script language = "javascript">alert("se execedio de la capacidad del campo telefono");window.location="index.html"
    windows.history.go(-1);
    </script>';
}

$resultado = mysqli_query($conexion,$insertar);
if(!$resultado){
    echo 'ERROR AL registrar usuario';
 
    echo '<script language = "javascript">alert("El usuario ya existe, intente de nuevo");window.location="index.html"
    windows.history.go(-1);
    </script>';
    exit;
}
else{
    echo 'Usuario registro exiosamente';
    
    echo '<script language = "javascript">alert("Usuario registro exiosamente");window.location="index.html"
    windows.history.go(-1);
    </script>';
   
}


mysqli_close($conexion);

?>