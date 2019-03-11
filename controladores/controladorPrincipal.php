<?php
 // Cargamos todos los datos necesarios para ver los productos

// Cargamos las categorias
$categorias = sacarCategorias();

//Cargamos los productos
if (isset($_GET['categoria'])) {
    if(isset($_REQUEST['orden'])){
        if(isset($_REQUEST['buscar'])){
            $productos = sacarProductosCategoria($_REQUEST['categoria'],$_REQUEST['orden'],$_REQUEST['buscar']);
        }else{
            $productos = sacarProductosCategoria($_REQUEST['categoria'],$_REQUEST['orden']);
        }
    }else{
        if(isset($_REQUEST['buscar'])){
            $productos = sacarProductosCategoria($_REQUEST['categoria'],'',$_REQUEST['buscar']);
        }else{
            $productos = sacarProductosCategoria($_REQUEST['categoria']);
        }
    }
} else {
    if(isset($_REQUEST['orden'])){
        if(isset($_REQUEST['buscar'])){
            $productos = sacarProductos($_REQUEST['orden'],$_REQUEST['buscar']);
        }else{
            $productos = sacarProductos($_REQUEST['orden']);
        }
    }else{
        if(isset($_REQUEST['buscar'])){
            $productos = sacarProductos('',$_REQUEST['buscar']);
        }else{
            $productos = sacarProductos();
        }
    }
}

$cantidadFilas = ceil(count($productos) / 4);

if (isset($_SESSION['usuario'])) {
    if(!isset($_REQUEST['mostrar'])){
        include 'vistas/vistaPrincipalRegistrado.php';
    }else{
        include 'vistas/vistaProductosRegistrado.php';
    }
} else {
    if(isset($_REQUEST['mostrar']) || isset($_REQUEST['categoria']) || isset($_REQUEST['buscar']) || isset($_REQUEST['orden'])){
        include 'vistas/vistaProductos.php';
    }else{
        include 'vistas/vistaPrincipal.php';
    }
}
