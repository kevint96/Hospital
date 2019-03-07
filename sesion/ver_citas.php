
<?php session_start();


    if(isset($_SESSION['cuenta'])){
        require 'inactividad.php';
        require '../vista/ver_citas-vista.php';

    }else{
        header ('location: ../sesion/login.php');
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $NombrePaciente = $_POST['NombrePaciente'];
    $Apellido = $_POST['Apellido'];
    $Email = $_POST['Email'];
    $Genero = $_POST['Genero'];

    $Cita= $_POST['Cita'];
    $Departamento = $_POST['Departamento'];
    $Fecha = $_POST['Fecha'];
    $Hora = $_POST['Hora'];


        //$clave = hash('sha512', $clave);
        //$clave2 = hash('sha512', $clave2);

    $error = '';

    function comprobar_email($email){ 
        $mail_correcto = 0; 
    //compruebo unas cosas primeras 
        if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){ 
            if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) { 
            //miro si tiene caracter . 
                if (substr_count($email,".")>= 1){ 
                //obtengo la terminacion del dominio 
                    $term_dom = substr(strrchr ($email, '.'),1); 
                //compruebo que la terminación del dominio sea correcta 
                    if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){ 
                //compruebo que lo de antes del dominio sea correcto 
                        $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1); 
                        $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1); 
                        if ($caracter_ult != "@" && $caracter_ult != "."){ 
                            $mail_correcto = 1; 
                        } 
                    } 
                } 
            } 
        } 
        if ($mail_correcto) 
            return 1; 
        else 
            return 0; 
    }

    if (comprobar_email($email)!=1) {
        $error .= '<i>El correo es incorrecto, reviselo <br></i>';
    }

    if (empty($email) or empty($cuenta) or empty($password) or empty($clave2)){

        $error .= '<i>Favor de rellenar todos los campos</i>';
    }else{
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=hospitalcandelaria', 'root', '');
        }catch(PDOException $prueba_error){
            echo "Error: " . $prueba_error->getMessage();
        }

        $statement = $conexion->prepare('SELECT * FROM pacientes WHERE cuenta = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $cuenta));
        $resultado = $statement->fetch();


        $statement2 = $conexion->prepare('SELECT * FROM pacientes WHERE email = :email LIMIT 1');
        $statement2->execute(array(':email' => $email));
        $resultado2 = $statement2->fetch();


        $statement3 = $conexion->prepare('SELECT * FROM pacientes WHERE numero_documento = :numero_documento LIMIT 1');
        $statement3->execute(array(':numero_documento' => $numero_documento));
        $resultado3 = $statement3->fetch();

        if ($resultado != false){
            $error .= '<i>Este usuario ya existe <br></i>';
        }

        if ($resultado2 != false){
            $error .= '<i>El correo que ha ingresado ya tiene asignada una cuenta <br> Revise su correo! <br> </i>';
        }

        if ($resultado3 != false){
            $error .= '<i>El número de documento que ha ingresado ya tiene asignada una cuenta! <br> </i>';
        }

        if ($password != $clave2){
            $error .= '<i> Las contraseñas no coinciden <br> </i>';
        }


    }

    if ($error == ''){
        $statement = $conexion->prepare('INSERT INTO pacientes (email, cuenta, password, fecha_creacion_cuenta, nombre, apellido, tipo_documento, numero_documento, fecha_nacimiento, direccion) VALUES ( :correo, :usuario, :clave, NOW(), :nombre, :apellido, :tipo_documento, :numero_documento, :fechaNacimiento, :direccion)');
        $statement->execute(array(

            ':correo' => $email,
            ':usuario' => $cuenta,
            ':clave' => $password,
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':tipo_documento' => $tipo_documento,
            ':numero_documento' => $numero_documento,
            ':fechaNacimiento' => $fechaNacimiento,
            ':direccion' => $direccion

        ));

            $template = "email_template.html";//


            /*SIGUE RECOLECTANDO DATOS PARA FUNCION MAIL*/
            $message = file_get_contents($template);

            

            $message = str_replace('{{first_name}}', $nombre, $message);
            $message = str_replace('{{cuenta}}', $cuenta, $message);
            $message = str_replace('{{customer_email}}', $email, $message);
            $message = str_replace('{{password}}', $password, $message);
            
            

            $header = "CUENTA CREADA EN EL PORTAL DEL NUEVO HOSPITAL LA CANDELARIA E.S.E.";


            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'kjtj38@gmail.com';                 // SMTP username
                $mail->Password = 'torresjimenez24';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;


                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );     

                $mail->setFrom('kjtj38@gmail.com', 'Nuevo hospital la candelaria');
                $mail->addAddress($email, $nombre);

                $mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML

                $mail->msgHTML($message);
                $mail->Subject = $header;
                //$mail->Body    = $message;
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                $error .= '<i style="color: green; text-align:center;">Usuario registrado exitosamente <br> Revise su correo!</i>';
            } catch (Exception $e) {
                $error .= '<i style="color: red; text-align:center;">Hubo un error al crear el usuario!</i>'; $mail->ErrorInfo;
            }





        }
    }
        
?>