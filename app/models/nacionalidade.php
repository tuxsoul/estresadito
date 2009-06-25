<?php
class Nacionalidade extends AppModel {

	var $name = 'Nacionalidade';
	var $validate = array(
		'id' => VALID_NOT_EMPTY,
		'valor' => VALID_NOT_EMPTY,
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Alumno' =>
				array('className' => 'Alumno',
						'foreignKey' => 'nacionalidades_id',
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