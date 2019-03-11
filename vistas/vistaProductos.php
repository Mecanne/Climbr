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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-block" style="background-color: rgb(5,45,90);">
                            <a href="/Climbr"><img class="img-responsive" src="img/logo.png" alt="LOGO"></a>
                        </div>

                    </div>
                </div>
                <nav class="navbar navbar-inverse" style="border-radius: 0px 0px 5px 5px;">
                    <div class="container-fluid">
                        <div class="nav navbar-nav">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">CATEGORÍAS
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/Climbr">TODO</a>
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
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <span class="navbar-brand">Buscar</span>
                        </div>
                        <div class="nav navbar-nav">
                            <form class="navbar-form navbar-left" action="">
                                <?php
                                if (isset($_REQUEST['categoria'])) {
                                    echo '<input type="hidden" name="categoria" value="' . $_REQUEST['categoria'] . '">';
                                }
                                if (isset($_REQUEST['orden'])) {
                                    echo '<input type="hidden" name="orden" value="' . $_REQUEST['orden'] . '">';
                                }
                                ?>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="buscar" placeholder="Buscar...">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="navbar-header">
                            <span class="navbar-brand">Ordenar por: </span>
                        </div>
                        <div class="nav navbar-nav">
                            <form class="navbar-form navbar-rigth" action="">
                                <?php
                                if (isset($_REQUEST['categoria'])) {
                                    echo '<input type="hidden" name="categoria" value="' . $_REQUEST['categoria'] . '">';
                                }
                                if (isset($_REQUEST['buscar'])) {
                                    echo '<input type="hidden" name="buscar" value="' . $_REQUEST['buscar'] . '">';
                                }
                                ?>
                                <div class="input-group">
                                    <select name="orden" id="" class="form-control">
                                        <option value="alf">Orden alfabético</option>
                                        <option value="asc">Precio ascendente</option>
                                        <option value="desc">Precio descendente</option>
                                    </select>
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            Ordenar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </nav>

                <!-- Galeria de productos -->
                <h3>Productos</h3>
                <hr>
                <?php
                if (count($productos) == 0) {
                    echo '<h2 style="text-align:center;">No hay productos con esas caracteristicas</h2>';
                }
                $numeroProducto = 0;
                for ($k = 0; $k < $cantidadFilas; $k++) {
                    echo '<div class="row">';
                    if ($k + 1 == $cantidadFilas && count($productos) % 4 > 0) {
                        $productosEnFila = count($productos) % 4;
                    } else {
                        $productosEnFila = 4;
                    }
                    for ($i = 0; $i < $productosEnFila; $i++) {
                        echo '<div class="col-md-3">
                                    <div class="thumbnail">
                                        <a href="?producto=' . $productos[$numeroProducto]['IDProducto'] . '"> <img src="' . $productos[$numeroProducto]['RutaImagen'] . '" alt="Producto" title="Ver producto" style="width:100%;"></a>
                                        <div class="caption">
                                            <p>' . $productos[$numeroProducto]['NombreProducto'] . '</p>
                                        </div>
                                        <div class="caption text-center">
                                        <h2><span style="color:dodgerblue;">' . $productos[$numeroProducto]['Precio']  . ' €</span></h2>
                                        </div>
                                    </div>
                                </div>';

                        $numeroProducto++;
                    }
                    echo '</div>';
                }
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