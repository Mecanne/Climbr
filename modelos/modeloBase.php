<?php

function crearConexion($base)
{
    $conexion = mysqli_connect("localhost", "root", "", $base);
    return $conexion;
}

function cerrarConexion($conexion)
{ 
    mysqli_close($conexion);
}


