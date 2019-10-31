<?php
session_start();
$_SESSION['contador']=0;
if(isset($_SESSION['contador'])){

  echo $_SESSION['contador'];
}

 ?>
