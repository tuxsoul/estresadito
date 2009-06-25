<?php
class GruposController extends AppController {

	var $name = 'Grupos';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->Grupo->recursive = 0;
		$this->set('grupos', $this->Grupo->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Grupo.');
			$this->redirect('/grupos/index');
		}
		$this->set('grupo', $this->Grupo->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->set('alumnos', $this->Grupo->Alumno->generateList());
			$this->set('selectedAlumnos', null);
			$this->set('ciclosEscolares', $this->Grupo->CiclosEscolare->generateList());
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Grupo->save($this->data)) {
				$this->Session->setFlash('The Grupo has been saved');
				$this->redirect('/grupos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('alumnos', $this->Grupo->Alumno->generateList());
				if (empty($this->data['Alumno']['Alumno'])) { $this->data['Alumno']['Alumno'] = null; }
				$this->set('selectedAlumnos', $this->data['Alumno']['Alumno']);
				$this->set('ciclosEscolares', $this->Grupo->CiclosEscolare->generateList());
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Grupo');
				$this->redirect('/grupos/index');
			}
			$this->data = $this->Grupo->read(null, $id);
			$this->set('alumnos', $this->Grupo->Alumno->generateList());
			if (empty($this->data['Alumno'])) { $this->data['Alumno'] = null; }
			$this->set('selectedAlumnos', $this->_selectedArray($this->data['Alumno']));
			$this->set('ciclosEscolares', $this->Grupo->CiclosEscolare->generateList());
		} else {
			$this->cleanUpFields();
			if ($this->Grupo->save($this->data)) {
				$this->Session->setFlash('The Grupo has been saved');
				$this->redirect('/grupos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('alumnos', $this->Grupo->Alumno->generateList());
				if (empty($this->data['Alumno']['Alumno'])) { $this->data['Alumno']['Alumno'] = null; }
				$this->set('selectedAlumnos', $this->data['Alumno']['Alumno']);
				$this->set('ciclosEscolares', $this->Grupo->CiclosEscolare->generateList());
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Grupo');
			$this->redirect('/grupos/index');
		}
		if ($this->Grupo->del($id)) {
			$this->Session->setFlash('The Grupo deleted: id '.$id.'');
			$this->redirect('/grupos/index');
		}
	}

}
?>