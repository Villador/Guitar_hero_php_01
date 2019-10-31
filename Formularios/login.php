    <?php

    session_start();

    function verificarUsuario($usuarios, $email){
        foreach ($usuarios as $key3 => $usuario){

            if ($usuarios[$key3]["email"] === $_POST["email"]){

                return $key3; //$usuario;
            }
    }
    return null;
}

     if ($_POST){

        $json = file_get_contents('../DB/usuarios.json');

        $usuarios = json_decode($json, true);

        $usuario = verificarUsuario($usuarios, $_POST["email"]);

        if(is_null($usuario)){
            $error = "Los datos son incorrectos";
        }
        else{



            if($_POST['remember']=="on"){

              setcookie("remember",count($usuarios)-1,time()+3600);
// var_dump($_COOKIE['remember']);
            }


            $_SESSION["id"] = $usuario;
            header("Location:../index.php");

        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Log in</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="login1.css">
    </head>

        <body>
        <div id="formulario">
            <form action="login.php" method="post">
                <h2 style="text-align: center"> Log in!</h2>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email">
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" name="password">
                <?php  if (isset($error)):  ?>
                    <p><?= $error ?></p>
                <?php endif; ?>
                <div class="check10">

                  <input class="check1" type="checkbox" id="ch1" aria-label="Checkbox for following text input" name="remember">
                  <label class="check2">Recordar usuario</label>
                </div>

                <input type="submit" value="Ingresar!">
                <a href="#" id="forgot_pswd">Olvidaste tu contraseña?</a>
                <hr>

                <input type="submit" value="Si no tenes una cuenta, ingresá acá!">

                <div class="volverHome" >
                  <p><a clase "volverHome" href="../index.php">Volver a Home!</a></p>
                </div>

                </form>


                <br>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
