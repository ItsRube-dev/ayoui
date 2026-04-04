<?php

include('conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro Alumno</title>
<link rel="stylesheet" href="css/reg_alumno_css.css">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: url('img/fondo.jpg');
        background-repeat:no-repeat ;
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
    }

</style>
</head>

<body>
    <form action="" method="post" name="login" id="login">
        <div class="container">

            <div class="title">
                <h2>Regístrate como alumno</h2>
                <p>Crea una cuenta para reservar clases particulares.</p>
            </div>

            <div class="profile">
                <img id="preview" src="" alt="">
                <br>
                <button onclick="document.getElementById('file').click()">Subir foto</button>
                <input type="file" id="file" hidden>
            </div>

            <div class="input-group">
                <input type="text" placeholder="Nombre completo" name="name" id="name" maxlength="150" oninput="limitarCaracteres(this, 150)" required>
            </div>

            <div class="input-group">
                <input type="email" placeholder="Correo electrónico" name="mail" id="mail" maxlength="100" oninput="limitarCaracteres(this, 100)" >
            </div>

            <div class="input-group">
                <input type="number" placeholder="+52 Número de teléfono" name="number" id="number" maxlength="10" oninput="limitarCaracteres(this, 10)" required>
            </div>

            <div class="input-group">
                <input type="password" placeholder="Crea una contraseña" name="pass" id="pass" maxlength="18" oninput="limitarCaracteres(this, 18)" required>
            </div>

            <div class="input-group">
                <select>
                    <option>Nivel académico (opcional)</option>
                    <option>Primaria</option>
                    <option>Secundaria</option>
                    <option>Preparatoria</option>
                </select>
            </div>

            <div class="checkbox">
                <input type="checkbox" id="terms">
                <a href="terminos_condiciones.php">Acepto los términos y condiciones</a>
            </div>

            <button class="btn" name="enviar" onclick="crearCuenta()">Crear cuenta</button>

            <div class="footer">
                ¿Ya tienes cuenta? <a href="#">Inicia sesión</a>
            </div>

        </div>
    </form>
    <!-- <script>
        const fileInput = document.getElementById("file");
        const preview = document.getElementById("preview");
        

            fileInput.addEventListener("change", function() {
                const file = this.files[0];
                if (file) {
                    preview.src = URL.createObjectURL(file);
                }
            });

            const formulario=document.getElementById("login");

            function crearCuenta() {
                const terms = document.getElementById("terms").checked;
                formulario.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const nombre=document.getElementById('name').value;
                    const numero=document.getElementById('number').value;
                    const correo=document.getElementById('mail').value;
                    const contrasenia=document.getElementById('pass').value;
                    if((!!nombre && !!correo && !!numero && !!contrasenia )){ //si no ha ingresado datos o su contraseña es muy corta no procede    
                        if (!(!terms)) {//comprobacion de terminos y condiciones
                            alert("Debes aceptar los términos y condiciones");
                            if(contrasenia.length<=8 && contrasenia.length>=18){

                                alert("Cuenta creada (simulación)");
                            }else{
                                alert("la contraseña debe de tener un");
                            }
                        }
                    }else{//error por no rellenar campos
                        alert("Rellena todos los campos antes de continuar");
                        console.log("error en campos");
                    }
            }
        }
    </script>
 -->
<?php
    if(isset($_POST['enviar'])){
        $contraseña=null;
        $nombre_comp=$_POST['name'];
        $correo=$_POST['mail'];
        $telefono=$_POST['number'];
        $telefono=(string)$telefono;
        $contraseña=$_POST['pass'];
        
        if(!(empty($nombre_comp) && empty($correo) && empty($contraseña) && empty($telefono))){
            if(mb_strlen($contraseña)>=8 && mb_strlen($contraseña)<=18){
                
                    if(validacion_pass($contraseña)){
                        encriptarPassword($contraseña);
                        if(ejecutarSQL('INSERT INTO alumno (nombre, correo, tel, contraseña) VALUES ("'.$nombre_comp.'","'.$correo.'","'.$telefono.'","'.$contraseña.'")')){
                            echo '<script>
                                    alert("usuario creado con exito");
                                </script>';
                        }else{
                            echo '<script>
                                    alert("error al crear usuario");
                                </script>';                       
                        }
                    }else{
                        echo'<script>
                                alert("la contraseña debe contener caracteres especiales, numeros, mayusculas y minusculas");
                            </script>';
                    }
               
            }else{
                echo'<script>
                        alert("la contraseña debe ser mayor a 8 caracteres");
                    </script>';
            }
        }else{
            echo'<script>
                    alert("rellena todos los campos");
                </script>';
        }
    }
?>
<!-- <script>
    alert("");
</script> -->
</body>

