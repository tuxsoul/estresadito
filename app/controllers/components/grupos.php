<?php
class GruposComponent extends Object {

	var $controller = true;

	function startup(&$controller) {
		// This method takes a reference to the controller which is loading it.
		// Perform controller initialization here.
	}

	// acomoda los datos de una consulta tipo findAll de los grupos, a un vector
	// lista para mostrarlos en un campo select concatenando todos los campos
	function crearSelect($niveles, $ciclos, $grupos, $alumnosGrupos) {
		if(!empty($niveles) && !empty($ciclos) && !empty($grupos) && !empty($alumnosGrupos)) {
			foreach($alumnosGrupos as $alumnosGrupo) {
				foreach($grupos as $grupo) {
					if($alumnosGrupo['AlumnosGrupo']['grupos_id'] == $grupo['Grupo']['id']) {
						foreach($ciclos as $ciclo) {
							if($ciclo['CiclosEscolare']['id'] == $grupo['Grupo']['ciclos_escolares_id']) {
								foreach($niveles as $nivel) {
									if($nivel['NivelesEscolare']['id'] == $ciclo['CiclosEscolare']['niveles_escolares_id']) {
										$lista[$alumnosGrupo['AlumnosGrupo']['id']] = $nivel['NivelesEscolare']['valor'] . ', ' . $ciclo['CiclosEscolare']['inicio'] . ' - ' . $ciclo['CiclosEscolare']['fin'] . ', ' . $grupo['Grupo']['grado'] . ' - ' . $grupo['Grupo']['grupo'];
									}
								}
							}
						}
					}
				}
			}

			return $lista;
		}
	}

}
?>
