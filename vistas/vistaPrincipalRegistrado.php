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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-block" style="background-color: rgb(5,45,90);">
                            <a href=""><img class="img-responsive" src="img/logo.png" alt="LOGO"></a>
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
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img style="display:block;margin:auto;" src="img/carousel1.jpg" alt="Escalada">
                            <div class="carousel-caption">
                                <h3 style="padding:10px;background-color:rgba(0,0,0,0.3)">BIENVENIDO</h3>
                            </div>
                        </div>

                        <div class="item">
                            <img style="display:block;margin:auto;" src="img/carousel2.jpg" alt="Escalada">
                            <div class="carousel-caption">
                                <h3 style="padding:10px;background-color:rgba(0,0,0,0.3)">¡Impresionate con nuestros precios!</h3>
                            </div>
                        </div>

                        <div class="item">
                            <img style="display:block;margin:auto;" src="img/carousel3.jpg" alt="Escalada">
                            <div class="carousel-caption">
                                <h3 style="padding:10px;background-color:rgba(0,0,0,0.3)">¡Escala como un profesional!</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <h3>Productos en promoción</h3>
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
                                        <a href="?producto=' . $productos[$numeroProducto]['IDProducto'] . '"> <img src="' . $productos[$numeroProducto]['RutaImagen'] . '" alt="Fjords" style="width:100%;"></a>
                                        <div class="caption">
                                            <p>' . $productos[$numeroProducto]['NombreProducto'] . '</p>
                                        </div>
                                        <div class="caption text-center">
                                        <h4>' . $productos[$numeroProducto]['Descuento'] . ' % de descuento</h4>
                                        <h4><span style="color:red;text-decoration:line-through;">' . $productos[$numeroProducto]['Precio']  . ' €</span> - <span style="color:dodgerblue;">' . number_format($productos[$numeroProducto]['Precio'] * ((100 - $productos[$numeroProducto]['Descuento']) / 100), 2) . ' €</span></h4>
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
    </div>
</body>

</html> 