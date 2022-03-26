<!DOCTYPE html>
<html lang="en-us">
<?php session_start(); ?>

<head>
  <title>In Game Web | Air Hockey Alpha</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/style.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="shortcut icon" href="TemplateData/favicon.ico">
  <link rel="stylesheet" href="TemplateData/style.css">
  <script src="TemplateData/UnityProgress.js"></script>
  <script src="Build/UnityLoader.js"></script>
  <script src="../../js/jquery.min.js"></script>
  <script>
    var unityInstance = UnityLoader.instantiate("unityContainer", "Build/airh.json", {
      onProgress: UnityProgress
    });
  </script>

  <script>
    window.onload = inicio;

    function inicio() {
      // Eventos:
      document.getElementById("boton").addEventListener('click', selecciona);

      function selecciona() {
        // Intentos y victorias sacadas de la sesión de juego. Unity a Javascript
        var i = unityInstance.Module.asmLibraryArg._GetIntentos3();
        var v = unityInstance.Module.asmLibraryArg._GetVictorias3();
        document.getElementById("fIntentos").value = i;
        document.getElementById("fVictorias").value = v;
        document.forms["guarda"].submit();
      }
    }
  </script>
</head>

<body class="bg-dark">
  <form name="guarda" id="guarda" action="index.php" method="post">
    <!-- Intentos y victorias de la sesión.
    Pasando de Javascript a PHP mediante formulario oculto -->
    <input type="hidden" id="fIntentos" name="fIntentos" value="">
    <input type="hidden" id="fVictorias" name="fVictorias" value="">
  </form>


  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-3 col-lg-2">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
          <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img class="logoingame" src="../../img/logo.png" alt="In game web logo">
          </div>
          <?php
          if (isset($_SESSION['sesion_iniciada'])) {
            echo "<p class='nav-link active text-white fs-4'>" . $_SESSION["nombre"] . "</p>";
            if (isset($_POST['fIntentos']) && isset($_POST['fVictorias'])) {
              // Intentos y victorias de la sesión en PHP
              $i = $_POST['fIntentos'];
              $v = $_POST['fVictorias'];

              include "../../bd/conexion.php";

              if (mysqli_connect_errno()) {
                echo 'Failed connection' . mysqli_connect_error(); //Fallo en conexión
                exit();
              } else {
                $mail = $_SESSION["mail"];
                $consulta = "SELECT try3, win3 FROM usuarios WHERE mail='$mail'";
                $row = mysqli_fetch_array(mysqli_query($conn, $consulta));
                if ($row != null) {
                  // Intentos y victorias sacadas de la BD. Registro antiguo
                  $t = $row['try3'];
                  $w = $row['win3'];
                  // Intentos y victorias para meter en la BD. Registro nuevo
                  $iTotales = $i + $t;
                  $wTotales = $v + $w;
                  $sql = "UPDATE usuarios set  try3='$iTotales', win3='$wTotales' where mail='$mail'";
                  // Update y validación
                  if ($conn->query($sql) === TRUE) {
                    // Redireccionamiento a la biblioteca
                    echo "<script type='text/javascript'>
                          window.location.href='../../pages/biblioteca.php';
                          </script>";
                  } else {
                    echo "Error al actualizar la base de datos";
                  }
                } else {
                  echo "<div class='error'>Error en consulta</div>";
                }

                $conn->close();
              }
            }
          } else {
            // Redireccionamiento a la página principal si no estoy logeado
            echo "<script type='text/javascript'>
              window.location.href='../../index.php';
              </script>";
          }

          ?>
          <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5">Menú</span>
          </div>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <button id="boton" class="nav-link text-white">
                Guardar y salir
              </button>
            </li>
            <li>
              <a href="" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Sobre este juego
              </a>
            </li>
          </ul>
          <hr>
        </div>

      </div>
      <div class="col-sm-12 col-md-9 col-lg-8 mt-5">
        <div class="webgl-content">
          <div id="unityContainer" style="width: 100%; height: 600px"></div>
          <div class="footer">
            <div class="fullscreen" onclick="unityInstance.SetFullscreen(1)"></div>
            <div class="title">Air Hockey Alpha</div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Air Hockey Alpha</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Air Hockey versión Alpha. Modo un solo jugador.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>

</html>