<?php
class Calificacione extends AppModel {

	var $name = 'Calificacione';
	var $validate = array(
		'id' => VALID_NOT_EMPTY,
		'alumnos_grupos_id' => VALID_NOT_EMPTY,
		'maestros_materias_id' => VALID_NOT_EMPTY,
		'calificacion' => VALID_NOT_EMPTY,
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'AlumnosGrupo' =>
				array('className' => 'AlumnosGrupo',
						'foreignKey' => 'alumnos_grupos_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

			'MaestrosMateria' =>
				array('className' => 'MaestrosMateria',
						'foreignKey' => 'maestros_materias_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

	);

}
?>