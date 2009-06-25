<?php
class MaestrosMateria extends AppModel {

	var $name = 'MaestrosMateria';
	var $validate = array(
		'id' => VALID_NOT_EMPTY,
		'maestros_id' => VALID_NOT_EMPTY,
		'materias_id' => VALID_NOT_EMPTY,
		'ciclos_escolares_id' => VALID_NOT_EMPTY,
		'grado' => VALID_NOT_EMPTY,
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Maestro' =>
				array('className' => 'Maestro',
						'foreignKey' => 'maestros_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

			'Materia' =>
				array('className' => 'Materia',
						'foreignKey' => 'materias_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

			'CiclosEscolare' =>
				array('className' => 'CiclosEscolare',
						'foreignKey' => 'ciclos_escolares_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

	);

	var $hasMany = array(
			'Calificacione' =>
				array('className' => 'Calificacione',
						'foreignKey' => 'maestros_materias_id',
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