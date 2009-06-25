<?php
class EstadosCivilesController extends AppController {

	var $name = 'EstadosCiviles';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->EstadosCivile->recursive = 0;
		$this->set('estadosCiviles', $this->EstadosCivile->findAll());
	}

	function add() {
		if (empty($this->data)) {
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->EstadosCivile->save($this->data)) {
				$this->Session->setFlash('The Estados Civile has been saved');
				$this->redirect('/estados_civiles/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Estados Civile');
				$this->redirect('/estados_civiles/index');
			}
			$this->data = $this->EstadosCivile->read(null, $id);
		} else {
			$this->cleanUpFields();
			if ($this->EstadosCivile->save($this->data)) {
				$this->Session->setFlash('The EstadosCivile has been saved');
				$this->redirect('/estados_civiles/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Estados Civile');
			$this->redirect('/estados_civiles/index');
		}
		if ($this->EstadosCivile->del($id)) {
			$this->Session->setFlash('The Estados Civile deleted: id '.$id.'');
			$this->redirect('/estados_civiles/index');
		}
	}

}
?>
