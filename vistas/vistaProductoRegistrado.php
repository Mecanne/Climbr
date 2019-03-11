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
                <h2 style="color:white;">PERFIL</h2>

            </div>
            <div style="display:block;width:100%;">
                <ul style="text-decoration:none;list-style:none;">
                    <li><a href="?perfil"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                    <li><a href="?salir"><span class="glyphicon glyphicon-off"></span> Cerrar sesion</a></li>
                </ul>
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
                <!-- Logo de la pagina web -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-block" style="background-color: rgb(5,45,90);">
                            <a href="/Climbr"><img class="img-responsive" src="img/logo.png" alt="LOGO"></a>
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
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="?perfil"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                            <li><a href="?salir"><span class="glyphicon glyphicon-off"></span> Cerrar sesion</a></li>
                        </ul>
                    </div>
                </nav>
                <!-- Vista del producto -->
                <?php
                echo '<img style="float:left;" src="' . $producto['RutaImagen'] . '" alt="producto">';
                echo '<h3>' . $producto['NombreProducto'] . '</h3>';
                echo '<h3 class="alert alert-info" style="text-align:center;">' . $producto['Descuento'] . ' % de descuento</h3>';
                echo '<h3 class="panel">Precio: <span style="color:red;text-decoration:line-through;">' . $producto['Precio']  . ' €</span> - <span style="color:dodgerblue;">' . number_format($producto['Precio'] * ((100 - $producto['Descuento']) / 100), 2) . ' €</span></h3>';
                ?>
                <button class="btn btn-info btn-lg">
                    Añadir al carrito <span class="glyphicon glyphicon-shopping-cart"></span>
                </button>
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
    </div>
</body>

</html> 