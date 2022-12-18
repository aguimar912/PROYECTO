<?php

class Producto{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;

        $this->cn = new PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        
    }


    public function mostrar(){
        $sql = "SELECT productos.id, titulo,foto,nombre,precio,fecha FROM productos 
        
        INNER JOIN categorias
        ON productos.categoria_id = categorias.id ORDER BY productos.id DESC
        ";
        
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }


    public function mostrarPorId($id){
        
        $sql = "SELECT * FROM `productos` WHERE `id`=:id ";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" =>  $id
        );

        if($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }


    public function registrar($_params){
        $sql = "INSERT INTO `productos`(`titulo`,  `foto`, `precio`, `categoria_id`, `fecha`, `stock`) 
        VALUES (:titulo,:foto,:precio,:categoria_id,:fecha,:stock)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":titulo" => $_params['titulo'],
            ":foto" => $_params['foto'],
            ":precio" => $_params['precio'],
            
            ":categoria_id" => $_params['categoria_id'],
            ":fecha" => $_params['fecha'],
            ":stock" => $_params['stock'],

        );

        if($resultado->execute($_array))
            return true;

        return false;
    }


    public function actualizar($_params){
        $sql = "UPDATE `productos` SET `titulo`=:titulo,`foto`=:foto,`precio`=:precio,`categoria_id`=:categoria_id,`fecha`=:fecha  WHERE `id`=:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":titulo" => $_params['titulo'],
            ":foto" => $_params['foto'],
            ":precio" => $_params['precio'],
  
            ":categoria_id" => $_params['categoria_id'],
            ":fecha" => $_params['fecha'],
            ":id" =>  $_params['id']
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }


    public function eliminar($id){

    // $sql = "DELETE pe, p, dp FROM `pedidos` pe 
    // INNER JOIN `detalle_pedidos` dp 
    // ON pe.`id`=dp.`pedido_id`
    // INNER JOIN `productos` p
    // ON p.`id`=dp.`producto_id`
    // WHERE p.`id`=:id";
        $resultado = $this->cn->prepare($sql);
        
        $_array = array(
            ":id" =>  $id
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    
}



