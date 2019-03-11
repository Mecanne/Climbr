<?php

if (isset($_REQUEST['producto'])) {
    include 'vistas/vistaProducto.php';
} else {
    if (isset($_REQUEST['mostrar']) || isset($_REQUEST['categoria']) || isset($_REQUEST['buscar']) || isset($_REQUEST['orden'])) {
        include 'vistas/vistaProductos.php';
    } else {
        include 'vistas/vistaPrincipal.php';
    }
}

