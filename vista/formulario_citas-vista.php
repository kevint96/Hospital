<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Nuevo hospital la candelaria:Citas</title>  
    <link rel="shortcut icon" href="../image/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
    <!-- Esto le da el diseño a los mensajes de alerta -->
    <link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">

    <script src="../js/funcion.js"></script>
    <script src="../librerias/alertifyjs/alertify.js"></script>
    <!-- Esta es la libreria que contiene las alertas -->
</head>
<body>

   <header class="header">
    <?php require '../vista/encabezado.php';?>
</header>
<section class="contenido wrapper">
    <h3>Formulario de citas médicas</h3>
    <p class='alert alert-warning'>FORMULARIO DE CITAS MÉDICAS</p>;

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <form action="#" method="post" id="funcione" class="form">
      <div class="form-row">
        <div class="col-xs-4 col-md-4">
            <i class="fa fa-user"></i>
            <label>Nombre:</label>
            <input name="NombrePaciente"
            <?php
            require_once "../conexion/conexion.php";
            $conexion = new conexion();
            $conexion->conectar();
            $datos = $conexion->consulta();
            $nombreCompleto = strtoupper($datos[4]);
            ?>
            value="<?php echo $nombreCompleto;?>"

            type="text" class="form-control">
        </div>
        <div class="col-xs-4 col-md-4">
            <i class="fa fa-user"></i>
            <label>Apellido:</label>
            <input name="Apellido"
            <?php
            $apellidoCompleto = strtoupper($datos[5]);
            ?>
            value="<?php echo $apellidoCompleto;?>"
            type="text" class="form-control">
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fa fa-user"></i>
            <label>Numero documento:</label>
            <input name="Numero_documento"
            <?php
            echo "value=".$datos[7]."";
            ?>
            type="text" class="form-control">
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fa fa-envelope"></i>
            <label>Email:</label>
            <input name="Email" 
            <?php
            echo "value=".strtoupper($datos[0])."";
            ?>
            type="text" class="form-control">
        </div>
        <div class="col-xs-4 col-md-4">
            <i class="fa fa-venus-double"></i>
            <label>Genero:</label>
            <select name="Genero" class="form-control">
                <option value="H"

                >HOMBRE</option>
                <option value="M"


                >MUJER</option>
            </select>
        </div>
        <div class="col-xs-4 col-md-4">
            <i class="fa fa-check-circle-o"></i>
            <label>Tipo de cita:</label>
            <select name="Cita" class="form-control" placeholder="Tipo cita">
                <option value="Medicina general">Medicina general</option>
                <option value="Especialista">Especialista</option>
            </select>
        </div>
        <div class="col-xs-4 col-md-4">
            <i class="fa fa-hospital-o"></i>
            <label>Departamento:</label>
            <select name="Departamento" class="form-control">
                <option value="1"

                >GINECOLOGIA</option>
                <option value="2"

                >MEDICINA INTERNA</option>
                <option value="3"

                >OFTALMOLOGIA</option>
                <option value="4"



                >PEDIATRIA</option>
                <option value="5"

                >CIRUGIA GENERAL</option>
                <option value="6"



                >UROLOGIA</option>
                <option value="7"


                >ANESTESIOLOGIA</option>
                <option value="8"


                >RADIOLOGIA</option>
                <option value="9"


                >GASTROENTEROLOGIA</option>
            </select>
        </div>

        <div class="col-xs-4 col-md-4">
            <i class="fa fa-calendar"></i>
            <label>Fecha</label>
            <input name="Fecha" 

            type="date" class="form-control">
        </div>


        <div class="col-xs-4 col-md-4">
            <button class="btn btn-sucess btn-lg btn-block" id="cita" name="Submit" type="submit">Buscar citas..</button>
        </div>




    </div>
</form>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</div>

<div id="resultados_ajax" class="gaps">
</div>

<div id="registrarCita"></div>

<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

<script>
    $( "#funcione" ).submit(function( event ) {
      var parametros = $(this).serialize();
      $.ajax({
        method: "POST",
        url: "../controlador/buscar.php",
        data: parametros,
        beforeSend: function(objeto){
            $("#resultados_ajax").html("Buscando citass...");
        },
        success: function(datos){

            $("#resultados_ajax").html(datos);
            document.getElementById("registrar").focus();
            document.getElementById("focus").focus();
        }
    });

      event.preventDefault();
  });
</script>

<script type="text/javascript">

   function regis(){
    alertify.confirm('Registrar cita', '¿Esta seguro que desea registrar esta cita?');
}

</script>

<!-- <div class="copy w3ls" style="text-align: center" id="focus">
      <p>© 2019. Nuevo Hospital La candelaria . All Rights Reserved |
        Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a>
      </p>
  </div> -->
</body>
</html>


