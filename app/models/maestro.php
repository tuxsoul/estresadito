<?php
class Maestro extends AppModel {

	var $name = 'Maestro';
	var $validate = array(
		'id' => VALID_NOT_EMPTY,
		'nombre' => VALID_NOT_EMPTY,
		'apellido_paterno' => VALID_NOT_EMPTY,
		'apellido_materno' => VALID_NOT_EMPTY,
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
			'Materia' =>
				array('className' => 'Materia',
						'joinTable' => 'maestros_materias',
						'foreignKey' => 'maestros_id',
						'associationForeignKey' => 'materias_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'unique' => '',
						'finderQuery' => '',
						'deleteQuery' => '',
						'insertQuery' => ''
				),

	);

}
?>
