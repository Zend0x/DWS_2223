<?php
  // Conexión a la base de datos
  $conexion = mysqli_connect('localhost', 'root', '12345', 'cartelerapeliculas');

  // Comprobamos si se ha enviado el formulario
  if (isset($_POST['ordenar'])) {
    // Recuperamos el valor del campo "orden" del formulario
    $orden = mysqli_real_escape_string($conexion, $_POST['orden']);

    // Generamos la query de MySQL
    $query = "SELECT * FROM actores ORDER BY $orden";

    // Ejecutamos la query y recuperamos los resultados en un array
    $resultados = mysqli_query($conexion, $query);
  }
?>

<!-- Formulario para elegir el criterio de ordenación -->
<form action="" method="post">
  <label for="orden">Ordenar por:</label>
  <select name="orden" id="orden">
    <option value="id">Columna 1</option>
    <option value="nombre">Columna 2</option>
    <option value="apellidos">Columna 3</option>
  </select>
  <input type="submit" name="ordenar" value="Ordenar">
</form>

<!-- Mostramos los resultados de la query, si existen -->
<?php if (isset($resultados)): ?>
  <table>
    <tr>
      <th>Columna 1</th>
      <th>Columna 2</th>
      <th>Columna 3</th>
    </tr>
    <?php while ($fila = mysqli_fetch_array($resultados)): ?>
      <tr>
        <td><?php echo $fila['id']; ?></td>
        <td><?php echo $fila['nombre']; ?></td>
        <td><?php echo $fila['apellidos']; ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
<?php endif; ?>
