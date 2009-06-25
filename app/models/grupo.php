<?php
class Grupo extends AppModel {

	var $name = 'Grupo';
	var $validate = array(
		'id' => VALID_NOT_EMPTY,
		'ciclos_escolares_id' => VALID_NOT_EMPTY,
		'grado' => VALID_NOT_EMPTY,
		'grupo' => VALID_NOT_EMPTY,
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'CiclosEscolare' =>
				array('className' => 'CiclosEscolare',
						'foreignKey' => 'ciclos_escolares_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

	);

	var $hasAndBelongsToMany = array(
			'Alumno' =>
				array('className' => 'Alumno',
						'joinTable' => 'alumnos_grupos',
						'foreignKey' => 'grupo_id',
						'associationForeignKey' => 'alumno_id',
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