<?php
require '../Clases/Producto.php';

$producto = new Producto;

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    if ($_POST['accion']==='Registrar'){

        if(empty($_POST['titulo']))
            exit('Completar titulo');

        if(empty($_POST['categoria_id']))
            exit('Seleccionar una Categoria');

        if(!is_numeric($_POST['categoria_id']))
            exit('Seleccionar una Categoria válida');

        
        $_params = array(
            'titulo'=>$_POST['titulo'],
            'foto'=> subirFoto(),
            'precio'=>$_POST['precio'],
            'categoria_id'=>$_POST['categoria_id'],
            'fecha'=> date('Y-m-d'),
            'stock' => 50
        );

        $rpt = $producto->registrar($_params);

        if($rpt)
            header('Location: productos/index.php');
        else
            print 'Error al registrar el producto';
        

    }

    if ($_POST['accion']==='Actualizar'){

        if(empty($_POST['titulo']))
        exit('Completar titulo');

    if(empty($_POST['categoria_id']))
        exit('Seleccionar una Categoria');

    if(!is_numeric($_POST['categoria_id']))
        exit('Seleccionar una Categoria válida');

    
    $_params = array(
        'titulo'=>$_POST['titulo'],
        'precio'=>$_POST['precio'],
        'categoria_id'=>$_POST['categoria_id'],
        'fecha'=> date('Y-m-d'),
        'id'=>$_POST['id'],
    );

    if(!empty($_POST['foto_temp']))
        $_params['foto'] = $_POST['foto_temp'];
    
    if(!empty($_FILES['foto']['name']))
        $_params['foto'] = subirFoto();

    $rpt = $producto->actualizar($_params);
    if($rpt)
        header('Location: productos/index.php');
    else
        print 'Error al actualizar el producto';

    }

}

if($_SERVER['REQUEST_METHOD'] ==='GET'){

    $id = $_GET['id'];

    $rpt = $producto->eliminar($id);
    
    if($rpt)
        header('Location: productos/index.php');
    else
        print 'Error al eliminar el producto';


}


function subirFoto() {

    $carpeta = __DIR__.'/../imagenesProductos/'; //para guardar la ruta de la carpeta en la que vamos a guardar las imágenes

    $archivo = $carpeta.$_FILES['foto']['name']; //recogemos el nombre de la foto que el usuario está seleccionando
	//$_FILES contiene el nombre de la foto que le llega por post y con el name accedemos al atributo de la foto

    move_uploaded_file($_FILES['foto']['tmp_name'],$archivo); //función que mueve la foto. primero coge la foto que queremos subir, y luego la ruta de la nueva carpeta

    return $_FILES['foto']['name'];


}




