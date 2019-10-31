
<?php
session_start();

if (isset($_GET['action'])){
  if($_GET['action']=="incrementar"){
    $_SESSION['contador']++;
  }
  if($_GET["action"]=="resetear"){
    $_SESSION['contador'] = 0;
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

    <a href="? action=incrementar">incrementar</a>
    <a href="? action=resetear">resetear</a>
    <?php echo $_SESSION['contador'] ?>
  </body>
</html>
