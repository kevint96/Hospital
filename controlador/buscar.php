<?php

session_start();

// if(isset($_SESSION['cuenta'])) {
//     header('location: index.php');
// }


if(isset($_POST['Departamento'])) {

    $json = array();

    require '../conexion/conexion2.php';

    $error ="";

    $nombre = htmlentities($_POST['NombrePaciente']);
    $apellido = htmlentities($_POST['Apellido']);
    $numero_documento = htmlentities($_POST['Numero_documento']);
    $email = htmlentities($_POST['Email']);
    $genero = htmlentities($_POST['Genero']);
    $cita = htmlentities($_POST['Cita']);
    $departamento = htmlentities($_POST['Departamento']);
    $fecha = htmlentities($_POST['Fecha']);

    $result = consultarDoctores($fecha,$departamento);

    $tamañoArreglo = mysqli_num_rows($result);

    //  $tamañoArreglo;
     // echo $tamañoArreglo;


    //  "<br> El tamaño esssss:" . $tamañoArreglo;

    if($tamañoArreglo >0)
    {
        $error .= "<p class='alert alert-warning'>CITAS DISPONIBLES</p>";
        $error .= "<div class='card'>";
        $error .= "<div class='card-body' style='text-align:center;'>";
        $error .= "<table style='text-align:center;'class='table table-bordered table-hover'>";
        $error .= "<thead style='text-align:center'> ";
        $error .= "<th style='text-align:center'>";
        $error .= "<i class='fa fa-user'></i> Nombre Médico</th>";
        $error .= "<th style='text-align:center'> ";
        $error .= "<i class='fa fa-calendar'></i> Fecha</th>";
        $error .= "<th style='text-align:center'>";
        $error .= "<i class='fa fa-clock-o'></i> Hora</th>";
        $error .= "<th style='text-align:center'>";
        $error .= "<i class='fa fa-phone'></i> Telefono</th>";
        $error .= "<th style='text-align:center'>";
        $error .= "<i class='fa fa-hospital-o'></i> Especialidad</th>";
        $error .= "<th></th>";
        $error .= "</thead>";
        while($ver=mysqli_fetch_row($result)){
            $nombreDoctor = $ver[0].' '.$ver[1];
            $nomooo =(int)$nombreDoctor;
            $error.="<tr>";
            $error.="<td>".$nombreDoctor."</td>";
            $error.="<td>".$ver[3]."</td>";
            $error.="<td>".$ver[4]."</td>";
            $error.="<td>".$ver[5]."</td>"; 
            $error.="<td>".$ver[6]."</td>"; 
            $error.="<td style='width:100px;''>";  
            // $error.='<button class="btn btn-sucess btn-lg btn-block" type="submit" 
            // onclick="registrar('.$nombreDoctor.')" value="'  .$nombreDoctor.  '">Tomar cita</button>';

            $error.= "<button class = \"btn btn-sucess btn-lg btn-block\" type = \"submit\" id = \"registrar\" onClick =\"registrar('".$nombreDoctor."','".$ver[2]."','".$ver[3]."','".$ver[4]."','".$ver[5]."','".$ver[6]."','".$nombre."','".$apellido."','".$numero_documento."','".$email."','".$genero."')\">Tomar cita</button>";


            // nm,im,fc,hc,tm,e,np,ap,ep,gp

            // registrar(".$nombreDoctor.",".$ver[2].",".$ver[3].",".$ver[4].",".$ver[5].",".$nombre.",".$apellido.",".$email.",".$genero.")'>Tomar cita</button>"; 
            $error.="</td>"; 
            $error.="</tr>";
        } 
        $error.="</table>";
        $error.="</div>";
        $error.="</div>";
        $error.="</section>";    
    }
    else
    {
        $error = "<p class='alert alert-danger'>NO HAY CITAS DISPONIBLES!</p>";
    }
    echo $error;
}



?>
