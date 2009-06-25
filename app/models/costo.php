<?php
class Costo extends AppModel {

	var $name = 'Costo';
	var $validate = array(
		'id' => VALID_NOT_EMPTY,
		'niveles_escolares_id' => VALID_NOT_EMPTY,
		'concepto' => VALID_NOT_EMPTY,
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

	);

	var $hasMany = array(
			'Pago' =>
				array('className' => 'Pago',
						'foreignKey' => 'costos_id',
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