<?php
class MaestrosController extends AppController {

	var $name = 'Maestros';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->Maestro->recursive = 0;
		$this->set('maestros', $this->Maestro->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Maestro.');
			$this->redirect('/maestros/index');
		}
		$this->set('maestro', $this->Maestro->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Maestro->save($this->data)) {
				$this->Session->setFlash('The Maestro has been saved');
				$this->redirect('/maestros/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Maestro');
				$this->redirect('/maestros/index');
			}
			$this->data = $this->Maestro->read(null, $id);
		} else {
			$this->cleanUpFields();
			if ($this->Maestro->save($this->data)) {
				$this->Session->setFlash('The Maestro has been saved');
				$this->redirect('/maestros/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Maestro');
			$this->redirect('/maestros/index');
		}
		if ($this->Maestro->del($id)) {
			$this->Session->setFlash('The Maestro deleted: id '.$id.'');
			$this->redirect('/maestros/index');
		}
	}

}
?>
