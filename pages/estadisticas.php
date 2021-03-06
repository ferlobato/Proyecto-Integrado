<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>In Game Web</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/indexEstadisticas.js"></script>
    <link rel="stylesheet" href="../fonts/fontawesome-free-5.15.4-web/css/all.min.css">
</head>

<body class="bg-dark d-flex flex-column min-vh-100">
    <header>
        <div class="d-sm-none d-block col-12" style="height: 60px;"></div>
        <div class="navbar navbar-dark bg-dark shadow-sm superior justify-content-center">
            <div class="container row">
                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="navbar-brand d-flex align-items-center">
                        <img src="../img/logo.gif" class="logo2" alt="" srcset="">
                    </div>
                </div>
                <div class="d-sm-none d-block col-12" style="height: 90px;">
                </div>
                <div class="col-12 col-sm-6 col-md-9 col-lg-9 mt-5 mt-sm-0">
                    <nav class="nav justify-content-center justify-content-sm-end">
                        <?php
                        if (isset($_SESSION['sesion_iniciada'])) {
                            echo "<p class='nav-link active text-white'>" . $_SESSION["nombre"] . "</p>";
                            echo "<a class='nav-link text-white' href='biblioteca.php'>Biblioteca</a>
                            <a class='nav-link text-white' href='' data-bs-toggle='modal' data-bs-target='#exampleModal3'>Información</a>
                            <form action='' method='post'>
                            <input class='nav-link active text-white bg-dark border-0' type='submit' name='cierre' value='Cerrar Sesión' style='margin-left:10%'/></form>";
                            if (isset($_POST['cierre'])) {
                                $_SESSION["sesion_iniciada"] = false;
                                session_destroy();
                                echo "<script type='text/javascript'>
                                window.location.href='../index.php';
                                </script>";
                            }
                        } else {
                            echo "<script type='text/javascript'>
                            window.location.href='../index.php';
                            </script>";
                        }
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-4 mb-5 pb-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 text-white">
                <?php
                include "../bd/conexion.php";
                if (!$conn) {
                    die("Conexion fallida: " . mysqli_connect_error());
                }
                if (isset($_SESSION['sesion_iniciada'])) {
                    echo "<div class='mb-0 pb-0'><h1 class='text-white'>" . $_SESSION["nombre"] . "</h1><span>" . $_SESSION["mail"] . "</span></div><br><h4 class='text-white ms-5'>Estadísticas</h4>";
                    

                    if (mysqli_connect_errno()) {
                        echo 'Failed connection' . mysqli_connect_error(); //Fallo en conexión
                        exit();
                    } else {
                        $mail = $_SESSION["mail"];
                        $consulta = "SELECT try, win, try2, win2, try3, win3, try4, win4 
                        FROM usuarios WHERE mail='$mail'";
                        $row = mysqli_fetch_array(mysqli_query($conn, $consulta));
                        if ($row != null) {
                            // Intentos y victorias sacadas de la BD
                            $t = $row['try'];
                            $w = $row['win'];
                            $t2 = $row['try2'];
                            $w2 = $row['win2'];
                            $t3 = $row['try3'];
                            $w3 = $row['win3'];
                            $t4 = $row['try4'];
                            $w4 = $row['win4'];
                            echo "<table class='ms-auto me-auto'>";
                            echo "<tr><td><img class='imgjuego' style='width:200px;height:auto' src='../games/salto/salto.jpg' alt='Salto'></td><td class='p-3'>";
                            echo "<h5>Salto</h5>";
                            echo "<div class=' ms-5'>";
                            if ($t == 0) {
                                echo "No has jugado todavía<br>";
                            } else {
                                if ($t == 1) {
                                    echo "Lo has intentado: " . $t . " vez<br>";
                                } else {
                                    echo "Lo has intentado: " . $t . " veces<br>";
                                }
                                if ($w == 1) {
                                    echo "Llegaste a tu destino: " . $w . " vez<br>";
                                } else {
                                    echo "Llegaste a tu destino: " . $w . " veces<br>";
                                }
                            }
                            echo "</div>";
                            echo "</td></tr><tr><td><img class='imgjuego' style='width:200px;height:auto' src='../games/kog/kog.jpg' alt='Labyrinth'></td><td class='p-3'>";
                            echo "<h5>Labyrinth</h5>";
                            echo "<div class=' ms-5'>";
                            if ($t2 == 0) {
                                echo "No has jugado todavía<br>";
                            } else {
                                if ($t2 == 1) {
                                    echo "Te has perdido: " . $t2 . " vez<br>";
                                } else {
                                    echo "Te has perdido: " . $t2 . " veces<br>";
                                }
                                if ($w2 == 1) {
                                    echo "Conseguiste la cápsula: " . $w2 . " vez<br>";
                                } else {
                                    echo "Conseguiste la cápsula: " . $w2 . " veces<br>";
                                }
                            }
                            echo "</div>";
                            echo "</td></tr><tr><td><img class='imgjuego' style='width:200px;height:auto' src='../games/airh/airh.jpg' alt='Air Hockey'></td><td class='p-3'>";
                            echo "<h5>Air Hockey Alpha</h5>";
                            echo "<div class=' ms-5'>";
                            if ($t3 == 0) {
                                echo "No has jugado todavía<br>";
                            } else {
                                if ($t3 == 1) {
                                    echo "Has jugado: " . $t3 . " vez<br>";
                                } else {
                                    echo "Has jugado: " . $t3 . " veces<br>";
                                }
                                if ($w3 == 1) {
                                    echo "Ganaste a la máquina: " . $w3 . " vez<br>";
                                } else {
                                    echo "Ganaste a la máquina: " . $w3 . " veces<br>";
                                }
                            }
                            echo "</div>";
                            echo "</td></tr><tr><td><img class='imgjuego' style='width:200px;height:auto' src='../games/ark/ark.jpg' alt='Arkanoid'></td><td class='p-3'>";
                            echo "<h5>Arkanoid</h5>";
                            echo "<div class=' ms-5'>";
                            if ($t4 == 0) {
                                echo "No has jugado todavía<br>";
                            } else {
                                if ($t4 == 1) {
                                    echo "Lo has intentado: " . $t4 . " vez<br>";
                                } else {
                                    echo "Lo has intentado: " . $t4 . " veces<br>";
                                }
                                if ($w4 == 1) {
                                    echo "Lo conseguiste: " . $w4 . " vez<br>";
                                } else {
                                    echo "Lo conseguiste: " . $w4 . " veces<br>";
                                }
                            }
                            echo "</div>";
                        } else {
                            echo "<div class='error'>Error en consulta</div>";
                        }
                        echo "</td></tr>";
                        echo "</table>";
                    }
                    
                }
                $conn->close();
                ?>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 text-white pt-5 mt-5">
                <h4>Cambiar datos de perfil</h4>
                <br>
                <div class="container">
                    <form id="cNombreFORM" method="post">
                        <div class="row">
                            <div id="errores"><br></div>
                            <div class="col-4"><button type="submit" class="registro btn btn-primary" name="cNombreBTN" id="cNombreBTN">Cambiar nombre por</button></div>
                            <div class="col-8"><input type="text" class="form-control" name="cNombre" id="cNombre" placeholder="Nickname" required></div>
                        </div>
                    </form><br>
                    <form id="cMailFORM" method="post">
                    <div class="row">
                        <div class="col-4"><button type="submit" class="registro btn btn-primary" name="cMailBTN" id="cMailBTN">Cambiar E-Mail por</button></div>
                        <div class="col-8"><input type="text" class="form-control" name="cMail" id="cMail" placeholder="E-Mail" required></div>
                    </div>
                    </form><br>
                    <form id="cContraseñaFORM" method="post">
                        <div class="row">
                            <div class="col-4"><button type="submit" class="registro btn btn-primary" name="cContraseñaBTN" id="cContraseñaBTN">Cambiar contraseña</button></div>
                            <div class="col-8"><input type="password" class="form-control" name="cContraseña" id="cContraseña" placeholder="Contraseña" required></div>
                        </div><br>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-8"><input type="password" class="form-control error" name="cContraseña2" id="cContraseña2" placeholder="Repetir contraseña" required></div>
                        </div>
                    </form>
                </div>
                <br>
                <p>Requisitos mínimos para la contraseña:</p>
                <div class="row text-end">
                    <div class="col-6">
                        <p>Mayúsculas: <span id="passMayus"><i class="fas fa-times-circle"></i></span></p>
                        <p>Minúsculas: <span id="passMinus"><i class="fas fa-times-circle"></i></span></p>
                    </div>
                    <div class="col-3">
                        <p>Números: <span id="passNum"><i class="fas fa-times-circle"></i></span></p>
                        <p>10 caracteres: <span id="passChar"><i class="fas fa-times-circle"></i></span></p>
                    </div>
                    <div class="row text-center mt-5">
                        <div class="col-12"><button type="submit" class="registro btn btn-danger" id="eliminar" data-bs-toggle='modal' data-bs-target='#exampleModal4'>Eliminar cuenta</button></div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Información</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>En breve publicaremos más juegos. Esto es sólo el principio ;)</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar cuenta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que quieres eliminar la cuenta?</p>
                </div>
                <div class="modal-footer">
                    <form id="eliminarFORM" method="post">
                    <button type="submit" class="registro btn btn-danger" name="eliminarSeguro" id="eliminarSeguro">Eliminar cuenta</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "../BD/conexion.php";
    if (mysqli_connect_errno()) {
        echo 'Failed connection' . mysqli_connect_error(); //Fallo en conexión
        exit();
    } else {
        $mail = $_SESSION["mail"];

        if (isset($_POST['cNombreBTN'])) {
            $name = $_POST['cNombre'];
            $sql = "UPDATE usuarios set  name='$name' WHERE mail='$mail'";
            if ($conn->query($sql) === TRUE) {
                $_SESSION["nombre"] = $name;
                $conn->close();
                echo "<script type='text/javascript'>
                        window.location.href='estadisticas.php';
                        </script>";
            } else {
                echo "<script type='text/javascript'>
                        document.getElementById('errores').innerHTML='<div class=error>Error. No se ha podido realizar la operación.</div>';
                    </script>";
            }
        }

        if (isset($_POST['cMailBTN'])) {
            $newMail = $_POST['cMail'];
            $sql = "UPDATE usuarios set  mail='$newMail' WHERE mail='$mail'";
            if ($conn->query($sql) === TRUE) {
                $_SESSION["mail"] = $newMail;
                $conn->close();
                echo "<script type='text/javascript'>
                        window.location.href='estadisticas.php';
                        </script>";
            } else {
                if (mysqli_errno($conn) == 1062) {
                    // Controla que no pueda meterse un E-Mail que ya existe
                    // mediante el error 1062 de clave primaria de la base de datos
                    echo "<script type='text/javascript'>
                        document.getElementById('errores').innerHTML='<div class=error>Error. Este E-Mail ya lo está usando otra persona</div>';
                    </script>";
                }else{
                    echo "<script type='text/javascript'>
                        document.getElementById('errores').innerHTML='<div class=error>Error. No se ha podido realizar la operación.</div>';
                    </script>";
                }
            }
        }

        if (isset($_POST['cContraseñaBTN'])) {
            $pass = $_POST['cContraseña'];
            $sql = "UPDATE usuarios set  pass='$pass' WHERE mail='$mail'";
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                echo "<script type='text/javascript'>
                        window.location.href='estadisticas.php';
                        </script>";
            } else {
                echo "<script type='text/javascript'>
                        document.getElementById('errores').innerHTML='<div class=error>Error. No se ha podido realizar la operación.</div>';
                    </script>";
            }
        }

        if (isset($_POST['eliminarSeguro'])) {
            $sql = "DELETE FROM usuarios WHERE mail='$mail'";
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                $_SESSION["sesion_iniciada"] = false;
                session_destroy();
                echo "<script type='text/javascript'>
                        window.location.href='../index.php';
                        </script>";
            } else {
                echo "<script type='text/javascript'>
                        document.getElementById('errores').innerHTML='<div class=error>Error. No se ha podido realizar la operación.</div>';
                    </script>";
            }
        }
        $conn->close();
    }
    ?>

    <footer class="container-fluid align-bottom mt-auto">
        <div class="container col-10">
            <div class="row">
                <div class="col-12 col-sm-4 col-md-4 text-center text-sm-start">
                    <h4 class="gris">Sobre nosotros</h4>
                    <p class="gris">Somos un grupo de apasionados al Game-Dev buscando un hueco en la Web</p>
                </div>
                <div class="col-12 col-sm-4 col-md-4 text-center">
                    <h4 class="gris">Estamos en</h4>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#929292" class="bi bi-twitter" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#929292" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#929292" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg>
                    <p></p>
                </div>
                <div class="col-12 col-sm-4 col-md-4 text-center text-sm-end">
                    <h4 class="gris">Trabaja con nosotros</h4>
                    <p class="gris">¿Te gustaría entrar en el equipo? Envía tu candidatura a fernandolobato.20@campuscamara.es</p>
                </div>
            </div>
        </div>

        <div class="b-example-divider"></div>

        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <span class="text-muted">2022 Fernando Lobato Fernández</span>
                </div>
            </footer>
        </div>
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>