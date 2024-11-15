<IDOCTYPE html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Logo</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="formulario.html">Formulario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="listarpersona.php">Tabla de personas</a>
              </li>    
            </ul>
          </div>
        </div>
      </nav>
</body>
</html>
<br>
<br>
<center>
<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base.php";
$sentencia = $base_de_datos->prepare("DELETE FROM personas WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado = TRUE) echo "USUARIO ELIMINADO";
else echo "Algo salió mal";
?>
</center>