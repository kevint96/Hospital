<?php session_start();

// echo $_SESSION['cuenta'];

if(isset($_SESSION['cuenta'])){

	require 'inactividad.php';

	require '../vista/principal-vista.php';
}else{
	header ('location: ../sesion/login.php');
}

?>