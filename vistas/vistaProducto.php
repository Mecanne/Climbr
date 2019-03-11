<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu principal</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div style="display:block;width:100%;text-align:center;">
                <h2 style="color:white;">ACCESO</h2>
            </div>
            <div class="container-fluid">
                <div class="btn-group-vertical btn-group-lg" style="width:100%;">
                    <button data-toggle="modal" data-target="#modal-acceso" class="btn btn-primary">Acceder</button>
                    <button data-toggle="modal" data-target="#modal-registro" class="btn btn-warning">Registrarse</button>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <h2 style="color:white;">CATEGORIAS</h2>
                </li>
                <li>
                    <a href="/Climbr/?mostrar=todo">TODO</a>
                </li>
                <?php
                for ($i = 0; $i < count($categorias); $i++) {
                    if (isset($_REQUEST['categoria'])) {
                        if ($categorias[$i]['IDCategoria'] == $_REQUEST['categoria']) {
                            $textActive = ' style="color:white;font-weight:bold;"';
                        } else {
                            $textActive = '';
                        }
                    } else {
                        $textActive = '';
                    }
                    echo '<li><a href="/Climbr?categoria=' . $categorias[$i]['IDCategoria'] . '"' .  $textActive . '>';
                    echo $categorias[$i]['NombreCategoria'];
                    echo '</a></li>';
                }
                ?>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <?php
                if (isset($_REQUEST['registrar'])) {
                    ?>
                <div id="message">
                    <div style="padding: 5px;">
                        <div id="inner-message" class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            El usuario no se ha podido registrar
                        </div>
                    </div>
                </div>
                <?php

            }
            if (isset($_REQUEST['acceder'])) {
                ?>
                <div id="message">
                    <div style="padding: 5px;">
                        <div id="inner-message" class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            El usuario o contraseña son incorrectos
                        </div>
                    </div>
                </div>
                <?php

            }
            ?>
                <!-- Logo de la pagina web -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-block" style="background-color: rgb(5,45,90);">
                            <a href=""><img class="img-responsive" src="img/logo.png" alt="LOGO"></a>
                        </div>

                    </div>
                </div>
                <!-- Barra de navegacion -->
                <nav class="navbar navbar-inverse" style="border-radius: 0px 0px 5px 5px;">
                    <div class="container-fluid">
                        <div class="nav navbar-nav">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">CATEGORÍAS
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/Climbr/?mostrar=todo">TODO</a>
                                    </li>
                                    <?php
                                    for ($i = 0; $i < count($categorias); $i++) {
                                        echo '<li><a href="/Climbr?categoria=' . $categorias[$i]['IDCategoria'] . '">';
                                        echo $categorias[$i]['NombreCategoria'];
                                        echo '</a></li>';
                                    }
                                    ?>
                                </ul>
                            </li>
                        </div>
                        <ul class="nav navbar-nav navbar-right" style="margin-right:10px;">
                            <li>
                                <div class="btn-group" style="width:100%;">
                                    <button data-toggle="modal" data-target="#modal-acceso" class="btn btn-primary navbar-btn">Acceder</button>
                                    <button data-toggle="modal" data-target="#modal-registro" class="btn btn-warning navbar-btn">Registrarse</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- Vista del producto -->
                <?php
                echo '<img style="float:left;" src="' . $producto['RutaImagen'] . '" alt="producto">';
                echo '<h3>' . $producto['NombreProducto'] . '</h3>';
                echo '<h3>Precio: <span style="color:dodgerblue;">' . $producto['Precio'] . ' €</span></h3>';

                ?>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

        <footer class="page-footer font-small blue">

            <!-- Copyright -->
            <div class="container text-center">
                <span>© 2019 No-Copyright:</span>
                <a href="https://github.com/Mecanne" target="_blank"> Daniel Díaz Navas</a>
            </div>

        </footer>
        <!-- Modal Acceso -->
        <div id="modal-acceso" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Acceso</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="contrasena">Contraseña:</label>
                                    <input type="password" class="form-control" id="contrasena" name="contrasena">
                                </div>

                                <button type="submit" class="btn btn-info btn-md" name="acceder">Acceder</button>
                                <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal Registro -->
        <div id="modal-registro" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Registro</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="contrasena">Contraseña:</label>
                                    <input type="password" class="form-control" id="contrasena" name="contrasena">
                                </div>
                                <div class="form-group">
                                    <label for="confirmacionContrasena">Confirmar contraseña:</label>
                                    <input type="password" class="form-control" id="confirmacionContrasena" name="confirmacionContrasena">
                                </div>
                                <div style="display:flex;justify-content:space-around;">
                                    <button type="submit" class="btn btn-info btn-lg" name="registrar">Registrar</button>
                                    <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html> 