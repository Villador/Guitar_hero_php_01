<?php
session_start();

$usuarioNombre="perfil";

function nombreUsuario($id1){
	$jason=file_get_contents('DB/usuarios.json');
	$usuarios=json_decode($jason,true);

		return	$usuarios[$id1]['email'];

}

if (isset($_SESSION['id'])){
$id=$_SESSION['id'];
$formPerfil="Formularios/perfil-usuario.php";
$usuarioNombre= nombreUsuario($id);



}else {
	$formPerfil="#";
}

 ?>









<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Producto</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/product-page-style.css">
  <link rel="stylesheet" href="css/header-footer.css">
</head>


<body>

<!-- COMIENZO DEL HEADER -->
<header>

<div class="container-fluid">

    <nav class="navbar navbar-expand-lg navbar-light bg-light  ">
        <a class="navbar-brand" href="index.php"><img  width= "110px"src="imagenes/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown ">
        <ul class="navbar-nav mr-auto ">
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Discos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="section.php">Rock Nacional</a>
            <a class="dropdown-item" href="section.php">Funk</a>
            <a class="dropdown-item" href="section.php">Clasicos del los 80</a>
          </div>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Audio
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="section.php">Auriculares</a>
            <a class="dropdown-item" href="section.php">Parlantes</a>

          </div>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Instrumentos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="section.php">Guitarras</a>
            <a class="dropdown-item" href="section.php">Baterias</a>
            <a class="dropdown-item" href="section.php">Pianos</a>
          </div>
          </li>
        </ul>
        <div class="menu-derehca navbar-nav mr-1">
          <a href="<?= $formPerfil ?>"  class="btn btn-outline-secondary btn-sm mr-2"> <?= $usuarioNombre ?></a>
          <a href="Formularios/registro.php" class="btn btn-outline-secondary btn-sm mr-2"> registrate</a>
          <a href="Formularios/login.php" class="btn btn-outline-secondary btn-sm mr-2"> log in</a>
          <a class="btn btn-outline-secondary btn-sm" href="Formularios/carrito.php"><img src="https://img.icons8.com/windows/26/000000/shopping-cart.png"></a>

        </div>



        </div>


      </div>
      </nav>

</div>
</header>
  <!-- FINAL DEL HEADER -->


<!-- SECCION PRINCIPAL DE LA PAGINA -->

<div class="container-fluid">

  <section class="row">

    <div class="category-path">
      <h6>
        <ul>
          <li>
            <a href="section.html">Rubro |</a>
          </li>
          <li>
            <a href="section.html">categoria |</a>
          </li>
          <li>
            <a href="#">sub-categoria</a>
          </li>

        </ul>
      </h6>
    </div>
  </section>
  <section class="row">


        <!-- <div class="Product-details"> -->

          <div class="col-12 col-md-6">
            <section class="row">

              <div class="col-12">

                <section class="row">
                  <section class="product-photo">

                    <a href="#">
                      <img  src="imagenes/07-babasonicos-miami.jpg" alt="">
                    </a>
                  </section>
                </section>
              </div>
              <div class="col-12">
                <section class="row">

                  <section class="product-photos-min">

                      <ul>
                        <li>
                          <a href="#">
                            <img  src="imagenes/07-babasonicos-miami.jpg" alt="">
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <img  src="imagenes/07-babasonicos-miami.jpg" alt="">
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <img  src="imagenes/07-babasonicos-miami.jpg" alt="">
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <img  src="imagenes/07-babasonicos-miami.jpg" alt="">
                          </a>
                        </li>

                      </ul>

                  </section>

                </section>

              </div>
            </section>
          </div>

        <div class="col-12 col-md-6">
          <section class="product-info">
            <div class="product-short-description">

              <div class="product-brand">
                    <a href="#"><img src="imagenes/logo-generico.png" alt="product-brand"></a>
              </div>

              <div class="product-name">
                <h1>
                  <p>
                    NOMBRE PRINCIPAL DEL PRODUCTO
                  </p>
                </h1>
              </div>

              <div class="product-stock">
                    <p>HAY STOCK

                    </p>
              </div>


              <section class="product-tipos-disp">

                  <ul>
                    <li>
                      <a href="#">
                        <img  src="imagenes/0b555fe99cdee15692b7a652889cad13.jpg" alt="">
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <img  src="imagenes/0b555fe99cdee15692b7a652889cad13.jpg" alt="">
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <img  src="imagenes/0b555fe99cdee15692b7a652889cad13.jpg" alt="">
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <img  src="imagenes/0b555fe99cdee15692b7a652889cad13.jpg" alt="">
                      </a>
                    </li>

                  </ul>

              </section>


              <div class="product-price">
                <p>
                  $ 21.950,00
                </p>

              </div>


            <div class="product-button-comprar">
              <a href="Formularios/carrito.html">COMPRAR</a>
            </div>

            </div>

          </section>
        </div>

        <!-- </div> -->
  </section>

  <section class="row">
        <div class="col">
          <div class="descripcion">
            <h3 class="de1">Descripcion General</h3>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

          </div>

        </div>

  </section>

  <section class="row">
        <div class="col">

          <h3 class="caracteristicas">Caracteristicas</h3>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

        </div>
        <div class="col">
          <h3 class="especficaciones">Especificaciones</h3>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

        </div>
  </section>

  <section class="row titulo-recomendados">
    <h4>Otros Productos Recomendados</h4>
  </section>


  <section class="row recomendados">


          <div class="col-12 col-sm-3">

            <div class="card text-center" style="width: 15rem;">
              <img src="imagenes/Metallica-Black-Album.jpg" class="card-img-top" alt="Metallica">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-dark">Comprar</a>
              </div>
            </div>
            </div>

            <div class="col-12 col-sm-3">
