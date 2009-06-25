<?php
class EstadosCivile extends AppModel {

	var $name = 'EstadosCivile';
	var $validate = array(
		'id' => VALID_NOT_EMPTY,
		'valor' => VALID_NOT_EMPTY,
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Alumno' =>
				array('className' => 'Alumno',
						'foreignKey' => 'estados_civiles_id',
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