<?php
class AlumnosComponent extends Object {

	var $controller = true;

	function startup(&$controller) {
		// This method takes a reference to the controller which is loading it.
		// Perform controller initialization here.
	}

	// acomoda los datos de una consulta tipo findAll de los alumnos, a un vector
	// lista para mostrarlos en un campo select concatenando todos los campos
	function crearSelect($datos) {
		if(!empty($datos)) {
			foreach($datos as $tmp) {
				$lista[$tmp['Alumno']['id']] = $tmp['Alumno']['nombre'] . ' ' .
							       $tmp['Alumno']['apellido_paterno'] . ' ' .
							       $tmp['Alumno']['apellido_materno'];
			}

			return $lista;
		}
	}

}
?>
