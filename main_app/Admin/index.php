  <?php
session_start();
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['usuario']['tipo_usuario'] != "Admin") {
        header('Location: ../Usuario/');
    }
} else {
    header('Location: ../../');
}
?>
<?php require '../Conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ADMIN</title>
  <script src="../js/jquery-3.2.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <script src="../js/alertify.min.js"></script>
  <script src="../js/crear_listar.js"></script>

  <link rel="stylesheet" href="../css_app/sidebar.css">
  <link rel="stylesheet" href="../css_app/bootstrap.min.css">
  <link rel="stylesheet" href="../css_app/alertify.min.css">
  <link rel="stylesheet" href="../css_app/font-awesome.min.css">
  <link rel="stylesheet" href="../css_app/class-style.css">
  <link rel="stylesheet" href="../css_app/margenes.css">

</head>
<body>


  <div id="barra-top">
    <div class="btn-menu" id="btn-toggle"><span class="fa fa-reorder rotate-90"></span></div>
    <div class="titulo"><p class="text-center text-primary text-uppercase">Sistema Almacén</p></div>
  </div>


  <div id="wrapper">

    <!-- Sidebar -->

    <div id="sidebar-wrapper">
      <ul class="sidebar-nav" >
        <li class="sidebar-brand">
          <a href="../exit.php">
            <span class="fa fa-user"></span>
            <?=$usuario = $_SESSION['usuario']['nombre_usuario'];?>
          </a>
        </li>
        <li><a href="index.php"><span class="fa fa-dashboard active"> </span> Dashboard</a></li>

        <li><a class="opcion" href="Articulos.php"><span class="fa fa-shopping-cart"> </span> Articulos</a></li>

        <li><a href="categorias.php"><span class="fa fa-tags"> </span> Categorias</a></li>

        <li><a href="entradas.php"><span class="fa fa-mail-reply"> </span> Entradas</a></li>

        <li><a href="salidas.php"><span class="fa fa-mail-forward"> </span> Salidas</a></li>

        <li><a href="Proveedores.php"><span class="fa fa-briefcase"> </span> Proveedores</a></li>

        <li><a href="sucursales.php"><span class="fa fa-home"> </span> Sucursales</a></li>

        <li><a href="usuarios.php"><span class="fa fa-group"></span> Usuarios</a></li>
      
        <li><a href="Reportes.php"><span class="fa fa-line-chart"></span> Reportes</a></li>

        <li><a href="configuracion.php"><span class="fa fa-cog "></span> Configurar</a></li>


        <p class="text-primary text-center text-uppercase">

        <img class="img-circle logo-novedades" src="../img/logo_Novedades_Romero.jpeg" alt="">
        <br><strong>Novedades Romero</strong>
        </p>

        <li class="text-muted text-uppercase text-success"><strong> <?=$_SESSION['usuario']['tipo_usuario']?></strong></li>

      </ul>
    </div>

  </div>

    <!-- Menu Toggle Script -->
  <script>
    $(document).ready( function() {
      $("#wrapper").toggleClass("toggled")
    });

    $("#btn-toggle").click(function(e) {
      e.preventDefault();
      $(".fa-reorder").toggleClass("rotate-90");
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  <div class="dashboard bg-color" id="dashboard-hidden">

    <div class="card text-success info-color">
      <div class="card-body">
        <h4 class="card-title">Articulos Registrados</h4>

        <p class="card-text">
        <?php

          $query = mysqli_query($mysqli, "SELECT COUNT(*) as Total FROM categorias");
         
          if ($query) {
            $data = mysqli_fetch_assoc($query);
            echo $data['Total'];    
          }
         ?>
           
         </p>
      </div>
    </div>

    <div class="card text-success warning-color">
      <div class="card-body">
        <h4 class="card-title">Sucursales Registradas</h4>
        <p class="card-text">
        <?php
          $query = mysqli_query($mysqli, "SELECT COUNT(*) as Total FROM sucursales");
          if ($query) {
            $data = mysqli_fetch_assoc($query);
            echo $data['Total'];    
          }
         ?>
           
         </p>
      </div>
    </div>

    <div class="card text-white sucess-color">
      <div class="card-body">
        <h4 class="card-title">Proveedores Registrados</h4>
        <p class="card-text">
        <?php
          $query = mysqli_query($mysqli, "SELECT COUNT(*) as Total FROM proveedores");
          if ($query) {
            $data = mysqli_fetch_assoc($query);
            echo $data['Total'];    
          }
         ?>
           
         </p>
      </div>
    </div>

    <div class="card text-white primary-color">
      <div class="card-body">
        <h4 class="card-title">Usuarios Registrados</h4>
        <p class="card-text">
        <?php
          $query = mysqli_query($mysqli, "SELECT COUNT(*) as Total FROM usuarios");
          if ($query) {
            $data = mysqli_fetch_assoc($query);
            echo $data['Total'];    
          }
         ?>
           
         </p>
      </div>
    </div>

  </div>
</body>
</html>
