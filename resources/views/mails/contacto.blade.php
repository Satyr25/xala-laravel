<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correo de Contacto - Xala Demo con Laravel</title>
</head>
<body>
    <h1>Correo enviado automaticamente</h1>
    <p>Este correo es enviado automaticamente desde la página de prueba Xala Demo</p>

    <h3>Nombre:</h3>
    <p><?=$data['name']?></p>

    <h3>Empresa:</h3>
    <p><?=$data['company']?></p>

    <h3>Teléfono:</h3>
    <p><?=$data['phone']?></p>

    <h3>Comentarios:</h3>
    <p><?=$data['comments']?></p>

</body>
</html>