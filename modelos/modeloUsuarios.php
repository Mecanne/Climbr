<?php

function registrarUsuario($email,$contrasena){
    $conexion = crearConexion('escalada');
    $registrado = true;
    mysqli_query($conexion,"INSERT INTO Usuarios (EmailUsuario,ContrasenaUsuario) VALUES ('$email','$contrasena')")
        or $registrado = false;
    cerrarConexion($conexion);
    return $registrado;
}

function comprobarUsuario($email,$contraseña){
    $conexion = crearConexion('escalada');
    $registrado = true;
    mysqli_query($conexion,"INSERT INTO Usuarios (EmailUsuario,ContrasenaUsuario) VALUES ('$email','$contrasena')")
        or $registrado = false;
    cerrarConexion($conexion);
    return $registrado;
}

function sacarUsuario($email){
    $conexion = crearConexion('escalada');
    $registros = mysqli_query($conexion,"SELECT * FROM Usuarios WHERE EmailUsuario LIKE '%$email%'")
        or die("Problemas con la consulta: ".mysqli_error($conexion));
    cerrarConexion($conexion);
    return mysqli_fetch_array($registros);
}