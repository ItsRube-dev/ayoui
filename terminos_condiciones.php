<?php
// terms.php - Página de Términos y Condiciones

// Configuración de la página
$page_title = "Términos y Condiciones - AYOUPI";
$current_year = date("Y");
$last_update = "15 de Marzo de 2026";

// Puedes agregar lógica de sesión si es necesario
session_start();

// Variable para saber si el usuario viene del formulario de registro
$from_registration = isset($_GET['from']) && $_GET['from'] === 'register';

// Función para limpiar texto (por si necesitas mostrar datos del usuario)
function cleanText($text) {
    return htmlspecialchars(trim($text), ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Términos y Condiciones de AYOUPI - Plataforma de clases particulares">
    <title><?php echo $page_title; ?></title>
    
    <!-- Estilos externos -->
    <link rel="stylesheet" href="css/terms.css">
    
    <!-- Font Awesome (opcional para iconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="terms-wrapper">
        <div class="terms-container">
            <!-- Header -->
            <div class="terms-header">
                <div class="logo">
                    <i class="fas fa-chalkboard-user"></i>
                    <span>AYOUPI</span>
                </div>
                <h1>Términos y Condiciones</h1>
                <p>Lee cuidadosamente antes de utilizar nuestros servicios</p>
                <div class="last-updated">
                    <i class="fas fa-clock"></i> Última actualización: <?php echo $last_update; ?>
                </div>
            </div>

            <!-- Contenido -->
            <div class="terms-content">
                <!-- Barra de progreso de lectura (opcional) -->
                <div class="reading-progress">
                    <div class="progress-bar" id="readingProgress"></div>
                </div>

                <!-- Índice rápido -->
                <div class="quick-index">
                    <h3><i class="fas fa-list"></i> Contenido</h3>
                    <ul>
                        <li><a href="#aceptacion">1. Aceptación de los Términos</a></li>
                        <li><a href="#servicios">2. Descripción del Servicio</a></li>
                        <li><a href="#registro">3. Registro de Cuenta</a></li>
                        <li><a href="#responsabilidades">4. Responsabilidades del Usuario</a></li>
                        <li><a href="#pagos">5. Pagos y Cancelaciones</a></li>
                        <li><a href="#privacidad">6. Privacidad y Protección de Datos</a></li>
                        <li><a href="#propiedad">7. Propiedad Intelectual</a></li>
                        <li><a href="#cancelacion">8. Cancelación y Suspensión</a></li>
                        <li><a href="#modificaciones">9. Modificaciones</a></li>
                        <li><a href="#contacto">10. Contacto</a></li>
                    </ul>
                </div>

                <!-- Sección 1 -->
                <div class="terms-section" id="aceptacion">
                    <h2><i class="fas fa-check-circle"></i> 1. Aceptación de los Términos</h2>
                    <p>Al acceder y utilizar la plataforma AYOUPI, usted acepta cumplir con estos Términos y Condiciones. Si no está de acuerdo con alguna parte de estos términos, no podrá utilizar nuestros servicios.</p>
                    <div class="highlight-box">
                        <i class="fas fa-gavel"></i>
                        <strong>Importante:</strong> Estos términos constituyen un acuerdo legal vinculante entre usted y AYOUPI.
                    </div>
                </div>

                <!-- Sección 2 -->
                <div class="terms-section" id="servicios">
                    <h2><i class="fas fa-chalkboard"></i> 2. Descripción del Servicio</h2>
                    <p>AYOUPI es una plataforma digital que conecta a estudiantes con profesores particulares para clases en línea o presenciales. Nuestros servicios incluyen:</p>
                    <ul>
                        <li>Búsqueda y reserva de clases particulares</li>
                        <li>Sistema de calificaciones y reseñas</li>
                        <li>Calendario de clases integrado</li>
                        <li>Material educativo compartido</li>
                        <li>Chat en tiempo real entre estudiantes y profesores</li>
                    </ul>
                </div>

                <!-- Sección 3 -->
                <div class="terms-section" id="registro">
                    <h2><i class="fas fa-user-plus"></i> 3. Registro de Cuenta</h2>
                    <p>Para utilizar nuestros servicios, debe crear una cuenta proporcionando información veraz y actualizada. Usted es responsable de:</p>
                    <ul>
                        <li>Mantener la confidencialidad de su contraseña</li>
                        <li>Todas las actividades que ocurran bajo su cuenta</li>
                        <li>Notificar inmediatamente cualquier uso no autorizado</li>
                        <li>Proporcionar información precisa y completa</li>
                    </ul>
                    <div class="warning-box">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Advertencia:</strong> AYOUPI se reserva el derecho de suspender cuentas con información falsa o actividades sospechosas.
                    </div>
                </div>

                <!-- Sección 4 -->
                <div class="terms-section" id="responsabilidades">
                    <h2><i class="fas fa-shield-alt"></i> 4. Responsabilidades del Usuario</h2>
                    <p>Como usuario de AYOUPI, usted se compromete a:</p>
                    <ul>
                        <li>No utilizar la plataforma para fines ilegales o no autorizados</li>
                        <li>Respetar a los profesores y otros estudiantes</li>
                        <li>No acosar, intimidar o discriminar a otros usuarios</li>
                        <li>No compartir contenido inapropiado, ofensivo o con derechos de autor</li>
                        <li>No intentar hackear, sobrecargar o dañar la plataforma</li>
                        <li>Cumplir con los horarios de clases acordados</li>
                    </ul>
                </div>

                <!-- Sección 5 -->
                <div class="terms-section" id="pagos">
                    <h2><i class="fas fa-credit-card"></i> 5. Pagos y Cancelaciones</h2>
                    <p><strong>Política de Pagos:</strong></p>
                    <ul>
                        <li>Las clases se pagan por adelantado a través de nuestra plataforma</li>
                        <li>Aceptamos tarjetas de crédito/débito y transferencias bancarias</li>
                        <li>Los precios son fijados por cada profesor individualmente</li>
                    </ul>
                    <p><strong>Política de Cancelación:</strong></p>
                    <ul>
                        <li>Cancelación con +24h de anticipación: Reembolso del 100%</li>
                        <li>Cancelación entre 12-24h: Reembolso del 50%</li>
                        <li>Cancelación con -12h: Sin reembolso</li>
                        <li>El profesor puede cancelar en cualquier momento con reembolso completo</li>
                    </ul>
                </div>

                <!-- Sección 6 -->
                <div class="terms-section" id="privacidad">
                    <h2><i class="fas fa-lock"></i> 6. Privacidad y Protección de Datos</h2>
                    <p>En AYOUPI nos tomamos muy en serio su privacidad. Cumplimos con la Ley Federal de Protección de Datos Personales y el RGPD. Para más detalles, consulte nuestra <a href="#" class="link">Política de Privacidad</a>.</p>
                    <p><strong>Datos que recopilamos:</strong></p>
                    <ul>
                        <li>Información de identificación (nombre, email, teléfono)</li>
                        <li>Datos académicos (nivel de estudios, materias de interés)</li>
                        <li>Historial de clases y pagos</li>
                        <li>Preferencias de aprendizaje</li>
                    </ul>
                    <p><strong>Nunca compartimos sus datos con terceros sin su consentimiento explícito.</strong></p>
                </div>

                <!-- Sección 7 -->
                <div class="terms-section" id="propiedad">
                    <h2><i class="fas fa-copyright"></i> 7. Propiedad Intelectual</h2>
                    <p>Todo el contenido de AYOUPI (logotipos, diseños, textos, software) es propiedad de la plataforma y está protegido por leyes de propiedad intelectual. No está permitido:</p>
                    <ul>
                        <li>Copiar, modificar o distribuir nuestro contenido sin autorización</li>
                        <li>Usar nuestra marca o logotipos sin permiso explícito</li>
                        <li>Ingeniería inversa de nuestra plataforma</li>
                    </ul>
                </div>

                <!-- Sección 8 -->
                <div class="terms-section" id="cancelacion">
                    <h2><i class="fas fa-ban"></i> 8. Cancelación y Suspensión</h2>
                    <p>AYOUPI se reserva el derecho de suspender o cancelar su cuenta si:</p>
                    <ul>
                        <li>Viola estos términos y condiciones</li>
                        <li>Realiza actividades fraudulentas o ilegales</li>
                        <li>Recibe múltiples quejas de otros usuarios</li>
                        <li>No utiliza la plataforma por más de 6 meses</li>
                    </ul>
                    <p>Usted puede cancelar su cuenta en cualquier momento desde la configuración de perfil.</p>
                </div>

                <!-- Sección 9 -->
                <div class="terms-section" id="modificaciones">
                    <h2><i class="fas fa-edit"></i> 9. Modificaciones a los Términos</h2>
                    <p>Podemos actualizar estos términos periódicamente. Notificaremos cambios importantes por:</p>
                    <ul>
                        <li>Correo electrónico registrado</li>
                        <li>Notificación en la plataforma</li>
                        <li>Banner visible al iniciar sesión</li>
                    </ul>
                    <p>El uso continuado de la plataforma después de los cambios constituye su aceptación.</p>
                </div>

                <!-- Sección 10 -->
                <div class="terms-section" id="contacto">
                    <h2><i class="fas fa-envelope"></i> 10. Contacto</h2>
                    <p>Si tiene preguntas sobre estos términos, contáctenos:</p>
                    <div class="contact-info">
                        <p><i class="fas fa-envelope"></i> <strong>Email:</strong> legal@ayoupi.com</p>
                        <p><i class="fas fa-phone"></i> <strong>Teléfono:</strong> +52 55 1234 5678</p>
                        <p><i class="fas fa-map-marker-alt"></i> <strong>Dirección:</strong> Av. Reforma 123, CDMX, México</p>
                        <p><i class="fas fa-clock"></i> <strong>Horario:</strong> Lunes a Viernes, 9am - 6pm</p>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="terms-actions">
                    <?php if ($from_registration): ?>
                        <a href="registro.php" class="btn-back">
                            <i class="fas fa-arrow-left"></i> Volver al registro
                        </a>
                    <?php else: ?>
                        <a href="javascript:history.back()" class="btn-back">
                            <i class="fas fa-arrow-left"></i> Volver atrás
                        </a>
                    <?php endif; ?>
                    
                    <button id="printTerms" class="btn-print">
                        <i class="fas fa-print"></i> Imprimir / PDF
                    </button>
                    
                    <button id="acceptTerms" class="btn-accept" <?php echo $from_registration ? '' : 'style="display:none"'; ?>>
                        <i class="fas fa-check"></i> Acepto los términos
                    </button>
                </div>

                <!-- Footer -->
                <div class="terms-footer">
                    <p>&copy; <?php echo $current_year; ?> AYOUPI. Todos los derechos reservados.</p>
                    <div class="footer-links">
                        <a href="#">Política de Privacidad</a>
                        <a href="#">Cookies</a>
                        <a href="#">Ayuda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Barra de progreso de lectura
        window.addEventListener('scroll', function() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById('readingProgress').style.width = scrolled + '%';
        });

        // Botón de imprimir
        document.getElementById('printTerms')?.addEventListener('click', function() {
            window.print();
        });

        // Botón de aceptar términos (para redireccionar al registro)
        document.getElementById('acceptTerms')?.addEventListener('click', function() {
            if (confirm('¿Confirmas que has leído y aceptas los términos y condiciones?')) {
                window.location.href = 'registro.php?terms_accepted=true';
            }
        });

        // Smooth scroll para los enlaces del índice
        document.querySelectorAll('.quick-index a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>