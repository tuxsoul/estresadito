<?php
class Materia extends AppModel {

	var $name = 'Materia';
	var $validate = array(
		'id' => VALID_NOT_EMPTY,
		'nombre' => VALID_NOT_EMPTY,
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
			'Maestro' =>
				array('className' => 'Maestro',
						'joinTable' => 'maestros_materias',
						'foreignKey' => 'materium_id',
						'associationForeignKey' => 'maestro_id',
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