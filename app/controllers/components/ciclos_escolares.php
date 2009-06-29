<?php
class CiclosEscolaresComponent extends Object {

	var $controller = true;

	function startup(&$controller) {
		// This method takes a reference to the controller which is loading it.
		// Perform controller initialization here.
	}

	// acomoda los datos de una consulta tipo findAll de los ciclos escolares, a un vector
	// lista para mostrarlos en un campo select concatenando todos los campos
	function crearSelect($ciclos, $niveles) {
		if(!empty($ciclos) && !empty($niveles)) {
			foreach($ciclos as $ciclo) {
				foreach($niveles as $nivel) {
					if($nivel['NivelesEscolare']['id'] == $ciclo['CiclosEscolare']['niveles_escolares_id']) {
						$lista[$ciclo['CiclosEscolare']['id']] =
								$nivel['NivelesEscolare']['valor'] . ', ' .
								$ciclo['CiclosEscolare']['inicio'] . '-' .
								$ciclo['CiclosEscolare']['fin'];
					}
				}
			}

			return $lista;
		}
	}

	// acomoda los datos de una consulta tipo findAll de los municipios, para ser
	// mostrado como un simple print, pero respetando un formato de salida
	function mostrar($id, $ciclos, $niveles) {
		if(!empty($id) && !empty($ciclos) && !empty($niveles)) {
			$tmp = $this->crearSelect($ciclos, $niveles);
			$lugar = $tmp[$id];

			if(!empty($lugar)) {
				return $lugar;
			}
		}
	}
}
?>
