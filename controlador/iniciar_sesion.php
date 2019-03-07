<?php session_start();

// echo "Esta en el login";

$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $usuario = htmlentities($_POST['usuario']);
    $clave = htmlentities($_POST['clave']);
        //$clave = hash('sha512', $clave);

    if (empty($usuario) or empty($clave)){

        $error .='<i style="color: red; text-align:center;">Escriba su correo y contraseña <br></i>';
        // echo $error;
        $json['success'] = false;
        $json['message'] = $error;
        $json['data'] = null;
        echo json_encode($json);
    }
    else{
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=hospitalcandelaria', 'root', '');
        }catch(PDOException $prueba_error){
            echo "Error: " . $prueba_error->getMessage();
        }
        
        $statement = $conexion->prepare('
        SELECT * FROM pacientes WHERE cuenta = :cuenta AND password = :password'  //La letra 'ñ' presenta problemas.
    );
        
        $statement->execute(array(
            ':cuenta' => $usuario,
            ':password' => $clave
        ));

        $resultado = $statement->fetch();
        
        if ($resultado !== false){
            $_SESSION['cuenta'] = $usuario;  //Esto es lo que se muestra en las paginas, lo que se guarda 
             $error .='<i style="color: green; text-align:center;">Ingresando al portal... <br></i>';
            $json['success'] = true;
            $json['message'] = $error;
            $json['data'] = null;
            // header('location: principal.php');
        }else{
            // $error .= '<i>Este usuario no existe o contraseña incorrecta</i>';
            $error .='<i style="color: red; text-align:center;">Este usuario no existe o contraseña incorrecta <br></i>';
            $json['success'] = false;
            $json['message'] = $error;
            $json['data'] = null;
        }
        echo json_encode($json);
    }
}

?>