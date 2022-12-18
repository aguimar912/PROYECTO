<?php
session_start();
require 'funciones.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermercado</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <header class="main-header">
        <div class="container">
            <div class="main-header__container">
            <h1 class="main-header__title">ComeSano</h1>
              
    
                <nav class="main-nav" id="main-nav">
                    <ul class="menu">
                        <li class="menu__item"><a href="productos.php" class="menu__link">TODOS</a></li>
                        <li class="menu__item"><a href="productos.php" class="menu__link">Carne</a></li>
                        <li class="menu__item"><a href="productos.php" class="menu__link">Pescado</a></li>
                        <li class="menu__item"><a href="productos.php" class="menu__link">Verduras</a></li>
                        <li class="menu__item"><a href="productos.php" class="menu__link">Frutas</a></li>
                      
                    </ul>
                </nav>
            </div>


 
            <div class="main-header__container">
        
                <a href="carrito.php" class="main-header__btn" id="carrito"><i class="fa-solid fa-cart-shopping"></i><?php print cantidadProductos(); ?></a>
        
            </div>
        </div>
    </header>                
                <div class="slide-contenedor">
                    <div class="miSlider fade">
                        <img src="../PROYECTO/Productos/portada/img1.jpg" alt="">
                        <div class="slider__content">
           
                        </div>
                    </div>
                    <div class="miSlider fade">
                        <img src="../PROYECTO/Productos/portada/img2.jpg" alt="">
                        <div class="slider__content">
                            <h2 class="slider__title">Los más frescos.</h2>
                            <a href="productos.php" class="slider__section-btn">Comprar ahora</a>
                        </div>
                    </div>
                    <div class="miSlider fade">
                        <img src="../PROYECTO/Productos/portada/img3.jpg" alt="">
                        <div class="slider__content">
                            <h2 class="slider__title">Recoge en tienda.</h2>
                            <a href="productos.php" class="slider__section-btn">Comprar ahora</a>
                        </div>
                    </div>
                    <div class="direcciones">
                        <a href="#" class="atras" onclick="avanzaSlide(-1)">&#10094;</a>
                        <a href="#" class="adelante" onclick="avanzaSlide(1)">&#10095;</a>
                    </div>
                    <div class="barras">
                        <span class="barra active" onclick="posicionSlide(1)"></span>
                        <span class="barra" onclick="posicionSlide(2)"></span>
                        <span class="barra" onclick="posicionSlide(3)"></span>
                    </div>
                </div>
                <script src="main.js"></script>

    <main class="main">

              <section class="container-tips">
                <div class="tip">
                <i class="fa-solid fa-list-check"></i>                 
                <h2 class="tip__title">Compra on-line</h2>
                <p class="tip__txt">Ya puedes hacer tu compra on-line. Es muy fácil, sólo tienes que buscar los artículos a través de la barra de búsqueda y añadirlos a la cesta.</p>
                </div> 
                <div class="tip">
                <i class="fa-sharp fa-solid fa-check-double"></i>
                  <h2 class="tip__title">Recogida en tienda</h2>
                  <p class="tip__txt">Haces tu pedido y pasas por la tienda a recogerlo, así no pierdes tiempo haciendo la compra, pero prefieres recogerla tú mismo.</p>             
                 </div>  
                <div class="tip">
                    <i class="fa-solid fa-user-lock"></i>
                  <h2 class="tip__title">Pago seguro</h2>
                  <p class="tip__txt">Nuestra página está protegida con certificación SSL.</p>
                 
                </div>   
              </section> 
        </div>
    </main>
    <footer class="main-footer">
        <div class="footer__section">
          <h2 class="footer__title">Sobre nosotros</h2>
          <p class="footer__txt">Nuestro modelo de negocio se caracteriza por ofrecer los productos de mayor calidad al mejor precio del mercado, a través de una apuesta decidida por la sostenibilidad y la creación de valor compartido para la sociedad española. <br>
          Somos una de las empresas que más contribuyen al desarrollo económico de nuestro país, en especial de la industria agroalimentaria, gracias a un firme compromiso con el producto español y a nuestra capacidad para generar empleo de forma directa, indirecta e inducida.</p>
            <a href="mapa.html">Ven a conocernos
            </a>
        </div>
        <div class="footer__section">
            <h2 class="footer__title">Ayuda</h2>
            <p class="footer__txt"><i class="fa-solid fa-location-dot"></i> Seguimiento de pedidos</p>
            <p class="footer__txt"><i class="fa-solid fa-arrow-rotate-left"></i> Incidencias o Devoluciones</p>
            <p class="footer__txt"><i class="fa-solid fa-lock"></i> Política de Privacidad</p>
            <p class="footer__txt"><i class="fa-solid fa-cookie-bite"></i> Uso de Cookies</p>
            
          </div>
        <div class="footer__section">
          <h2 class="footer__title">Categorías</h2>
          <a href="" class="footer__link">Carne</a>
          <a href="" class="footer__link">Pescado</a>
          <a href="" class="footer__link">Verduras</a>
          <a href="" class="footer__link">Frutas</a>
        </div>
        <div class="footer__section">
            <h2 class="footer__title">Suscríbete a nuestras ofertas</h2>
            <p class="footer__txt">Al suscribirse a nuestra lista de correo, siempre recibirá nuestras últimas noticias y actualizaciones.</p>
            <input type="email" class="footer__input" placeholder="Introduce tu email">
          </div>
        <p class="copy">© 2022 ComeSano. Todos los derechos reservados | Diseño por Andrea Guillén Martínez</p>
     
    
    </footer>
    


</body>

</html>