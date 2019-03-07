<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <link rel="shortcut icon" href="image/favicon.ico" />

    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Nuevo hospital la candelaria:Login</title> 
    <link rel="shortcut icon" href="../image/favicon.ico" />
    <link rel="stylesheet" href="../icon/style.css">
    <link rel="stylesheet" href="../css/stylecitas.css">
    <link href="../css/wickedpicker.css" rel="stylesheet" type="text/css" media="all">

    <!-- Se agregan estilos de boostrap -->

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/material-dashboard.css" rel="stylesheet"/>
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>

    <div class="container-form">
        <?php require '../vista/menu.php';?>
        
        <form action="#" method="post" name="iniciar_sesion" id="iniciar_sesion" class="form">
            <div class="welcome-form"><h1>Inicie sesión y pida su cita médica</h1></div>
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre Usuario" name="usuario">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Contraseña" name="clave">
            </div>
            
               <div id="resultados_ajax" class="gaps">

            </div>

            <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

            <script>
                $( "#iniciar_sesion" ).submit(function( event ) {
                  var parametros = $(this).serialize();
                  $.ajax({
                    method: "POST",
                    url: "../controlador/iniciar_sesion.php",
                    data: parametros,
                    dataType: 'json',
                    // dataType: "json",
                    beforeSend: function(objeto){
                        $("#resultados_ajax").html("Iniciando sesión...");
                    },
                    success: function(datos){
                        // $("#resultados_ajax").html(datos);
                        if(datos.success == true)
                        {
                            $("#resultados_ajax").html(datos.message);
                            // $("#resultados_ajax").html("entrooooo");
                            window.location="../sesion/principal.php";
                        }
                        else
                        {
                            $("#resultados_ajax").html(datos.message);
                            // $("#resultados_ajax").html("datos incorrectos");
                        }
                    }
                });

                  event.preventDefault();
              });
          </script>
            
            <button type="submit">Entrar<label class="lnr"></label></button>
            <a href="../sesion/register.php"><div class="welcome-form"><h2>Si aún no se ha registrado, click aqui!</h2></div></a>
        </form>
    </div>
</body>
</html>