<?php 

$result="";

if (isset($_POST['submit'])) {
    # code...
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='appcovidcitas@gmail.com';
    $mail->Password='#app123456';

    $mail->setFrom($_POST['email'],$_POST['nombre']);
    $mail->addAddress($_POST['email'],'appcovidcitas@gmail.com');
    $mail->addReplyTo($_POST['email'],$_POST['nombre']);

    $mail->isHTML(true);
    $mail->Subject='Enviado por '.$_POST['nombre'];
    $mail->Body='<h1 align=center>Nombre: '.$_POST['nombre'].'<br>Email: '.$_POST['email'].'<br>Mensaje: '
    .$_POST['mensaje'].'</h1>';

    if (!$mail->send()) {
        # code...
        $result="Algo esta mal, intentelo de nuevo por favor";
    }else{
        $result="Gracias ".$_POST['nombre']." por contactarnos, espera la respuesta muy pronto!";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---Archivos materialize-->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!---Inicializa icons-------->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css">
    <title>ENVIO DE MENSAJES A CORREO</title>
</head>
<body>
    <h2 style="text-align: center" >ENVIO DE MENSAJES VIA CORREO ELECTRONICO</h2>
    <main>

        <nav class="light-blue accent-4"></nav>
        <br><br>

        <div class="container">
            <form action="" method="post">
                <!-- nombre -->
                <div class="espnom">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" name="nombre" type="text" maxlength="50" data-length="50" required>
                </div>
                <!-- correo -->
                <div class="espma">
                    <label for="email">Correo</label>
                    <input id="email" name="email" type="email" maxlength="50" data-length="50" required>
                </div>
                <!-- mensajes -->
                <div class="espmen">
                    <label for="titmensaje">Mensajes</label>
                    <div class="alturaMensa">
                        <textarea name="mensaje" id="mensaje" class="ESPmensaje center-content" required></textarea>
                    </div>
                </div>
                <!-- enviar -->
                <div class="espenv">
                    <br>
                    <button class="btn waves-effect waves-light light-blue accent-4" type="submit" name="submit">Enviar</button>
                    <h5 class="notifCorrecto"><?= $result; ?></h5>
                </div>
            </form>
            <!-- regresar -->
            <section class="brn-in-con" id="brn-in">
                <a href="../index.html">Regresar</a>
            </section>

        </div>

    </main>


    
</body>
</html>