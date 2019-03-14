<?php

$usuario = sacarUsuario($_SESSION['email']);

if(isset($_REQUEST['salir'])){
    session_unset();
    session_destroy();
    $_SESSION = array();
    header("Location: ./");
}else if(isset($_REQUEST['perfil'])){
    include 'vistas/vistaPerfil.php';
}else if(isset($_REQUEST['editar'])){
    if(isset($_REQUEST['editarperfil'])){
        if($_REQUEST['contrasena'] != ''){
            actualizarPerfil($_SESSION['email'],$_REQUEST['contrasena'],$_REQUEST['nombre'],$_REQUEST['direccion']);
            $usuario = sacarUsuario($_SESSION['email']);
        }
        include 'vistas/vistaPerfil.php';
    }else{
        include 'vistas/vistaEditar.php';
    }
}else{
    if (isset($_REQUEST['producto'])) {
        include 'vistas/vistaProductoRegistrado.php';
    } else {
        if (isset($_REQUEST['mostrar']) || isset($_REQUEST['categoria']) || isset($_REQUEST['buscar']) || isset($_REQUEST['orden'])) {
            include 'vistas/vistaProductosRegistrado.php';
        } else {
            include 'vistas/vistaPrincipalRegistrado.php';
        }
    }
}