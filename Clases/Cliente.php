<?php


class Cliente{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;
        //parse_ini_file lee el contenido de ese archivo
        // __DIR__ devuelve la ruta actual de la carpeta (PROYECTO)

        $this->cn = new PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        
    }

    public function registrar($_params){
        $sql = "INSERT INTO `users`(`usuario`,`nombre`, `password`, `correo`, `telefono` ) 
        VALUES (:usuario,:nombre,:password,:correo,:telefono)";

        $resultado = $this->cn->prepare($sql);
        
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); //encripta la contraseña

        $_array = array(       
            ":usuario" => $_params['usuario'],
            ":nombre" => $_params['nombre'],
            ":password" => $password,
            ":correo" => $_params['correo'],
            ":telefono" => $_params['telefono']          
        );

        if($resultado->execute($_array))
            return $this->cn->lastInsertId();

        return false;
    }
}
?>