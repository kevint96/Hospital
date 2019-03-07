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



 <header class="header">
        <img src="../image/logo.jpg" alt="Hospital la candelaria">
        <div class="wrapper">
            <?php
            require_once "../conexion/conexion.php";

            $db = new conexion();

            $db->conectar();

            $datos = $db->consulta();

        //echo $datos[0];

            $nombre= $datos[4];
            $apellido = $datos[5];
            // $numero_documento = $datos[7];

            $Nombrecompleto = strtoupper($nombre . ' '. $apellido);

            $cuenta = $_SESSION['cuenta'];
            

            // $numero_documento = $_SESSION['documento'];


            $error = '<div class="logo">'. ' 

            <div class="user line-input">

            <label class="lnr lnr-user"></label>

            </div>

            '. $Nombrecompleto. ' '  .'</div>';
            echo $error;
            ?>


            <nav>
                <a href="../sesion/principal.php">Inicio</a>
                <a href="../sesion/formulario_citas.php">Citas</a>
                <a href="../sesion/ver_citas.php">Ver citas</a>
                <a id="salir" href="../sesion/cerrar.php">Cerrar sesión</a>
            </nav>

            

        </div>
    </header>