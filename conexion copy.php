<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
function validar_email(){
  // Generar código
  function generarCodigo($longitud = 6) {
      return str_pad(random_int(0, pow(10, $longitud) - 1), $longitud, '0', STR_PAD_LEFT);
  }

  // Validar email
  if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      die("Correo inválido.");
  }

  $emailDestino = $_POST['email'];
  $codigo = generarCodigo();

  // Iniciar sesión segura
  session_start([
      'cookie_httponly' => true,
      'cookie_secure'   => isset($_SERVER['HTTPS']),
      'cookie_samesite' => 'Strict'
  ]);

  // ✅ Guardar correctamente
  $_SESSION['codigo_verificacion'] = $codigo;
  $_SESSION['email_verificacion'] = $emailDestino;

  $mail = new PHPMailer(true);

  try {
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;

      // 🔴 AQUÍ VA TU CONFIGURACIÓN REAL
      $mail->Username   = 'AyouiCorp@gmail.com'; // tu correo real
      $mail->Password   = 'epdv ktkt gejl gszt'; // contraseña de aplicación de Google

      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port       = 587;

      // Remitente
      $mail->setFrom('AyouiCorp@gmail.com', 'Verificación');

      // Destinatario
      $mail->addAddress($emailDestino);

      // Contenido
      $mail->isHTML(true);
      $mail->Subject = 'Código de verificación';
      $mail->Body    = "<h3>Tu código de verificación es: <b>$codigo</b></h3>";
      $mail->AltBody = "Tu código de verificación es: $codigo";

      $mail->send();
      echo "Código enviado a $emailDestino";

  } catch (Exception $e) {
      echo "Error al enviar el correo: {$mail->ErrorInfo}";
  }
}
  function verificarGmail($email) {
    // 1. Validar formato general
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
  }


  function validacion_pass($contra=null){
    $mayus=false;
    $min=false;
    $num=false;
    $esp=false;
    if(!(empty($contra))){
      $ps=str_split($contra);
      foreach($ps as $char){
        if(ctype_upper($char)){
          $mayus=true;
        }else if(ctype_lower($char)){
          $min=true;
        }else if(ctype_digit($char)){
          $num=true;
        }else{
          $esp=true;
        }
        
      }
    }
    if(!($mayus && $min && $num && $esp)){
      return false;
    }else{
      return true;
    }
  }
?>

  <script>
    // Función para limitar caracteres en tiempo real
    function limitarCaracteres(input, max) {
        if (input.value.length > max) {
            input.value = input.value.slice(0, max); // Recorta el exceso
            alert("Máximo " + max + " caracteres permitidos.");
        }
    }
</script>

<!-- fin de area de metodos no relacionados con coneccion -->

<?php
    class Conexion{
        public static function Conectar() {
            define('servidor','localhost');
            define('nombre_db','ayowi');
            define('usuario','root');
            define('password','');

            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
            try{
                $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_db,usuario,password,$opciones);
                return $conexion;
            }catch (Exception $e){
                die("El error de la conexion es: ". $e->getMessage());
            }
        }
    }

    define("SERVIDOR","localhost");
    define("USUARIO","root");
    define("PASS","");
    define("BASE_DATOS","ayowi");
    define("KEY","T09_$3crE7");
    
    
    function encriptarPassword($password) {
      return password_hash($password, PASSWORD_DEFAULT);
    }

    function consulta($sql=NULL){
    if(!empty($sql)){
      if($result = new mysqli(SERVIDOR,USUARIO,PASS,BASE_DATOS)){
          if($result2 = $result-> query($sql)){
            if($result2->num_rows >0){
                  $arreglo=array();
                  while($reg=mysqli_fetch_assoc($result2)){ 
                     array_push($arreglo,$reg);
                  }
            }
          }
      }
    }

    
    if(!empty($result2)){
      $result2 -> free_result();
    }
    

    if(!empty($result)){
      $result -> close();
    }

    if($arreglo){
      return $arreglo;
    }else{ return false; }
  }

  function ejecutarSQL($sql=NULL){
      if(!empty($sql)){
        if($result = new mysqli(SERVIDOR,USUARIO,PASS,BASE_DATOS)){
          if ($result-> query($sql)) {
              $ejecucion = true;
            }  
        }
      } 
  
    if(!empty($result)){
      $result -> close();
    }

    if($ejecucion){
      return true;
    }else{
      return false;
    }
  }

  

?>

