<?php
$mensaje = "";
if (isset($_POST['btnAction'])) {
    switch ($_POST['btnAction']) {
        case 'Agregar':
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
                $mensaje .= "OK id CORRECTO " . $ID . "<br/>" ;
            } else {
                $mensaje .= "id INCORRECTO " . "<br/>";
            }
            
            if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
                $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
                $mensaje .= "OK nombre CORRECTO " . $NOMBRE . "<br/>";
            } else {
                $mensaje .= "nombre INCORRECTO " . "<br/>";
            }
            
            if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
                $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);
                $mensaje .= "OK cant CORRECTA " . $CANTIDAD . "<br/>";
            } else {
                $mensaje .= "cant INCORRECTO" . "<br/>";
            }
            
            if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
                $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
                $mensaje .= "OK precio CORRECTO " . $PRECIO . "<br/>";
            } else {
                $mensaje .= "precio INCORRECTO " . "<br/>";
            }
            break;
    }

}
