<?php
include_once "base.php";
$sentencia = $base_de_datos->query("SELECT * FROM personas;");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<IDOCTYPE html>
<html lang="es">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<meta charset="UTF-8">
<title>Tabla de ejemplo</title>
<style>
table, th, td {
border: 1px solid black;
}
</style>
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
 <table>
 <div class="container mt-3">
  <table class="table">
    <thead>
      <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Género</th>
      <th>Telefono</th>
      <th>E-mail</th>
      <th>Editar</th>
      <th>Eliminar</th>
  </tr>
      </tr>
    </thead>
</div>
<tbody>
<!--
Atención aquí, sólo esto cambiará, no ignores las llaves de inicio y cierre {}
-->

<?php foreach ($personas as $persona) { ?>
<tr class="table-active">
<td><?php echo $persona->id ?></td>
<td><?php echo $persona->nombre ?></td>
<td><?php echo $persona->apellidos ?></td>
<td><?php echo $persona->sexo ?></td>
<td><?php echo $persona->telefono ?></td>
<td><?php echo $persona->email ?></td>
<td><a href="<?php echo "editar.php?id=" . $persona->id?>">Editar</a></td>
<td><a href="<?php echo "eliminar.php?id=" . $persona->id?>">Eliminar</a></td>
</tr>
<?php } ?>
</tbody>
</table>
</body>
</html>