
<?php
session_start();

$email = "";
$password = "";
$errors=[];

function verificarUsuario($email){
  $jason=file_get_contents("../DB/usuarios.json");
  $usuarios=json_decode($jason,true);
  foreach ($usuarios as $usuario) {
    if($usuario['email'] == $email){
      return true;
    }
  }
return false;
}

$cartelError1="";
$cartelError2="";


if($_POST){


//validar campos
if (! filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
  $errors['email']="Debe ingresar una direccion valida!";
}else{
  if(verificarUsuario($_POST['email'])){
    $errors['email']="El usuario ya existe";
  }else{
    $email= $_POST['email'];
  }
}

//validar PASSWORD



  if($_POST['password']!=$_POST['password_confirmation']){

    $errors['password']='el password no coincide';
  }else{

    if(strlen($_POST['password'])<8){

      $errors['password']='el password debe tener mas de 8 digitos';
    }else {

        if (ctype_digit($_POST['password']{0})){
          $errors['password']='el password debe comenzar con un digito alfabetico';
        }

    }

  }




if(empty($errors)){

$json=file_get_contents('../DB/usuarios.json');
$users=json_decode($json,true);
$users[]=[
  'email'=>$_POST['email'],
  'password'=> password_hash($_POST['password'],PASSWORD_DEFAULT),
  'nombre'=>isset($_POST['nombre']) ? $_POST['nombre']:'',
  'apellido'=>isset($_POST['apellido']) ? $_POST['nombre']:'',
  'cumpleanos'=>isset($_POST['cumpleanos']) ? $_POST['nombre']:'',
  'avatar'=>"../uploads/2189.jpg" //isset($_POST['avatar']) ? $_POST['nombre']:'',
];


$json=json_encode($users,JSON_PRETTY_PRINT);
$json=file_put_contents('../DB/usuarios.json',$json);

// var_dump($_POST);
// envio a pagina de perfil del usuario

if(isset($_POST['remember'])){

  if($_POST['remember']=='on'){

    setcookie("remember",count($users)-1,time()+3600);
  }
}
// var_dump($_POST['remember']);
$_SESSION['id'] = count($users)-1;
header("location: perfil-usuario.php");

}else{

  if(isset($errors['email'])){
    $cartelError1=$errors['email'];

  }
  if(isset($errors['password'])){
    $cartelError2=$errors['password'];
  }
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrate!</title>
    <link rel="stylesheet" href="registro1.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <!-- //tendria que loguear?
    //abrir la pagina del perfil -->

</head>
<body>

<form action="registro.php" method="post">

  <div class="container">
    <h1>Registro</h1>
    <p>Completá el formulario para registrarte!</p>
    <hr>

    <div class="row">




    <label for="email"><b>Email     </b><span style="color: red">    <?=$cartelError1 ?></span></label>
    <input type="text" placeholder="ejemplo: nombre@dominio.com" name="email" value="<?=$email?>" required>
    <div class="check10">

      <input class="check1" type="checkbox" id="ch1" aria-label="Checkbox for following text input" name="remember">
      <label class="check2">Recordar usuario</label>
    </div>



    <label for="psw"><b>Password</b><span style="color: red">    <?=$cartelError2 ?></span></label>
    <input type="password" placeholder="Ingresá tu password" name="password" value="" required>

    <label for="psw-repeat"><b>Repetir Password</b><span style="color: red">    <?=$cartelError2 ?></span></label>
    <input type="password" placeholder="Repetí tu password" name="password_confirmation" value="" required>



  </div>


    <hr>

    <p>Al crear tu cuenta, aceptas estar de acuerdo con nuestros <a href="terminos.php">Términos y condiciones</a>.</p>
    <!-- <button type="submit" class="registerbtn">Registrate!</button> -->
    <button class="registerbtn">Registrate!</button>

    <div class="container signin">
      <p>Ya tenes tu cuenta? <a href="login.php">Logueate acá!</a>.</p>
    </div>

    <div class="container signin">
      <p><a href="../index.php">Volver al Home!</a></p>
    </div>



  </div>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

</form>

</body>
