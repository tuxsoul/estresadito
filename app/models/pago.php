<?php
class Pago extends AppModel {

	var $name = 'Pago';
	var $validate = array(
		'id' => VALID_NOT_EMPTY,
		'alumnos_id' => VALID_NOT_EMPTY,
		'costos_id' => VALID_NOT_EMPTY,
		'fecha' => VALID_NOT_EMPTY,
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Alumno' =>
				array('className' => 'Alumno',
						'foreignKey' => 'alumnos_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

			'Costo' =>
				array('className' => 'Costo',
						'foreignKey' => 'costos_id',
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'counterCache' => ''
				),

	);

}
?>