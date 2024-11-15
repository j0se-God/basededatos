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
<center>
<?php 
 #Salir si alguno de los datos no está presente
if(
!isset($_POST["nombre"]) ||
!isset($_POST["apellidos"]) ||
!isset($_POST["telefono"]) ||
!isset($_POST["email"]) ||
!isset($_POST["sexo"]) ||
!isset($_POST["id"])
) exit(); #Si todo va bien, se ejecuta esta parte del código...
include_once "base.php";
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$sexo = $_POST["sexo"]; 
$id = $_POST["id"];
$sentencia = $base_de_datos->prepare("UPDATE personas SET nombre = ?, apellidos = ?, telefono = ?, email = ?, sexo = ? WHERE id = ?;");
$resultado = $sentencia->execute([$nombre, $apellidos, $telefono, $email, $sexo, $id]);
#Pasar en el mismo orden de los ?
if($resultado === TRUE) echo "<div style='color: white;' > - USUARIO EDITADO CORRECTAMENTE -</div>";
else echo "Algo salió mal. Verifica que la tabla e ID exista";
?>
</center>