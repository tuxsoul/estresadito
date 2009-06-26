<?php
class Alumno extends AppModel {

	var $name = 'Alumno';
	var $validate = array(
		'id' => VALID_NOT_EMPTY,
		'niveles_escolares_id' => VALID_NOT_EMPTY,
		'generos_id' => VALID_NOT_EMPTY,
		'statuses_id' => VALID_NOT_EMPTY,
		'nombre' => VALID_NOT_EMPTY,
		'apellido_materno' => VALID_NOT_EMPTY,
		'apellido_paterno' => VALID_NOT_EMPTY,
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'NivelesEscolare' =>
				array('className' => 'NivelesEscolare',
						'foreignKey' => 'niveles_escolares_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

			'Genero' =>
				array('className' => 'Genero',
						'foreignKey' => 'generos_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

			'EstadosCivile' =>
				array('className' => 'EstadosCivile',
						'foreignKey' => 'estados_civiles_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

			'Nacionalidade' =>
				array('className' => 'Nacionalidade',
						'foreignKey' => 'nacionalidades_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

			'MunicipiosEstado' =>
				array('className' => 'MunicipiosEstado',
						'foreignKey' => 'municipios_estados_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

			'Status' =>
				array('className' => 'Status',
						'foreignKey' => 'statuses_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

	);

	var $hasMany = array(
			'Pago' =>
				array('className' => 'Pago',
						'foreignKey' => 'alumnos_id',
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

	var $hasAndBelongsToMany = array(
			'Grupo' =>
				array('className' => 'Grupo',
						'joinTable' => 'alumnos_grupos',
						'foreignKey' => 'alumnos_id',
						'associationForeignKey' => 'grupos_id',
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
