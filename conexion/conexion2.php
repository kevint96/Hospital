<?php 
function conexion(){
	$servidor="localhost";
	$usuario="root";
	$password="";
	$bd="hospitalcandelaria";

	$conexion=mysqli_connect($servidor,$usuario,$password,$bd);

	return $conexion;
}

function consultarDoctores($fecha,$especialidad){

	$conexion = conexion();

	$nombre = $_SESSION['cuenta'];

	$sql="SELECT nombre,apellido,fecha_disponible,hora_disponible,celular,especialidad 
	from medicos where fecha_disponible >='$fecha' and especialidad = '$especialidad'";

	$sql2 = "select A1.nombre,A1.apellido,A1.numero_documento,A1.fecha_disponible,A1.hora_disponible,A1.celular,A2.especialidad 
	from medicos A1, especialidad_medicos A2
	where A1.fecha_disponible >='$fecha' and A2.id = A1.especialidad_id and A2.id = '$especialidad'";


	$result=mysqli_query($conexion,$sql2);

	if(!$result){
		echo mysqli_error($conexion);
	}

	return $result;
}


?>