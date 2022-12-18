<?php
session_start(); //?
  require 'database.php';
  require 'funciones.php';
  require '../PROYECTO/Clases/Cliente.php';
  require '../PROYECTO/Clases/Pedido.php';

    if (!empty($_POST['usuario']) && !empty($_POST['nombre']) && !empty($_POST['password']) && !empty($_POST['correo']) && !empty($_POST['telefono'])) {
      if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
        $cliente = new Cliente;
    
        $_params = array(
            'usuario' => $_POST['usuario'],
            'nombre' => $_POST['nombre'],
            'password' => $_POST['password'],
            'correo' => $_POST['correo'],
            'telefono' => $_POST['telefono']
            
        );
    
        $cliente_dni = $cliente->registrar($_params);
    
        $pedido = new Pedido;
    
        $_params = array(
            'cliente_dni'=>$cliente_dni,
            'total' => calcularTotal(),
            'fecha' => date('Y-m-d')
        );
        
        $pedido_id =  $pedido->registrar($_params);

        foreach($_SESSION['carrito'] as $indice => $value){
            $_params = array(
                "pedido_id" => $pedido_id,
                "producto_id" => $value['id'],
                "precio" => $value['precio'],
                "cantidad" => $value['cantidad'],
            );

            $pedido->registrarDetalle($_params);
        }

        $_SESSION['carrito'] = array();

        header('Location: gracias.php');
      }
    }
?>