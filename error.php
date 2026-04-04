<link rel="stylesheet" href="css/errores.css">
<?php
// error_page.php

// Configurar el tipo de error (puede venir por GET o definirse manualmente)
$error_type = isset($_GET['type']) ? $_GET['type'] : 'general';
$error_message = isset($_GET['message']) ? urldecode($_GET['message']) : '';

// Definir mensajes según el tipo de error
$error_config = [
    'general' => [
        'titulo' => 'Oops! Algo salió mal',
        'mensaje' => 'Ha ocurrido un error inesperado. Por favor, intenta nuevamente.',
        'icono' => '⚠️'
    ],
    '404' => [
        'titulo' => 'Página no encontrada',
        'mensaje' => 'La página que buscas no existe o ha sido movida.',
        'icono' => '🔍'
    ],
    '500' => [
        'titulo' => 'Error del servidor',
        'mensaje' => 'Hubo un problema en nuestro servidor. Estamos trabajando para solucionarlo.',
        'icono' => '🛠️'
    ],
    'auth' => [
        'titulo' => 'Error de autenticación',
        'mensaje' => 'No tienes permiso para acceder a esta página.',
        'icono' => '🔒'
    ],
    'database' => [
        'titulo' => 'Error de conexión',
        'mensaje' => 'No pudimos conectar con la base de datos. Intenta más tarde.',
        'icono' => '🗄️'
    ],
    'form' => [
        'titulo' => 'Error en el formulario',
        'mensaje' => 'Por favor, verifica los datos ingresados.',
        'icono' => '📝'
    ]
];

$error = $error_config[$error_type] ?? $error_config['general'];
if ($error_message) {
    $error['mensaje'] = $error_message;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - AYOUPI</title>
    <body>
    <div class="error-container">
        <div class="error-icon"><?php echo $error['icono']; ?></div>
        
        <h1><?php echo htmlspecialchars($error['titulo']); ?></h1>
        
        <div class="error-message">
            <?php echo htmlspecialchars($error['mensaje']); ?>
        </div>
        
        <div class="error-code">
            Error: <?php echo strtoupper(htmlspecialchars($error_type)); ?>
        </div>
        
        <div class="buttons-container">
            <a href="javascript:history.back()" class="btn btn-secondary">
                ← Volver atrás
            </a>
            <a href="index.php" class="btn btn-primary">
                🏠 Ir al inicio
            </a>
        </div>
        
        <div class="suggestions">
            <p>¿Necesitas ayuda?</p>
            <a href="mailto:soporte@ayoupi.com">📧 Contactar soporte</a>
            <a href="#">📖 Centro de ayuda</a>
        </div>
    </div>

    <script>
        // Registrar el error en consola para desarrollo
        console.error('Error type: <?php echo $error_type; ?>');
        console.error('Error message: <?php echo addslashes($error['mensaje']); ?>');
    </script>
</body>
</html>