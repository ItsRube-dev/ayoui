<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro Maestro</title>
<link rel="stylesheet" href="css/reg_docente_css.css">

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
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

<div class="container">
    <div class="title">AYOUI</div>

    <div class="subtitle">Regístrate como maestro</div>
    <div class="text">Completa tu perfil para comenzar a dar clases particulares.</div>


    <div class="profile">
        <img id="preview" src="" alt="">
        <br>
        <button onclick="document.getElementById('file').click()">Subir foto</button>
        <input type="file" id="file" hidden>
    </div>
    <div class="input">
        <input type="text" placeholder="Nombre completo">
    </div>

    <div class="input">
        <input type="text" placeholder="Universidad donde estudiaste">
    </div>

    <div class="input">
        <input type="text" placeholder="Título y cédula profesional">
    </div>

    <div class="row">
        <span>Materias que puedes impartir</span>
        <button onclick="agregar()">+ Agregar</button>
    </div>

    <div class="input">
        <input type="number" placeholder="Precio por clase (MXN)">
    </div>

    <div class="checkbox">
        <input type="checkbox"> Acepto los términos y condiciones
    </div>

    <button class="submit-btn" onclick="crearCuenta()">Crear cuenta</button>

    <div class="back">← Atrás</div>
</div>

<script>
function subirFoto() {
    alert("Función para subir foto");
}

function agregar() {
    alert("Agregar materias");
}

function crearCuenta() {
    alert("Cuenta creada (simulación)");
}
</script>

</body>
</html>