<?php
class NivelesEscolare extends AppModel {

	var $name = 'NivelesEscolare';
	var $validate = array(
		'id' => VALID_NOT_EMPTY,
		'valor' => VALID_NOT_EMPTY,
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'CiclosEscolare' =>
				array('className' => 'CiclosEscolare',
						'foreignKey' => 'niveles_escolares_id',
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

			'Alumno' =>
				array('className' => 'Alumno',
						'foreignKey' => 'niveles_escolares_id',
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

			'Costo' =>
				array('className' => 'Costo',
						'foreignKey' => 'niveles_escolares_id',
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