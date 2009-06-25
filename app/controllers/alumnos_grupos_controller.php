<?php
class AlumnosGruposController extends AppController {

	var $name = 'AlumnosGrupos';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->AlumnosGrupo->recursive = 0;
		$this->set('alumnosGrupos', $this->AlumnosGrupo->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Alumnos Grupo.');
			$this->redirect('/alumnos_grupos/index');
		}
		$this->set('alumnosGrupo', $this->AlumnosGrupo->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->set('grupos', $this->AlumnosGrupo->Grupo->generateList());
			$this->set('alumnos', $this->AlumnosGrupo->Alumno->generateList());
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->AlumnosGrupo->save($this->data)) {
				$this->Session->setFlash('The Alumnos Grupo has been saved');
				$this->redirect('/alumnos_grupos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('grupos', $this->AlumnosGrupo->Grupo->generateList());
				$this->set('alumnos', $this->AlumnosGrupo->Alumno->generateList());
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Alumnos Grupo');
				$this->redirect('/alumnos_grupos/index');
			}
			$this->data = $this->AlumnosGrupo->read(null, $id);
			$this->set('grupos', $this->AlumnosGrupo->Grupo->generateList());
			$this->set('alumnos', $this->AlumnosGrupo->Alumno->generateList());
		} else {
			$this->cleanUpFields();
			if ($this->AlumnosGrupo->save($this->data)) {
				$this->Session->setFlash('The AlumnosGrupo has been saved');
				$this->redirect('/alumnos_grupos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('grupos', $this->AlumnosGrupo->Grupo->generateList());
				$this->set('alumnos', $this->AlumnosGrupo->Alumno->generateList());
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Alumnos Grupo');
			$this->redirect('/alumnos_grupos/index');
		}
		if ($this->AlumnosGrupo->del($id)) {
			$this->Session->setFlash('The Alumnos Grupo deleted: id '.$id.'');
			$this->redirect('/alumnos_grupos/index');
		}
	}

}
?>