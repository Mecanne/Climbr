<?php

function sacarProductos($orden = '',$busqueda = '')
{
    $conexion = crearConexion('escalada');
    if($busqueda == ''){
        switch ($orden) {
            case 'alf':
                $consulta = "SELECT * FROM productos ORDER BY NombreProducto ASC";
                break;
            case 'asc';
                $consulta = "SELECT * FROM productos ORDER BY Precio ASC";
                break;
            case 'desc':
                $consulta = "SELECT * FROM productos ORDER BY Precio DESC";
                break;
            default:
                $consulta = "SELECT * FROM productos";
        }
    }else{
        switch ($orden) {
            case 'alf':
                $consulta = "SELECT * FROM productos WHERE NombreProducto LIKE '%$busqueda%' ORDER BY NombreProducto ASC";
                break;
            case 'asc';
                $consulta = "SELECT * FROM productos WHERE NombreProducto LIKE '%$busqueda%' ORDER BY Precio ASC";
                break;
            case 'desc':
                $consulta = "SELECT * FROM productos WHERE NombreProducto LIKE '%$busqueda%' ORDER BY Precio DESC";
                break;
            default:
                $consulta = "SELECT * FROM productos WHERE NombreProducto LIKE '%$busqueda%'";
        }
    }
    $registros = mysqli_query($conexion, $consulta) or die("Problemas con la consulta: " . mysqli_error($conexion));
    $productos = array();
    while ($producto = mysqli_fetch_array($registros)) {
        $productos[] = $producto;
    }
    cerrarConexion($conexion);
    return $productos;
}

function sacarProductosCategoria($idcategoria, $orden = '',$busqueda = '')
{
    $conexion = crearConexion('escalada');
    if($busqueda == ''){
        switch ($orden) {
            case 'alf':
                $consulta = "SELECT * FROM productos WHERE IDCategoria = $idcategoria ORDER BY NombreProducto ASC";
                break;
            case 'asc';
                $consulta = "SELECT * FROM productos WHERE IDCategoria = $idcategoria ORDER BY Precio ASC";
                break;
            case 'desc':
                $consulta = "SELECT * FROM productos WHERE IDCategoria = $idcategoria ORDER BY Precio DESC";
                break;
            default:
                $consulta = "SELECT * FROM productos WHERE IDCategoria = $idcategoria";
        }
    }else{
        switch ($orden) {
            case 'alf':
                $consulta = "SELECT * FROM productos WHERE IDCategoria = $idcategoria AND NombreProducto LIKE '%$busqueda%' ORDER BY NombreProducto ASC";
                break;
            case 'asc';
                $consulta = "SELECT * FROM productos WHERE IDCategoria = $idcategoria AND NombreProducto LIKE '%$busqueda%' ORDER BY Precio ASC";
                break;
            case 'desc':
                $consulta = "SELECT * FROM productos WHERE IDCategoria = $idcategoria AND NombreProducto LIKE '%$busqueda%' ORDER BY Precio DESC";
                break;
            default:
                $consulta = "SELECT * FROM productos WHERE IDCategoria = $idcategoria AND NombreProducto LIKE '%$busqueda%'";
        }
    }
    $registros = mysqli_query($conexion, $consulta);
    $productos = array();
    while ($producto = mysqli_fetch_array($registros)) {
        $productos[] = $producto;
    }
    cerrarConexion($conexion);
    return $productos;
}
