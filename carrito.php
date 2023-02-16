<?php
$mensaje="";
if(isset($_POST['btnAction'])){
switch($_POST['btnAction']){
case 'Agregar':
    if(is_numeric(openssl_decrypt( $_POST['id'], COD,KEY ))){
        $ID=openssl_decrypt( $_POST['id'], COD,KEY );
        $mensaje="OK id CORRECTO".$ID;

    }

    break;
}


}
?>