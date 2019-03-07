<?php session_start();

    if(isset($_SESSION['cuenta'])){
    	require 'inactividad.php';		
        require '../vista/formulario_citas-vista.php';

    }else{
        header ('location: ../sesion/login.php');
    }
        
?>