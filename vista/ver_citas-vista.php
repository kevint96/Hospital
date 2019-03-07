<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo hospital la candelaria:Ver Citas</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <link rel="stylesheet" href="../icon/style.css">
    <link rel="stylesheet" href="../css/stylecitas.css">
    <link rel="shortcut icon" href="../image/favicon.ico" />

    <!-- Se agregan estilos de boostrap -->

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/material-dashboard.css" rel="stylesheet"/>
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="header.js"></script>
    
</head>
<body>

 <header class="header">
    <?php require '../vista/encabezado.php';?>
</header>
<section class="contenido wrapper">
    <h3>Citas médicas registradas</h3>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
      <div class="form-row">
        <div class="col-xs-4 col-md-4">
            <i class="fa fa-user"></i>
            <input name="NombrePaciente" type="text" class="form-control" placeholder="Nombre paciente:">
        </div>
        <div class="col-xs-4 col-md-4">
            <i class="fa fa-user"></i>
            <input name="Apellido" type="text" class="form-control" placeholder="Apellido:">
        </div>
        <div class="col-xs-4 col-md-4">
            <i class="fa fa-envelope"></i>
            <input name="Email" type="text" class="form-control" placeholder="Email:">
        </div>
        <div class="col-xs-4 col-md-4">
            <i class="fa fa-venus-double"></i>
            <select name="Genero" id="Genero" class="form-control" placeholder="Genero">
                <option selected>Genero</option>
                <option value="H">Hombre</option>
                <option value="M">Mujer</option>
            </select>
        </div>
        <div class="col-xs-4 col-md-4">
            <i class="fa fa-check-circle-o"></i>
            <select name="Cita" id="tipoCita" class="form-control" placeholder="Tipo cita">
                <option selected>Tipo de cita</option>
                <option>Medicina general</option>
                <option>Especialista</option>
            </select>
        </div>
        <div class="col-xs-4 col-md-4">
            <i class="fa fa-hospital-o"></i>
            <select name="Departamento" id="departamento" class="form-control">
                <option selected>Departamento</option>
                <option>Ginecología</option>
                <option>Medicina interna</option>
                <option>Oftalmología</option>
                <option>Pediatria</option>
                <option>Urología</option>
                <option>Anestesiología</option>
                <option>Radiología</option>
                <option>Gastroenterología</option>
            </select>
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fa fa-calendar"></i>
            <label>Fecha</label>
            <input name="Fecha" type="date" class="form-control" placeholder="Fecha" >
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fa fa-clock-o"></i>
            <label>Hora</label>
            <input name="Hora" type="time" value="9:00" class="form-control" placeholder="Fecha" >
        </div>


        <div class="col-xs-4 col-md-4">
            <button class="btn btn-sucess btn-lg btn-block" name="Submit" type="submit">Continuar</button>
        </div>




    </div>
</form>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>



<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    require_once "../conexion/conexion.php";

    $db = new conexion();

    $db->conectar();



    $fecha = $_POST['Fecha'];

                // $fecha = '2019/02/02';

    $datos = $db->consultaPorFecha($fecha);

    $tamañoArreglo = count($datos);

            // echo $tamañoArreglo;  Se averiguaba el tamaño del arreglo

    if ($tamañoArreglo>0) {
                //Si hay datos
        echo "<p class='alert alert-warning'>CITAS DISPONIBLES</p>";
        ?>
        <div class="card">
            <div class="card-body" style="text-align:center;">
                <table style="text-align:center;"class="table table-bordered table-hover">
                    <thead style="text-align:center"> 
                        <th style="text-align:center">
                            <i class="fa fa-user"></i> Nombre Médico</th>
                            <th style="text-align:center"> 
                                <i class="fa fa-calendar"></i> Fecha</th>
                                <th style="text-align:center">
                                    <i class="fa fa-clock-o"></i> Hora</th>
                                    <th style="text-align:center">
                                        <i class="fa fa-phone"></i> Telefono</th>
                                        <th style="text-align:center">
                                            <i class="fa fa-hospital-o"></i> Especialidad</th>
                                            <th></th>
                                        </thead>
                <!-- echo "Si hay datos";
                $nombre= $datos[4];
                $apellido = $datos[5]; -->
                <?php
                foreach ($datos as $row){
                    ?>
                    <tr>
                        <td><?php echo $row["nombre"]; ?></td>
                        <td><?php echo $row["apellido"]; ?></td>
                        <td><?php echo $row["cuenta"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["fecha_nacimiento"]; ?></td>
                        <td style="width:100px;">
                            <a href="javascript: popup();" class="btn btn-sucess">Registrar</a>
                        </td>
                        <script language="javascript">
                            function popup() {
                                var reply=confirm("¿Seguro que desea registrar la cita médica?")
                                if (reply==true) 
                                {
                                    window.open ("principal.php", "Principal","location=0,status=0,scrollbars=0,width=499,height=380");

                                }
                                else
                                {

                                }
                            }
                        </script>
                    </tr>
                    <?php
                }

                ?>
            </table>
        </div>
    </div>
</section>
<?php



}else{
    echo "<p class='alert alert-danger'>No hay pacientes</p>";
}

}


?>
</body>
</html>


