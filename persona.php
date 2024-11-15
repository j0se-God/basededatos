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
#Salir si alguno de los datos no está presente
if(!isset($_POST["nombre"]) || !isset($_POST["apellidos"]) || !isset($_POST["sexo"]) || !isset($_POST["telefono"]) || !isset($_POST["email"])) exit();

include_once "base.php";
$nombre= $_POST["nombre"]; 
$apellidos = $_POST["apellidos"];
$sexo = $_POST["sexo"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];

/* Al incluir el archivo "base_de_datos.php", todas sus variables están a nuestra disposición. Por lo
que podemos acceder a ellas tal como si hubiéramos copiado y pegado el código*/

$sentencia = $base_de_datos->prepare("INSERT INTO personas (nombre, apellidos, sexo, telefono, email, estado) VALUES (?, ?, ?, ?, ?);"); 
$resultado = $sentencia->execute([$nombre, $apellidos, $sexo, $telefono, $email]); 

# Pasar en el mismo orden de los ? #execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario. #Con eso podemos evaluar
 if($resultado=== TRUE) echo "Datos guardados correctamente"; 
 else echo "Algo salió mal. Por favor verifica que la tabla exista";
?><br>
</center>