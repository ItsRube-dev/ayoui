<?php
// verify-email.php - Página de verificación de correo electrónico

session_start();

// Configuración de la página
$page_title = "Verificar Correo - AYOUPI";
$current_year = date("Y");

// Simular envío de código (en producción esto vendría de tu base de datos/email)
// Por ahora generamos un código de ejemplo para pruebas
$test_code = "482739"; // Código de ejemplo

// Procesar verificación
$error_message = "";
$success_message = "";
$show_form = true;

// Obtener email de la URL (simulando que viene del registro)
$user_email = isset($_GET['email']) ? urldecode($_GET['email']) : (isset($_SESSION['temp_email']) ? $_SESSION['temp_email'] : "usuario@ejemplo.com");

// Guardar email en sesión si no existe
if (!isset($_SESSION['temp_email']) && $user_email != "usuario@ejemplo.com") {
    $_SESSION['temp_email'] = $user_email;
}

// Procesar formulario de verificación
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entered_code = isset($_POST['verification_code']) ? trim($_POST['verification_code']) : '';
    
    // En producción, aquí verificarías contra la base de datos
    if ($entered_code == $test_code) {
        // Código correcto
        $_SESSION['email_verified'] = true;
        $_SESSION['verified_email'] = $user_email;
        $success_message = "¡Correo verificado exitosamente!";
        $show_form = false;
        
        // Redirigir después de 3 segundos
        header("refresh:3; url=registro-completo.php");
    } else {
        // Código incorrecto
        $error_message = "Codigo de verificacion incorrecto. Por favor, intentalo de nuevo.";
    }
}

// Función para limpiar texto
function cleanText($text) {
    return htmlspecialchars(trim($text), ENT_QUOTES, 'UTF-8');
}

