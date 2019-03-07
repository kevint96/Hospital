<?php 

	require_once "../conexion/conexion2.php";

	$conexion=conexion();
	$ip=$_POST['id_paciente'];
	$np=$_POST['nombre_paciente'];
	$ap=$_POST['apellido_paciente'];
	$ep=$_POST['email_paciente'];
	$gp=$_POST['genero_paciente'];
	$im=$_POST['id_medico'];
	$nm=$_POST['nombre_medico'];
	$em=$_POST['especialidad_medico'];
	$cm=$_POST['telefono_medico'];
	$fc=$_POST['fecha_cita'];
	$hc=$_POST['hora_cita'];
	$ec=0;



	$sql="INSERT into citas (id_cita,id_paciente,nombre_paciente,apellido_paciente,email_paciente,genero_paciente,id_medico,nombre_medico,especialidad_medico,celular_medico,fecha_creacion_cita,fecha_cita,hora_cita,estado_cita) values ('','$ip','$np','$ap','$ep','$gp','$im','$nm','$em','$cm',NOW(),'$fc','$hc','$ec')";

	echo $result=mysqli_query($conexion,$sql);

	
 //    $result=mysqli_query($conexion,$sql);

 //    if(!$result){
	// 	echo mysqli_error($conexion);
	// }


	// id_cita
	// id_paciente
	// nombre_paciente
	// apellido_paciente
	// email_paciente
	// genero_paciente
	// id_medico
	// nombre_medico
	// especialidad_medico
	// celular_medico
	// fecha_creacion_cita
	// fecha_cita
	// hora_cita
	// estado_cita

 ?>