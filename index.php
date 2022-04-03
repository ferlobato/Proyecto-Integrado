<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <title>In Game Web</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="fonts/fontawesome-free-5.15.4-web/css/all.min.css">
  <link rel="stylesheet" href="css/carousel.css">
  <script src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/indexScript.js"></script>
</head>

<body class="bg-dark d-flex flex-column min-vh-100">
<?php
if (isset($_SESSION['sesion_iniciada'])) {
  echo "<script type='text/javascript'>
  window.location.href='pages/biblioteca.php';
  </script>";
}
?>
  <header>
    <div class="d-sm-none d-block col-12" style="height: 60px;"></div>
    <div class="navbar navbar-dark bg-dark shadow-sm superior justify-content-center">
      <div class="container row">
        <div class="col-12 col-sm-6 col-md-3 col-lg-3">
          <div class="navbar-brand d-flex align-items-center">
            <img src="img/logo.gif" class="logo" alt="" srcset="">
          </div>
        </div>

        <div class="d-sm-none d-block col-12" style="height: 90px;">

        </div>

        <div class="col-12 col-sm-6 col-md-9 col-lg-9 mt-5 mt-sm-0">
          <nav class="nav justify-content-center justify-content-sm-end">
            <a class="nav-link active text-white" aria-current="page" href="index.php">Principal</a>
            <a class="nav-link text-white" href="" data-bs-toggle="modal" data-bs-target="#exampleModal3">Información</a>
            <li class="nav-item dropdown text-white">
              <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="" role="button" aria-expanded="false">Acceso</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item rojo" data-bs-toggle="modal" data-bs-target="#exampleModal" href="">Inicia
                    sesión</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item rojo" data-bs-toggle="modal" data-bs-target="#exampleModal2" href="">Regístrate</a></li>
              </ul>
            </li>
          </nav>
        </div>
      </div>
    </div>
  </header>



  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="bd-placeholder-img" style="object-fit: cover; overflow: hidden;" width="auto" height="100%" src="img/render3.jpg">


        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Una nueva experiencia</h1>
            <p>Juega partidas on-line con tus amigos</p>
            <p><a class="btn btn-lg btn-primary" href="" data-bs-toggle="modal" data-bs-target="#exampleModal2">Comienza
                tu aventura</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="bd-placeholder-img" style="object-fit: cover; overflow: hidden;" width="auto" height="100%" src="img/labyrinth5.jpg">

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Adéntrate en el laberinto</h1>
            <p>Ponte en la piel de Sarah y encuentra la cápsula dorada</p>
            <p><a class="btn btn-lg btn-primary" href="" data-bs-toggle="modal" data-bs-target="#exampleModal2">Comienza
                tu aventura</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="bd-placeholder-img" style="object-fit: cover; overflow: hidden;" width="auto" height="100%" src="img/salto.jpg">

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>¡No te caigas!</h1>
            <p>Salta por las plataformas hasta llegar al final</p>
            <p><a class="btn btn-lg btn-primary" href="" data-bs-toggle="modal" data-bs-target="#exampleModal2">Comienza
                tu aventura</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Inicio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="fInicio" class="needs-validation" novalidate action="index.php" method="post">
          <div class="modal-body">
            <div class="col-12 position-relative">
              <label for="usuarioMail" class="form-label">E-Mail</label>
              <input type="text" class="form-control" name="usuarioMail" id="usuarioMail" required>
              <div class="invalid-tooltip">Debes completar este campo</div>
            </div>
            <div class="col-12 position-relative">
              <label for="contraseña" class="form-label">Contraseña</label>
              <input type="password" class="form-control" name="contraseña" id="contraseña" required>
              <div class="invalid-tooltip">Debes completar este campo</div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="bloqueError" id="errores2">
              <?php
              include "bd/conexion.php";

              if (mysqli_connect_errno()) {
                echo 'Failed connection' . mysqli_connect_error(); //Fallo en conexión
                exit();
              } else {
                if (isset($_POST["usuarioMail"]) && isset($_POST["contraseña"])) {
                  $mail = $_POST["usuarioMail"];
                  $pass = $_POST["contraseña"];
                  $consulta = "SELECT mail, pass, name FROM usuarios WHERE mail='$mail' AND pass='$pass'";
                  $row = mysqli_fetch_array(mysqli_query($conn, $consulta));
                  if ($row != null) {                            ////////////////////////////// LOGIN CORRECTO
                    session_id();
                    // Variables de sesión
                    $_SESSION["sesion_iniciada"] = true;
                    $_SESSION["mail"] = $row['mail'];
                    $_SESSION["nombre"] = $row['name'];
                    echo "<script type='text/javascript'>
                        window.location.href='pages/biblioteca.php';
                        </script>";
                  } else {                                     ////////////////////////////// LOGIN INCORRECTO
                    echo "<div class='error'>E-Mail/contraseña incorrectos</div>";
                    echo ("<script type='text/javascript'>$(window).on('load', function() {
                      $('#exampleModal').modal('show');});</script>");
                  }
                }
                $conn->close();
              }
              ?>
            </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="inicio">Entrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="fRegistro" class="needs-validation" novalidate action="index.php" method="post">
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-6"><input type="text" class="form-control" name="rNombre" id="rNombre" placeholder="Nickname" required></div>
                <div class="col-6"><input type="text" class="form-control" name="rMail" id="rMail" placeholder="E-Mail" required></div>
              </div><br>
              <div class="row">
                <div class="col-6"><input type="password" class="form-control" name="rContraseña" id="rContraseña" placeholder="Contraseña" required></div>
                <div class="col-6"><input type="password" class="form-control error" name="rContraseña2" id="rContraseña2" placeholder="Repetir contraseña" required></div>
              </div>
            </div>

            <p>Requisitos mínimos para la contraseña:</p>
            <div class="requisitos">
              <p>Mayúsculas: <span id="passMayus"><i class="fas fa-times-circle"></i></span></p>
              <p>Minúsculas: <span id="passMinus"><i class="fas fa-times-circle"></i></span></p>
              <p>Números: <span id="passNum"><i class="fas fa-times-circle"></i></span></p>
              <p>10 caracteres: <span id="passChar"><i class="fas fa-times-circle"></i></span></p>
            </div>
          </div>
          <div class="modal-footer">
            <div class="bloqueErrorR" id="errores">
              <?php
              include "bd/conexion.php";
              if (mysqli_connect_errno()) {
                echo 'Failed connection' . mysqli_connect_error(); //Fallo en conexión
                exit();
              } else {
                if (isset($_POST['rNombre']) && isset($_POST['rMail']) && isset($_POST['rContraseña'])) {
                  $name = $_POST['rNombre'];
                  $mail = $_POST['rMail'];
                  $pass = $_POST['rContraseña'];

                  // Instrucción SQL de inserción
                  $sql = "INSERT INTO usuarios (mail,pass,name,try,win,try2,win2,try3,win3,try4,win4)VALUES ('$mail','$pass','$name',0 ,0,0,0,0,0,0,0)";
                  // Inserción y validación
                  if ($conn->query($sql) === TRUE) {
                    // Inicio de sesión y redireccionamiento
                    session_id();
                    $_SESSION["sesion_iniciada"] = true;
                    $_SESSION["mail"] = $mail;
                    $_SESSION["nombre"] = $name;
                    echo "<script type='text/javascript'>
                        window.location.href='pages/biblioteca.php';
                        </script>";
                  } else {
                    if (mysqli_errno($conn) == 1062) {
                      // Controla que no pueda meterse el mismo DNI por el error 1062 de clave primaria
                      echo ("<div class='error'>Error. El E-Mail introducido ya existe en la base de datos</div>");
                      echo ("<script type='text/javascript'>$(window).on('load', function() {
                                $('#exampleModal2').modal('show');});</script>");
                    }
                     //echo mysqli_errno($conn) . ": " . mysqli_error($conn). "\n"; // Debug de errores
                  }
                }
                $conn->close();
              }
              ?>
            </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="registro btn btn-primary" id="registro">Registrarse</button>
          </div>
        </form>
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

  <footer  class="container-fluid align-bottom mt-auto">
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
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>