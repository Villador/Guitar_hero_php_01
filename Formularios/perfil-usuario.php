<?php
session_start();
$disabled=true;
// var_dump($_COOKIE['remember']);

if (isset($_SESSION['id'])){
  // var_dump( $_SESSION['id']);
  $id = $_SESSION['id'];
  $json=file_get_contents('../DB/usuarios.json');

  $usuarios=json_decode($json,true);
  $usuario=$usuarios[$id];


  if(isset($_GET['log'])){

    if($_GET['log']==0){

      session_unset();
      session_destroy();

      header('location:../index.php');

    }
  }

}else {


}

function upload($name,$dir='../uploads'){
  var_dump($_FILES[$name]);
    if(isset($_FILES[$name])){
      $ext=pathinfo($_FILES[$name]['name'], PATHINFO_EXTENSION);
      $hash=  md5(time(). $_FILES[$name]['tmp_name']);
      $path="$dir/$hash.$ext";
      move_uploaded_file($_FILES[$name]['tmp_name'],$path);

      return $path ;
    }

    return null;
}


 // var_dump($_POST);


if($_POST){

  if(isset($_POST['disabled'])){

      if($_POST['disabled']=="0"){

        $disabled=false;
      }else {
        $disabled=true;
      }
  }



// var_dump($_POST);


//primero validar los datos
  if(isset($_POST['grabar'])){

        if (! filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
          $errors['email']="Debe ingresar una direccion valida!";
        }

        //validar PASSWORD
            $email= $_POST['email'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            // $avatar=$_POST['avatar'];
            // $password=$_POST['password'];

          if($_POST['password']!=$_POST['password_confirmation']){

            $errors['password_confirmation']='el password no coincide';
          }else{

            if(strlen($_POST['password'])<8){

              $errors['password']='el password debe tener mas de 8 digitos';
            }else {

                if (ctype_digit($_POST['password']{0})){
                  $errors['password_confirmation']='el password debe comenzar con un digito alfabetico';
                }

            }

          }


        if(empty($errors)){

        $json=file_get_contents('../DB/usuarios.json');
        $users=json_decode($json,true);

            foreach ($users as $key2 => $value) {
              if($users[$key2]['email'] === $_POST['email']){
              $id1  =$key2;

              }
            }


            if (is_null(upload('avatar'))){

              //
              // if (password_verify($users[$id1], $users[$id1]['avatar'])) {
              //     echo '¡La contraseña es válida!';
              // } else {
              //     echo 'La contraseña no es válida.';
              // }


                $users[$id1]=[
                  'email'=>$_POST['email'],
                  'password'=> password_hash($_POST['password'],PASSWORD_DEFAULT),
                  'nombre'=>isset($_POST['nombre']) ? $_POST['nombre']:'',
                  'apellido'=>isset($_POST['apellido']) ? $_POST['apellido']:'',
                  'cumpleanos'=>isset($_POST['cumpleanos']) ? $_POST['cumpleanos']:'',

                ];



            }  else{
              $users[$id1]=[
                'email'=>$_POST['email'],
                'password'=> password_hash($_POST['password'],PASSWORD_DEFAULT),
                'nombre'=>isset($_POST['nombre']) ? $_POST['nombre']:'',
                'apellido'=>isset($_POST['apellido']) ? $_POST['apellido']:'',
                'cumpleanos'=>isset($_POST['cumpleanos']) ? $_POST['cumpleanos']:'',
                'avatar'=> upload('avatar'),
              ];
            }


        $json=json_encode($users,JSON_PRETTY_PRINT);
        $json=file_put_contents('../DB/usuarios.json',$json);

        // var_dump($_POST);
          $_SESSION['id'] = count($users)-1;


          header('Location: perfil-usuario.php');
        }

      }

}



 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="perfilUsuario.css">
  </head>
  <body>



    <section id="wrapper">

            <div class="container">

      <div id="content-wrapper">

      <section id="main">

            <header class="page-header">
              <h3>
      Sus datos personales
    </h3>
            </header>

      <section id="content" class="page-content">

    <form action="perfil-usuario.php" id="customer-form" class="js-customer-form" method="post" enctype="multipart/form-data">
      <section>

        <input type="hidden" name="id_customer" value="14">

      <div class="form-group row ">

        <!-- <form action="?action=perfil-usuario" method="post" enctype="multipart/form-data"> -->
            <label class="col-md-3 form-control-label">
              <a href="perfil-usuario.php?log=0">Log out</a>
            </label>

            <div class="col-md-3 form-control-valign">

                  <div class="foto">
                    <img src="<?= $usuario['avatar'] ?>" alt="avatar" style="border-radius:50%; width: 100px";>

                  </div>

            </div>

            <div class="col-md-6 form-control-valign">

                  <input type="file" name="avatar">
                  <!-- <input type="submit" value="Upload Image" name="submit"> -->

            </div>
        <!-- </form> -->

        <!-- <div class="col-md-3 form-control-comment">


        </div> -->
      </div>

      <div class="form-group row ">
        <label class="col-md-3 form-control-label required">
                  Nombre
              </label>
        <div class="col-md-6">

              <input
                class="form-control"
                name="nombre"
                type="text"
                value="<?= $usuario['nombre'] ?>" <?= $disabled ? 'disabled' : '' ?>
                        >

        </div>

        <div class="col-md-3 form-control-comment">


        </div>
      </div>

      <div class="form-group row ">
        <label class="col-md-3 form-control-label required">
                  Apellidos
              </label>
        <div class="col-md-6">
              <input
                class="form-control"
                name="apellido"
                type="text"
                value="<?= $usuario['apellido'] ?>" <?= $disabled ? 'disabled' : '' ?>
                         >


        </div>

        <div class="col-md-3 form-control-comment">


        </div>
      </div>

      <div class="form-group row ">
        <label class="col-md-3 form-control-label required">
                  Correo electrónico
              </label>
        <div class="col-md-6">

              <input
                class="form-control"
                name="email"
                type="text"
                value="<?= $usuario['email'] ?>" <?= $disabled ? 'disabled' : '' ?>
                         >

        </div>

        <div class="col-md-3 form-control-comment">

        </div>
      </div>

    <div class="form-group row ">
        <label class="col-md-3 form-control-label required">
                  Contraseña
              </label>
        <div class="col-md-6">


              <div class="input-group js-parent-focus">
                <input
                  class="form-control js-child-focus js-visible-password"
                  name="password"
                  type="password"
                  value="<?= $usuario['password'] ?>" <?= $disabled ? 'disabled' : '' ?>

                             >
                <span class="input-group-btn">
                  <button
                    class="btn"
                    type="button"
                    data-action="show-password"
                    data-text-show="Mostrar"
                    data-text-hide="Ocultar"
                  >
                    Mostrar
                  </button>
                </span>
              </div>

        </div>

        <div class="col-md-3 form-control-comment">

        </div>
      </div>

      <div class="form-group row ">
        <label class="col-md-3 form-control-label">
                  Nueva contraseña
              </label>
        <div class="col-md-6">



              <div class="input-group js-parent-focus">
                <input
                  class="form-control js-child-focus js-visible-password"
                  name="password_confirmation"
                  type="password"
                  value="<?= $usuario['password'] ?>" <?= $disabled ? 'disabled' : '' ?>

                              >
                <span class="input-group-btn">
                  <button
                    class="btn"
                    type="button"
                    data-action="show-password"
                    data-text-show="Mostrar"
                    data-text-hide="Ocultar"
                  >
                    Mostrar
                  </button>
                </span>
              </div>

        </div>

        <div class="col-md-3 form-control-comment">
                     Opcional
        </div>
      </div>

      <div class="form-group row ">
        <label class="col-md-3 form-control-label">
                  Fecha de nacimiento
              </label>
        <div class="col-md-6">

              <input
                class="form-control"
                name="cumpleanos"
                type="text"
                value="<?= $usuario['cumpleanos'] ?>"
                placeholder="DD/MM/YYYY"                                  >
                          <span class="form-control-comment">
                  (Ejemplo: 31/05/1970)
                </span>


        </div>

        <div class="col-md-3 form-control-comment">

                     Opcional

        </div>


      </div>



<!-- Botones para grabar o editar -->
      <div class="form-group row ">

        <?php if (!$disabled): ?>
          <div class="col-md-4 form-control-label boton_editar">
            <input type="hidden" name="grabar" value="1">
            <button type="submit" class="btn btn-dark">Grabar</button>


          </div>
          <div class="col-md-4 form-control-label boton_editar">
            <input type="hidden" name="disabled" value="1">
            <button class="btn btn-dark">Cancelar Edicion</button>


          </div>


        <?php else: ?>
          <div class="col-md-8 form-control-label boton_editar">
          <input type="hidden" name="disabled" value="0">
          <button class="btn btn-dark">Editar</button>
          </div>
        <?php endif ?>

              <div class="col-md-4 " >
                <p><a href="../index.php">Volver al Home!</a></p>
              </div>

    <!-- <a href="../home.html"><h6>volver a HOME</h6></a> -->

      </div>

</section>


</form>

                      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
