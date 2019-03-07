 function registrar(nm,im,fc,hc,tm,e,np,ap,ip,ep,gp){
        alertify.confirm('Registrar cita', 'Esta seguro que desea registrar esta cita ?', 
            function(){ registrarCita(nm,im,fc,hc,tm,e,np,ap,ip,ep,gp) }
            , function(){ alertify.error('Se ha cancelado el registro')});
    }

    

function registrarCita(nm,im,fc,hc,tm,e,np,ap,ip,ep,gp)
{
	cadena="nombre_medico=" + nm + 
			"&id_medico=" + im +
			"&fecha_cita=" + fc +
			"&hora_cita=" + hc +
			"&telefono_medico=" + tm +
			"&especialidad_medico=" + e +
			"&nombre_paciente=" + np +
			"&apellido_paciente=" + ap +
			"&id_paciente=" + ip +
			"&email_paciente=" + ep +
			"&genero_paciente=" + gp ;

	$.ajax({
		type:"POST",
		url:"../controlador/agregar.php",
		data:cadena,
		success:function(r){
			if(r==1){
				alertify.success("Se registro su cita correctamente :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}