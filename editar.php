<?php 
if(!isset($_GET["id"])) exit(); 
$id = $_GET["id"];
 include_once "base.php"; 
 $sentencia = $base_de_datos->prepare("SELECT * FROM personas WHERE id = ?;"); 
 $sentencia->execute([$id]); 
 $persona = $sentencia->fetch(PDO::FETCH_OBJ); 
 if($persona === FALSE){ 
    #No existe 
    echo "¡No existe alguna persona con ese ID!"; exit();
     } 
     #Si la persona existe, se ejecuta esta parte del código 
?> 
<!DOCTYPE html> 
<html lang="es"> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Registrar persona</title> 
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

      <center>
      <form method="post" action="guardardatos.php">
<!-- Ocultamos el ID para que el usuario no pueda cambiarlo (en teoria) -->
  <input type="hidden" name="id" value="<?php echo $persona->id; ?>">

<label for="nombre" > Nombre:</label>
<br>
<input value="<?php echo $persona->nombre ?>" name="nombre" required type="text" id="nombre" placeholder="Escribe tu
nombre...">
<br><br>
<label for="apellidos">Apellidos:</label>
<br>
<input value="<?php echo $persona->apellidos ?>" name="apellidos" required type="text" id="apellidos" placeholder="Escribe
tus apellidos...">
<br><br>
<label for="telefono" > Tel:</label>
<br>
<input value="<?php echo $persona->telefono ?>" name="telefono" required type="text" id="telefono" placeholder="Escribe tu
numero...">
<br><br>
<label for="email" > Email:</label>
<br>
<input value="<?php echo $persona->email ?>" name="email" required type="text" id="email" placeholder="Escribe tu
email...">
<br><br>



<label for="sexo"> Género</label>
<select name="sexo" required name="sexo" id="sexo">
<!--
Para seleccionar una opción con defecto, se debe poner el atributo selected. 
Usamos el operador ternario para que, si es esa opción, marquesos la opción seleccionada -->

<option value="">--Selecciona--</option>
<option <?php echo $persona->sexo === 'M' ? "selected='selected'": "" ?> value="M">Masculino</option> 
<option <?php echo $persona->sexo === 'F' ? "selected='selected'": "" ?> value="F">Femenino</option>
</select>
        <br><br><input type="submit" value="Guardar cambios"> 
    </form>
    </center> 
</body> 
</html>