// Simular reenvío de código
$resend_success = false;
if (isset($_GET['resend']) && $_GET['resend'] == 'true') {
    // En producción, aquí enviarías un nuevo código por email
    $resend_success = true;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Verifica tu correo electrónico en AYOUPI">
    <title><?php echo $page_title; ?></title>
    
    <!-- Estilos externos -->
    <link rel="stylesheet" href="css/verify-styles.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="verify-wrapper">
        <div class="verify-container">
            <!-- Botón para volver -->
            <a href="registro.php" class="back-link">
                <i class="fas fa-arrow-left"></i> Volver al registro
            </a>

            <!-- Header -->
            <div class="verify-header">
                <div class="logo">
                    <i class="fas fa-chalkboard-user"></i>
                    <span>AYOUPI</span>
                </div>
                <div class="step-indicator">
                    <div class="step completed">
                        <span class="step-number">1</span>
                        <span class="step-label">Registro</span>
                    </div>
                    <div class="step-line"></div>
                    <div class="step active">
                        <span class="step-number">2</span>
                        <span class="step-label">Verificar</span>
                    </div>
                    <div class="step-line"></div>
                    <div class="step">
                        <span class="step-number">3</span>
                        <span class="step-label">Completar</span>
                    </div>
                </div>
                <h1>Verifica tu correo electrónico</h1>
                <p>Hemos enviado un código de verificación a:</p>
                <div class="email-display">
                    <i class="fas fa-envelope"></i>
                    <strong><?php echo htmlspecialchars($user_email); ?></strong>
                </div>
            </div>

            <!-- Contenido principal -->
            <div class="verify-content">
                <?php if ($success_message): ?>
                    <!-- Mensaje de éxito -->
                    <div class="success-box">
                        <div class="success-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h3><?php echo $success_message; ?></h3>
                        <p>Redirigiendo para completar tu registro...</p>
                        <div class="loading-spinner"></div>
                    </div>
                <?php else: ?>
                    <!-- Formulario de verificación -->
                    <div class="verification-form-container">
                        <div class="info-message">
                            <i class="fas fa-info-circle"></i>
                            <p>Ingresa el código de 6 dígitos que enviamos a tu correo electrónico. El código expira en <strong>10 minutos</strong>.</p>
                        </div>

                        <?php if ($error_message): ?>
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($resend_success): ?>
                            <div class="success-message">
                                <i class="fas fa-check-circle"></i>
                                ¡Hemos reenviado un nuevo código a tu correo!
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="" class="verification-form" id="verifyForm">
                            <div class="input-group">
                                <label for="verification_code">
                                    <i class="fas fa-key"></i>
                                    Código de verificación
                                </label>
                                <div class="code-input-container">
                                    <input type="text" 
                                           id="verification_code" 
                                           name="verification_code" 
                                           class="code-input"
                                           maxlength="6"
                                           placeholder="000000"
                                           autocomplete="off"
                                           required>
                                    <button type="button" class="paste-btn" id="pasteBtn">
                                        <i class="fas fa-paste"></i>
                                    </button>
                                </div>
                                <div class="input-hint">Ingresa el código de 6 dígitos</div>
                            </div>

                            <div class="timer-container">
                                <div class="timer" id="timer">
                                    <i class="fas fa-hourglass-half"></i>
                                    <span id="timerText">10:00</span>
                                </div>
                                <button type="button" class="resend-btn" id="resendBtn" disabled>
                                    <i class="fas fa-redo-alt"></i>
                                    Reenviar código
                                </button>
                            </div>

                            <button type="submit" class="verify-btn">
                                <i class="fas fa-check"></i>
                                Verificar correo
                            </button>
                        </form>

                        <div class="help-text">
                            <p><i class="fas fa-question-circle"></i> ¿No recibiste el código?</p>
                            <ul>
                                <li>Revisa tu carpeta de <strong>Spam</strong> o <strong>Correo no deseado</strong></li>
                                <li>Verifica que el correo electrónico sea correcto</li>
                                <li>Espera unos minutos y vuelve a intentarlo</li>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Footer -->
            <div class="verify-footer">
                <p>&copy; <?php echo $current_year; ?> AYOUPI. Todos los derechos reservados.</p>
                <div class="footer-links">
                    <a href="terms.php">Términos y Condiciones</a>
                    <a href="#">Política de Privacidad</a>
                    <a href="#">Ayuda</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Variables para el temporizador
        let timeLeft = 600; // 10 minutos en segundos
        let timerInterval;
        let canResend = false;

        // Elementos del DOM
        const timerText = document.getElementById('timerText');
        const resendBtn = document.getElementById('resendBtn');
        const codeInput = document.getElementById('verification_code');
        const verifyForm = document.getElementById('verifyForm');

        // Iniciar temporizador
        function startTimer() {
            timerInterval = setInterval(() => {
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    canResend = true;
                    resendBtn.disabled = false;
                    timerText.textContent = '00:00';
                    document.querySelector('.timer').classList.add('expired');
                } else {
                    timeLeft--;
                    const minutes = Math.floor(timeLeft / 60);
                    const seconds = timeLeft % 60;
                    timerText.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                }
            }, 1000);
        }

        // Reenviar código
        function resendCode() {
            if (canResend) {
                // Mostrar loading en el botón
                const originalText = resendBtn.innerHTML;
                resendBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
                resendBtn.disabled = true;
                
                // Simular envío (en producción aquí iría una petición AJAX)
                setTimeout(() => {
                    window.location.href = 'verify-email.php?resend=true&email=<?php echo urlencode($user_email); ?>';
                }, 1500);
            }
        }

        // Función para pegar desde portapapeles
        async function pasteFromClipboard() {
            try {
                const text = await navigator.clipboard.readText();
                if (text && /^\d{6}$/.test(text.trim())) {
                    codeInput.value = text.trim();
                    // Auto-enviar el formulario después de pegar
                    setTimeout(() => {
                        verifyForm.submit();
                    }, 500);
                } else if (text) {
                    alert('El código debe ser un número de 6 dígitos');
                }
            } catch (err) {
                console.error('Error al pegar:', err);
                alert('No se pudo acceder al portapapeles. Por favor, ingresa el código manualmente.');
            }
        }

        // Formatear input para solo números
        codeInput.addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);
            
            // Auto-enviar cuando se ingresan 6 dígitos
            if (this.value.length === 6) {
                verifyForm.submit();
            }
        });

        // Agregar efecto visual al input
        codeInput.addEventListener('keyup', function() {
            if (this.value.length === 6) {
                this.classList.add('complete');
            } else {
                this.classList.remove('complete');
            }
        });

        // Botón de pegar
        document.getElementById('pasteBtn').addEventListener('click', pasteFromClipboard);

        // Botón de reenviar
        resendBtn.addEventListener('click', resendCode);

        // Iniciar temporizador al cargar la página
        startTimer();

        // Si hay parámetro resend, mostrar mensaje y reiniciar timer
        <?php if ($resend_success): ?>
            timeLeft = 600;
            canResend = false;
            resendBtn.disabled = true;
            clearInterval(timerInterval);
            startTimer();
        <?php endif; ?>

        // Enfoque automático en el input
        codeInput.focus();
    </script>
</body>
</html>