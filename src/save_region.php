<?php
// ============================
// Archivo: save_region.php
// ============================

require('../config/database.php');

// Verificar conexión
if (!$conn_supa) {
    echo "<script>
            alert('❌ Error: No se pudo conectar a Supabase.');
            window.location.href = 'add_region.php';
          </script>";
    exit;
}

// Capturar datos
$name = $_POST['name'] ?? '';
$abbrev = $_POST['abbrev'] ?? '';
$code = $_POST['code'] ?? '';
$id_countries = $_POST['id_countries'] ?? '';

// Validar datos mínimos
if (trim($name) == '' || trim($id_countries) == '') {
    echo "<script>
            alert('⚠️ Debes ingresar el nombre de la región y seleccionar un país.');
            window.location.href = 'add_region.php';
          </script>";
    exit;
}

// Insertar registro
$sql_insert = "
    INSERT INTO regions (name, abbrev, code, id_countries, status, created_at)
    VALUES ('$name', '$abbrev', '$code', $id_countries, TRUE, NOW())
";
$res = pg_query($conn_supa, $sql_insert);

// Verificar resultado
if ($res) {
    echo "<script>
            alert('✅ Conexión exitosa: Región registrada correctamente en Supabase.');
             
          </script>";
} else {
    $error = addslashes(pg_last_error($conn_supa));
    echo "<script>
            alert('❌ Error al registrar en Supabase:\\n$error');
             
          </script>";
}
?>
