<?php
class AlumnosGrupo extends AppModel {

	var $name = 'AlumnosGrupo';
	var $validate = array(
		'id' => VALID_NOT_EMPTY,
		'grupos_id' => VALID_NOT_EMPTY,
		'alumnos_id' => VALID_NOT_EMPTY,
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Grupo' =>
				array('className' => 'Grupo',
						'foreignKey' => 'grupos_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

			'Alumno' =>
				array('className' => 'Alumno',
						'foreignKey' => 'alumnos_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

	);

	var $hasMany = array(
			'Calificacione' =>
				array('className' => 'Calificacione',
						'foreignKey' => 'alumnos_grupos_id',
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