<!-- style="width: 10rem;" -->
              <div class="card text-center" style="width: 15rem;" >
                <img src="imagenes/Metallica-Black-Album.jpg" class="card-img-top" alt="Metallica">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-dark">Comprar</a>
                </div>
              </div>
              </div>

            <div class="col-12 col-sm-3">

                <div class="card text-center" style="width: 15rem;">
                  <img src="imagenes/Metallica-Black-Album.jpg" class="card-img-top" alt="Metallica">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-dark">Comprar</a>
                  </div>
                </div>
                </div>

                <div class="col-12 col-sm-3">

                  <div class="card text-center" style="width: 15rem;">
                    <img src="imagenes/Metallica-Black-Album.jpg" class="card-img-top" alt="Metallica">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-dark">Comprar</a>
                    </div>
                  </div>
                  </div>



  </section>




</div>
<!-- FIN SECCION PRINCIPAL DE LA PAGINA -->

<!-- COMIENZO FOOTER -->
<!-- COMIENZO FOOTER -->
<footer>
  <section class="container-fluid">
  <div class="row footer-l1">
      <div class="col-12 col-md-4">
        <a href="Formularios/faq.php"><h5>Preguntas frecuentes</h5></a>
      </div>
      <div class="col-12 col-md-4">
        <a href="index.php"><img src="imagenes\Logo.png" alt="">  </a>
      </div>
      <div class="col-12 col-md-4">
        <a href="Formularios/contacto.php"><h5>Contactanos</h5></a>
      </div>

  </div>

  <div class="row footer-l2">
    <div class="col-12 col-md-4 seguinos">

      <div class="row">
        <h6>Seguinos</h6>
      <!-- </div>
      <div class="row"> -->
        <div class="redes">
          <a href="http://www.facebook.com"><img src="imagenes/iconos/icons8-facebook-old-26.png" alt=""></a>
          <a href="http://instagram.com"><img src="imagenes/iconos/icons8-instagram-50.png" alt=""></a>
          <a href="http://www.ar.pinterest.com/"><img src="imagenes/iconos/icons8-pinterest-26.png" alt=""></a>
          <a href="http://twitter.com"><img src="imagenes/iconos/icons8-twitter-24.png" alt=""></a>

        </div>

      </div>

    </div>
    <div class="col-12 col-md-4 trabaja">
      <a href="#"><h5>Trabaja Con nosotros</h5>  </a>
    </div>

    <div class="col-12 col-md-4 contactanos">
      <a href="#"><h5>+54 11 5263-7400</h5></a>
    </div>


  </div>

  </section>

</footer>
<!-- FINAL DEL FOOTER -->
<!-- FINAL DEL FOOTER -->


<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
