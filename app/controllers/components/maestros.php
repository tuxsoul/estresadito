<?php
class MaestrosComponent extends Object {

	var $controller = true;

	function startup(&$controller) {
		// This method takes a reference to the controller which is loading it.
		// Perform controller initialization here.
	}

	// acomoda los datos de una consulta tipo findAll de los maestros, a un vector
	// lista para mostrarlos en un campo select concatenando todos los campos
	function crearSelect($datos) {
		if(!empty($datos)) {
			foreach($datos as $tmp) {
				$lista[$tmp['Maestro']['id']] = $tmp['Maestro']['nombre'] . ' ' .
								$tmp['Maestro']['apellido_paterno'] . ' ' .
								$tmp['Maestro']['apellido_materno'];
			}

			return $lista;
		}
	}

}
?>
