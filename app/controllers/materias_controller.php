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
			$this->set('maestros', $this->Materia->Maestro->generateList());
			$this->set('selectedMaestros', null);
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Materia->save($this->data)) {
				$this->Session->setFlash('The Materium has been saved');
				$this->redirect('/materias/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('maestros', $this->Materia->Maestro->generateList());
				if (empty($this->data['Maestro']['Maestro'])) { $this->data['Maestro']['Maestro'] = null; }
				$this->set('selectedMaestros', $this->data['Maestro']['Maestro']);
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
			$this->set('maestros', $this->Materia->Maestro->generateList());
			if (empty($this->data['Maestro'])) { $this->data['Maestro'] = null; }
			$this->set('selectedMaestros', $this->_selectedArray($this->data['Maestro']));
		} else {
			$this->cleanUpFields();
			if ($this->Materia->save($this->data)) {
				$this->Session->setFlash('The Materia has been saved');
				$this->redirect('/materias/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('maestros', $this->Materia->Maestro->generateList());
				if (empty($this->data['Maestro']['Maestro'])) { $this->data['Maestro']['Maestro'] = null; }
				$this->set('selectedMaestros', $this->data['Maestro']['Maestro']);
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