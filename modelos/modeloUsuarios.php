<?php

function registrarUsuario($email, $contrasena)
{
    $conexion = crearConexion('escalada');
    $registrado = true;
    mysqli_query($conexion, "INSERT INTO Usuarios (EmailUsuario,ContrasenaUsuario) VALUES ('$email','$contrasena')")
        or $registrado = false;
    cerrarConexion($conexion);
    return $registrado;
}

function comprobarUsuario($email, $contraseña)
{
    $conexion = crearConexion('escalada');
    $registrado = true;
    mysqli_query($conexion, "INSERT INTO Usuarios (EmailUsuario,ContrasenaUsuario) VALUES ('$email','$contraseña')")
        or $registrado = false;
    cerrarConexion($conexion);
    return $registrado;
}

function sacarUsuario($email)
{
    $conexion = crearConexion('escalada');
    $registros = mysqli_query($conexion, "SELECT * FROM Usuarios WHERE EmailUsuario LIKE '%$email%'")
        or die("Problemas con la consulta: " . mysqli_error($conexion));
    cerrarConexion($conexion);
    return mysqli_fetch_array($registros);
}

function existeUsuario($email, $contrasena)
{
    $conexion = crearConexion("escalada");
    // Hacemos la consulta para ver si existe el usuario registrado.
    $registros = mysqli_query($conexion, "SELECT * 
                                            FROM usuarios 
                                            WHERE EmailUsuario = '" . $email . "' AND ContrasenaUsuario = '" . $contrasena . "'");
    if ($reg = mysqli_fetch_array($registros)) {
        return true;
    } else {
        return false;
    }
}

function actualizarPerfil($emailUsuario,$contrasena,$nombre,$direccion){
    $conexion = crearConexion('escalada');
    mysqli_query($conexion, "UPDATE usuarios
                                SET ContrasenaUsuario = '$contrasena',
                                    NombreUsuario = '$nombre',
                                    DireccionUsuario = '$direccion'
                                WHERE EmailUsuario = '$emailUsuario'")
        or $registrado = false;
    cerrarConexion($conexion);
    return true;
}

