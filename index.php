<?php
    session_start();

    require 'modelos/modeloBase.php';
    require 'modelos/modeloUsuarios.php';
    require 'modelos/modeloProductos.php';
    require 'modelos/modeloCategorias.php';
    
    include('controladores/controladorPrincipal.php');
?>