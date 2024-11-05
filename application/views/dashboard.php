<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <style type="text/css">
        body {
            height: 100vh; /* Ocupa toda la altura de la ventana */
            /*margin: 0; /* Elimina el margen por defecto */
            background: radial-gradient(circle,#005f5b, #007b7f, #001f4f);
/* Degradado de izquierda a derecha */
            /*display: flex; /* Centrar contenido */
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
            color: white; /* Color del texto */
            font-family: Arial, sans-serif; /* Fuente */
        }
    </style>
</head>
<body>
    <div class="">
        <h3>Bienvenido, Has iniciado sesión exitosamente. <a href="<?= site_url('auth/logout'); ?>" class="btn btn-danger">Cerrar Sesión</a></h3>
        
    </div>
    <h1 align="center">Chat en Tiempo Real</h1>
    <div id="chat"></div>
    <textarea name="mensaje" rows="10" cols="100"></textarea>

    <p></p>

    <input type="text" id="message" placeholder="Escribe tu mensaje">
    <button id="send">Enviar</button>
       
</body>
</html>
