<?php
class MateriasController extends AppController {

	var $name = 'Materias';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->Materia->recursive = 0;
		$this->set('materias', $this->Materia->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Materium.');
			$this->redirect('/materias/index');
		}
		$this->set('materium', $this->Materia->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Materia->save($this->data)) {
				$this->Session->setFlash('The Materium has been saved');
				$this->redirect('/materias/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Materium');
				$this->redirect('/materias/index');
			}
			$this->data = $this->Materia->read(null, $id);
		} else {
			$this->cleanUpFields();
			if ($this->Materia->save($this->data)) {
				$this->Session->setFlash('The Materia has been saved');
				$this->redirect('/materias/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Materium');
			$this->redirect('/materias/index');
		}
		if ($this->Materia->del($id)) {
			$this->Session->setFlash('The Materium deleted: id '.$id.'');
			$this->redirect('/materias/index');
		}
	}

}
?>
