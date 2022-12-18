<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nombre_usuario = $_POST['nombre_usuario'];
    $clave = $_POST['clave'];
    require '../Clases/Usuario.php';
    $usuario =new Usuario;
    $resultado = $usuario->login($nombre_usuario,$clave);

    if($resultado){
        session_start();

        $_SESSION['usuario_info'] = array(
            'nombre_usuario'=>$resultado['nombre_usuario']
        );
        
     header('Location: panel.php');
    }else{
        header('Location: index.php');
    }
}


?>