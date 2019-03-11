<?php

function sacarCategorias(){
    $conexion = crearConexion('escalada');
    $registros = mysqli_query($conexion,"SELECT *
                                            FROM categorias");
    while($categoria = mysqli_fetch_array($registros)){
        $categorias[] = $categoria;
    }
    cerrarConexion($conexion);
    return $categorias;
}
