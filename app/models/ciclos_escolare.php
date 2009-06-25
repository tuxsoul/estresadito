<?php
class CiclosEscolare extends AppModel {

	var $name = 'CiclosEscolare';
	var $validate = array(
		'id' => VALID_NOT_EMPTY,
		'niveles_escolares_id' => VALID_NOT_EMPTY,
		'inicio' => VALID_NOT_EMPTY,
		'fin' => VALID_NOT_EMPTY,
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
			'Grupo' =>
				array('className' => 'Grupo',
						'foreignKey' => 'ciclos_escolares_id',
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

			'MaestrosMateria' =>
				array('className' => 'MaestrosMateria',
						'foreignKey' => 'ciclos_escolares_id',
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