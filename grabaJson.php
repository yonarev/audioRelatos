<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos enviados desde JavaScript
  $datos = json_decode(file_get_contents('php://input'), true);
  // Ruta y nombre del archivo a guardar
  $archivo = './BD/relatos.json';
  // Convertir los datos a formato JSON
  $datosJson = json_encode($datos);
  // Abrir el archivo en modo de escritura y sobrescribir el contenido existente
  $archivoHandle = fopen($archivo, 'w');
  if ($archivoHandle) {
    // Escribir los datos en el archivo
    fwrite($archivoHandle, $datosJson);
    // Cerrar el archivo
    fclose($archivoHandle);
    // Devolver una respuesta al cliente
    http_response_code(200);
    echo 'Los datos se han guardado correctamente.';
  } else {
    // Devolver una respuesta de error al cliente
    http_response_code(500);
    echo 'Error al abrir el archivo para escritura.';
  }
}
?>
