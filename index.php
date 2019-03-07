<?php session_start();

if(isset($_SESSION['cuenta'])) {
  header('location: principal.php');


  $_SESSION[ 'ULTIMA_ACTIVIDAD' ] = time();


}else{
  header('location: sesion/login.php');
}


?>