<?php
class MunicipiosEstado extends AppModel {

	var $name = 'MunicipiosEstado';
	var $validate = array(
		'id' => VALID_NOT_EMPTY,
		'municipio' => VALID_NOT_EMPTY,
		'estado' => VALID_NOT_EMPTY,
		'codigo_postal' => VALID_NOT_EMPTY,
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Alumno' =>
				array('className' => 'Alumno',
						'foreignKey' => 'municipios_estados_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'dependent' => '',
						'exclusive' => '',
						'finderQuery' => '',
						'counterQuery' => ''
				),

	);

}
?>