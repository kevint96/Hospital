<?php

class conexion{

   protected $conexion;

   public function conectar(){
    try{
       $this->conexion = new PDO('mysql:host=localhost;dbname=hospitalcandelaria', 'root', '');
   }catch(PDOException $prueba_error){
    echo "Error: " . $prueba_error->getMessage();
}

}



public function consulta(){

	$nombre = $_SESSION['cuenta'];

	$statement = $this->conexion->prepare('SELECT * FROM pacientes WHERE cuenta = :cuenta');  //La letra 'ñ' presenta problemas.);

	$statement->execute(array(
        ':cuenta' => $nombre
    ));

	$resultado = $statement->fetch();

	return $resultado;
}

public function consultaUsuario($usuario,$clave){

    $nombre = $_SESSION['cuenta'];

     $statement = $this->conexion->prepare('SELECT * FROM pacientes WHERE cuenta = :cuenta AND password = :password'  //La letra 'ñ' presenta problemas.
 );

     $statement->execute(array(
        ':cuenta' => $usuario,
        ':password' => $clave
    ));

     $resultado = $statement->fetch();

     return $resultado;
 }


 public function consultaPorFecha($fecha,$especialidad){

    $nombre = $_SESSION['cuenta'];

    $statement = $this->conexion->prepare('SELECT * FROM medicos WHERE fecha_disponible = :fecha and especialidad =:especialidad or especialidad =:especialidad and hora_disponible =:hora');  //La letra 'ñ' presenta problemas.);

    $statement->execute(array(
        ':fecha' => $fecha,
        ':especialidad' => $especialidad,
        ':hora' => $hora
    ));

    $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $resultado;
}


}
?>