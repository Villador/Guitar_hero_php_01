
<?php
session_start();

$usuarioNombre="perfil";

function nombreUsuario($id1){
	$jason=file_get_contents('../DB/usuarios.json');
	$usuarios=json_decode($jason,true);

		return	$usuarios[$id1]['email'];

}

if (isset($_SESSION['id'])){
$id=$_SESSION['id'];
$formPerfil="perfil-usuario.php";
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
  <title>Tus Compras</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="carrito.css">
<link rel="stylesheet" href="../css/headerfooter2.css">
</head>
<body>
  <div class="conainer-fluid">
    <header>

      <div class="container-fluid">

          <nav class="navbar navbar-expand-lg navbar-light bg-light  ">
              <a class="navbar-brand" href="#"><img  width= "110px"src="../imagenes/logo.png" alt=""></a>
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
                  <a class="dropdown-item" href="../section.php">Rock Nacional</a>
                  <a class="dropdown-item" href="../section.php">Funk</a>
                  <a class="dropdown-item" href="../section.php">Clasicos del los 80</a>
                </div>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Audio
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../section.php">Auriculares</a>
                  <a class="dropdown-item" href="../section.php">Parlantes</a>

                </div>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Instrumentos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../section.php">Guitarras</a>
                  <a class="dropdown-item" href="../section.php">Baterias</a>
                  <a class="dropdown-item" href="../section.php">Pianos</a>
                </div>
                </li>
              </ul>
              <div class="menu-derehca navbar-nav mr-1">
                <a href="<?= $formPerfil ?>" class="btn btn-outline-secondary btn-sm mr-2"> <?= $usuarioNombre ?></a>
                <a href="registro.php" class="btn btn-outline-secondary btn-sm mr-2"> registrate</a>
                <a href="login.php" class="btn btn-outline-secondary btn-sm mr-2"> log in</a>
                <a class="btn btn-outline-secondary btn-sm" href="carrito.php"><img src="https://img.icons8.com/windows/26/000000/shopping-cart.png"></a>

              </div>



              </div>


            </div>
            </nav>

      </div>
      </header>
        </div>


    </nav>
  </div>

<section>
<div class="container">
  <div class="row">
    <div class="prductos col-lg-8">
    <h3>Tu Carrito</h3>

    <div class="table-reponsive">
      <table class="table table-bordered">
  <thead>
    <tr class="bg-secondary">
      <th scope="col">#</th>
      <th scope="col">producto</th>
      <th scope="col">Descripcion</th>
      <th scope="col">precio</th>
      <th scope="col">cantidad</th>
      <th scope="col">total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td ><img src="../imagenes/ibanez_aeb8e_opt.jpg" alt="" width="80px"height="80px"> </td>
      <td>guitarra criolla</td>
      <td>$15.000</td>
      <td class="cart_quantity">
				<div class="cart_quantity_button">
						<a class="cart_quantity_up" href=""> + </a>
						<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
						<a class="cart_quantity_down" href=""> - </a>
				</div>
		</td>
    <td>$15.000</td>
    </tr>
  </tbody>
</table>
    </div>

    </div>
  </div>
  <div class="prductos col-lg-4">
    </div>
<button type="button" class="btn btn-outline-secondary">Comprar</button>

  </div>


</section>

<!-- COMIENZO FOOTER -->

<footer id="footer">
  <section class="container-fluid">
  <div class="row footer-l1">
      <div class="col-12 col-md-4">
        <a href="../Formularios/faq.php"><h5>Preguntas frecuentes!</h5></a>
      </div>
      <div class="col-12 col-md-4">
        <a href="../index.php"><img src="../imagenes/Logo.png" alt="">  </a>
      </div>
      <div class="col-12 col-md-4">
        <a href="../Formularios/contacto.php"><h5>Contactanos</h5></a>
      </div>

  </div>

  <div class="row footer-l2">
    <div class="col-12 col-md-4 seguinos">

      <div class="row">
        <h6>Seguinos</h6>
      <!-- </div>
      <div class="row"> -->
        <div class="redes">
          <a href="http://www.facebook.com"><img src="../imagenes/iconos/icons8-facebook-old-26.png" alt=""></a>
          <a href="http://instagram.com"><img src="../imagenes/iconos/icons8-instagram-50.png" alt=""></a>
          <a href="http://www.ar.pinterest.com/"><img src="../imagenes/iconos/icons8-pinterest-26.png" alt=""></a>
          <a href="http://twitter.com"><img src="../imagenes/iconos/icons8-twitter-24.png" alt=""></a>

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



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
