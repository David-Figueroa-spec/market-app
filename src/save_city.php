<?php
// Paso 1: Conexión a Supabase
require('../config/database.php');

// Paso 2: Traer todas las regiones activas
$query_regions = "SELECT id, name FROM regions WHERE status = TRUE ORDER BY name";
$res_regions = pg_query($conn_supa, $query_regions);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Ciudad</title>
</head>
<body>
    <center>
        <h2>Registrar nueva ciudad</h2>
        <form name="city-form" action="save_city.php" method="post">
            <table border="0">
                <tr>
                    <td><input type="text" name="name" placeholder="Nombre de la ciudad" required></td>
                </tr>
                <tr>
                    <td><input type="text" name="abbrev" placeholder="Abreviatura (ej: MDE)"></td>
                </tr>
                <tr>
                    <td><input type="text" name="code" placeholder="Código (ej: 05001)"></td>
                </tr>
                <tr>
                    <td>
                        <label>Región:</label><br>
                        <select name="id_region" required>
                            <option value="">-- Selecciona una región --</option>
                            <?php
                            if ($res_regions && pg_num_rows($res_regions) > 0) {
                                while ($row = pg_fetch_assoc($res_regions)) {
                                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                }
                            } else {
                                echo '<option value="">⚠️ No hay regiones registradas</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="center"><button type="submit">Guardar Ciudad</button></td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>
