<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Nuevo hospital la candelaria:Registro</title>
    <link rel="shortcut icon" href="../image/favicon.ico" />  
    <link rel="stylesheet" href="../icon/style.css">
    <link rel="stylesheet" href="../css/stylecitas.css">
    <link href="../css/wickedpicker.css" rel="stylesheet" type="text/css" media="all">

    <!-- Se agregan estilos de boostrap -->

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/material-dashboard.css" rel="stylesheet"/>
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="header.js"></script>
</head>
<body>

    <div class="container-form">
        <?php require '../vista/menu.php';
        ?>

        <form action="#" method="post" name="registrar" id="registrar" class="form">
            <div class="welcome-form"><h1>Registrese para iniciar sesión</h1></div>
            
            <div class="user line-input">
                <label class="lnr lnr-users"></label>
                <input type="text" placeholder="Nombre" name="nombre">
            </div>
            <div class="user line-input">
                <label class="lnr lnr-users"></label>
                <input type="text" placeholder="Apellido" name="apellido">
            </div>
            <div class="user line-input">
                <label class="lnr lnr-license"></label>
                <select name="tipo_documento" class="input">
                    <option value="">Tipo identificación</option>
                    <option value="CC">Cedula de ciudadania</option>
                    <option value="CD">Carnet diplomatico</option>
                    <option value="CN">Certificado nacido vivo</option>
                    <option value="CE">Cedula de extranjeria</option>
                    <option value="N">Nit</option>
                    <option value="P">Pasaporte</option>
                    <option value="PE">Permiso especial de permanencia</option>
                    <option value="RC">Registro civil</option>
                    <option value="SC">Salvoconducto</option>
                    <option value="TI">Tarjeta de identidad</option>
                </select>

            </div>
            <div class="user line-input">
                <label class="lnr lnr-briefcase"></label>
                <input type="text" placeholder="Número identificación" name="numero_documento">
            </div>
            <div class="user line-input">
                <label class="lnr lnr-pushpin"></label>
                <input type="date" placeholder="Fecha nacimiento" value="Fecha de nacimiento" name="fechaNacimiento">
            </div>
            <div class="user line-input">
                <label class="lnr lnr-home"></label>
                <input type="text" placeholder="Dirección" name="direccion">
            </div>
            <div class="user line-input">
                <label class="lnr lnr-envelope"></label>
                <input type="text" placeholder="Correo" name="email">
            </div>
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre Usuario" name="cuenta">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Contraseña" name="password">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Confirmar contraseña" name="clave2">
            </div>

            <div id="resultados_ajax" class="gaps">

            </div>

            <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

            <script>
                $( "#registrar" ).submit(function( event ) {
                  var parametros = $(this).serialize();
                  $.ajax({
                    type: "POST",
                    url: "../controlador/registrar.php",
                    data: parametros,
                    beforeSend: function(objeto){
                        $("#resultados_ajax").html("Registrando usuario...");
                    },
                    success: function(datos){
                        $("#resultados_ajax").html(datos);
                    }
                });

                  event.preventDefault();
              });
          </script>

          <button type="submit">Registrarse<label class=""></label></button>
          <a href="../sesion/login.php"><div class="welcome-form"><h2>¿Ya tienes una cuenta?, Inicia sesión aquí!</h2></div></a>

      </form>
  </div>
</body>
</html>
