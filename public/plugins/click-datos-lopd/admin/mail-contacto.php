<?php

require_once("../../../../wp-load.php");
//Variables del formulario.
$nombreu = utf8_decode($_POST['nombreu']);
$nombrec = utf8_decode($_POST['nombrec']);
$email = utf8_decode($_POST['email']);
$url = utf8_decode($_POST['url']);
$consulta = utf8_decode($_POST['mensaje']);
$fecha = strftime("Fecha: %d-%m-%Y y Hora: %H:%M:%S", time());
$ipaddress = '';

if (getenv('HTTP_CLIENT_IP')) {
    $ipaddress = getenv('HTTP_CLIENT_IP');
} else if (getenv('HTTP_X_FORWARDED_FOR')) {
    $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
} else if (getenv('HTTP_X_FORWARDED')) {
    $ipaddress = getenv('HTTP_X_FORWARDED');
} else if (getenv('HTTP_FORWARDED_FOR')) {
    $ipaddress = getenv('HTTP_FORWARDED_FOR');
} else if (getenv('HTTP_FORWARDED')) {
    $ipaddress = getenv('HTTP_FORWARDED');
} else if (getenv('REMOTE_ADDR')) {
    $ipaddress = getenv('REMOTE_ADDR');
} else {
    $ipaddress = 'UNKNOWN';
}

// título
$titulo = '[Contacto plugin clickDatos] ' . $email . ' - ' . $nombrec;
// mensaje
$mensaje = '<p>El usuario ' . $nombreu . ', con nombre completo ' . $nombrec . ', ha solicitado una evaluaci&oacute;n de su web.</p>
<p>La direcci&oacute;n web de su portal es ' . $url . ' </p>
<p>Su email es ' . $email . '</p>';
if ($consulta !== "") {
    $mensaje .= '<p>
El usuario del plugin adjunta el siguiente mensaje: ' . $consulta . '</p>';
}
$mensaje .= '<p>La dirección IP del cliente es: ' . $ipaddress . '</p>';
$mensaje .= '<p>El mensaje fue enviado con '.$fecha.'</p>';
$mensaje .= '<br><br><p>Acepta Política Privacidad: SI</p>';


$header = "Content-Type: text/html; charset=UTF-8";
// respuesta
$resultado = wp_mail("plugin@clickdatos.es", $titulo, utf8_encode($mensaje), $header);

//$titulocliente = '[Contacto plugin clickDatos]  - Confirmación de email.';
//
//$mensajecliente = '<p>clickDatos ha recibido su email, le responderemos lo antes posible.</p> <p>Gracias por confiar en nosotros.</p>'; 
//
//wp_mail($email, $titulocliente, utf8_encode($mensajecliente), $header);

if ($resultado) {
    echo "Tu correo ha sido enviado correctamente.";
} else {
    echo "Hubo un problema al enviar el email, intentalo de nuevo.";
}

