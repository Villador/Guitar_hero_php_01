
<?php

function verificarUsuario($usuarios,$email,$password){
  foreach ($usuarios as $usuario) {
    if($usuario['email'] == $email && password_verify($password,$usuario['password'])){
      return $usuario;
    }
  }
return false;
}




if($_POST){
  $jason=file_contents("data.jason");
  $usuarios=jason_decode($jason,true);
  foreach ($usuarios as $key => $value) {
    if($usuarios['email'] != $_POST['email']){
        $usuario['email'] = $_POST['email'];
      $usuario['password']=password_hash($_POST['email'],PASSWORD_DEFAULT);
      $usuarios[]=$usuario;

    }
  }
}


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form class="container form-group " action="" method="post">
      <div class="row">
        <label for="email">Email</label>
        <input type="text" name="email" value="">
      </div>

<div class="row">
  <label for="password">password</label>
  <input type="text" name="password" value="">
</div>


      <button type="submit" name="button">registrar</button>

    </form>

  </body>
</html>
