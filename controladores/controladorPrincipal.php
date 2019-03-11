<?php
 // Cargamos todos los datos necesarios para ver los productos

// Cargamos las categorias
$categorias = sacarCategorias();

//Comprobamos si el ususario quiere iniciar sesión
if(isset($_REQUEST['acceder'])){
    if(existeUsuario($_REQUEST['email'],$_REQUEST['contrasena'])){
        $_SESSION['email'] = $_REQUEST['email'];
    }
}else if(isset($_REQUEST['registrar'])){
    if($_REQUEST['confirmacionContrasena'] == $_REQUEST['contrasena'] && $_REQUEST['email'] != '' && $_REQUEST['contrasena'] != ''){
        if(registrarUsuario($_REQUEST['email'],$_REQUEST['contrasena'])){
            $registrado = true;
            $_SESSION['email'] = $_REQUEST['email'];
        }else{
            $registrado = false;
        }
    }else{
        $registrado = false;
    }
}

// Cargamos los productos
if (isset($_REQUEST['producto'])) {
    $producto = sacarProducto($_REQUEST['producto']);
} else {
    //Cargamos los productos
    if (isset($_GET['categoria'])) {
        if (isset($_REQUEST['orden'])) {
            if (isset($_REQUEST['buscar'])) {
                $productos = sacarProductosCategoria($_REQUEST['categoria'], $_REQUEST['orden'], $_REQUEST['buscar']);
            } else {
                $productos = sacarProductosCategoria($_REQUEST['categoria'], $_REQUEST['orden']);
            }
        } else {
            if (isset($_REQUEST['buscar'])) {
                $productos = sacarProductosCategoria($_REQUEST['categoria'], '', $_REQUEST['buscar']);
            } else {
                $productos = sacarProductosCategoria($_REQUEST['categoria']);
            }
        }
    } else {
        if (isset($_REQUEST['orden'])) {
            if (isset($_REQUEST['buscar'])) {
                $productos = sacarProductos($_REQUEST['orden'], $_REQUEST['buscar']);
            } else {
                $productos = sacarProductos($_REQUEST['orden']);
            }
        } else {
            if (isset($_REQUEST['buscar'])) {
                $productos = sacarProductos('', $_REQUEST['buscar']);
            } else {
                $productos = sacarProductos();
            }
        }
    }
    $cantidadFilas = ceil(count($productos) / 4);
}

if (isset($_SESSION['email'])) {
    include 'controladores/controladorSesion.php';
} else {
    include 'controladores/controladorInvitado.php';
}
