<?php

define( 'MAX_SESSION_TIEMPO', 1000 * 1 );

// Controla cuando se ha creado y cuando tiempo ha recorrido 
	if ( isset( $_SESSION[ 'ULTIMA_ACTIVIDAD' ] ) && 
		( time() - $_SESSION[ 'ULTIMA_ACTIVIDAD' ] > MAX_SESSION_TIEMPO ) ) {

			$tiempo = $_SESSION[ 'ULTIMA_ACTIVIDAD' ];
			$mensaje = "alert('Se cerrara su sesión por inactividad... el tiempo es'".$tiempo.")";

			header('location: cerrar.php');
}

?>