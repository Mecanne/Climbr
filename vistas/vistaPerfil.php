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
                <!-- Vista del perfil -->
                <div class="panel panel-default">
                    <h3 class="well" style="text-align:center;">Datos del usuario</h3>
                    <hr>
                    <div class="panel-body">
                    <?php
                    echo "<h4>Email: $usuario[EmailUsuario]</h4>";
                    echo "<h4>Contraseña: $usuario[ContrasenaUsuario]</h4>";
                    echo "<h4>Nombre: $usuario[NombreUsuario]</h4>";
                    echo "<h4>Direccion: $usuario[DireccionUsuario]</h4>";

                    ?>
                    <form action="/Climbr/?editar" method="POST">
                        <input class="btn btn-primary" type="submit" value="Editar datos">
                    </form>
                    </div>
                </div>
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