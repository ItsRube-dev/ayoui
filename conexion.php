<?php

//DEPENDENCIAS
    define("SERVIDOR","localhost");
    define("USUARIO","root");
    define("PASS","");
    define("BASE_DATOS","ayowi");
    define("KEY","T09_$3crE7");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';
//FIN DE DEPENDECIAS


    //SIEMPRE ANTES DE USAR ESTA FUNCION INICIAR SESSION ARRIBA DE TODO
    function generarCodigo($longitud = 6) {
        return str_pad(random_int(0, pow(10, $longitud) - 1), $longitud, '0', STR_PAD_LEFT);
    }


        function enviarCodigoVerificacion($emailDestino) {

            if (!filter_var($emailDestino, FILTER_VALIDATE_EMAIL)) {
                return "Correo inválido";
            }

            

            $codigo = generarCodigo();

            $_SESSION['codigo_verificacion'] = $codigo;
            $_SESSION['email_verificacion'] = $emailDestino;
            $_SESSION['codigo_expira'] = time() + 300; // 5 minutos

            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'AyouiCorp@gmail.com';
                $mail->Password   = 'epdv ktkt gejl gszt'; // contraseña de aplicación
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('AyouiCorp@gmail.com', 'Verificación');
                $mail->addAddress($emailDestino);

                $mail->isHTML(true);
                $mail->Subject = 'Código de verificación';
                $mail->Body    = "<h3>Tu código es: <b>$codigo</b></h3>";
                $mail->AltBody = "Tu código es: $codigo";

                $mail->send();

                return true;

            } catch (Exception $e) {
                return "Error: {$mail->ErrorInfo}";
            }
        }

        function verificarCodigo($codigoIngresado, $email) {

            session_start();

            if (!isset($_SESSION['codigo_verificacion'], $_SESSION['email_verificacion'], $_SESSION['codigo_expira'])) {
                return "No hay código generado";
            }

            if (time() > $_SESSION['codigo_expira']) {
                return "El código expiró";
            }

            if ($codigoIngresado == $_SESSION['codigo_verificacion'] && $email == $_SESSION['email_verificacion']) {
                return true;
            }

            return "Código incorrecto";
        }

        function validacion_pass($contra = null) {

            if (empty($contra)) return false;

            $mayus = $min = $num = $esp = false;

            foreach (str_split($contra) as $char) {
                if (ctype_upper($char)) $mayus = true;
                elseif (ctype_lower($char)) $min = true;
                elseif (ctype_digit($char)) $num = true;
                else $esp = true;
            }

            return ($mayus && $min && $num && $esp);
        }
    
    function encriptarPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    function consulta($sql = null) {

        if (empty($sql)) return false;

        $conexion = new mysqli(SERVIDOR, USUARIO, PASS, BASE_DATOS);

        if ($conexion->connect_error) return false;

        $resultado = $conexion->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            $datos = [];
            while ($fila = $resultado->fetch_assoc()) {
                $datos[] = $fila;
            }
            $resultado->free();
            $conexion->close();
            return $datos;
        }

        $conexion->close();
        return false;
    }

    function ejecutarSQL($sql = null) {

        if (empty($sql)) return false;

        $conexion = new mysqli(SERVIDOR, USUARIO, PASS, BASE_DATOS);

        if ($conexion->connect_error) return false;

        $resultado = $conexion->query($sql);

        $conexion->close();

        return $resultado ? true : false;
    }
?>