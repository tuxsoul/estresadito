<?php
class AlumnosGruposController extends AppController {

	var $name = 'AlumnosGrupos';
	var $helpers = array('Html', 'Form' );
	var $components = array('Alumnos', 'Grupos');

	function index() {
		$this->AlumnosGrupo->recursive = 0;
		$this->set('alumnosGrupos', $this->AlumnosGrupo->findAll());
		$this->AlumnosGrupo->Grupo->CiclosEscolare->NivelesEscolare->recursive = -1;
		$this->set('nivelesEscolares', $this->AlumnosGrupo->Grupo->CiclosEscolare->NivelesEscolare->findAll());
		$this->AlumnosGrupo->Grupo->CiclosEscolare->recursive = -1;
		$this->set('ciclosEscolares', $this->AlumnosGrupo->Grupo->CiclosEscolare->findAll());
	}

	function add() {
		if (empty($this->data)) {
			$alumnos = $this->AlumnosGrupo->Alumno->findAll();
			$this->set('alumnos', $this->Alumnos->crearSelect($alumnos));
			$nivelesEscolares = $this->AlumnosGrupo->Grupo->CiclosEscolare->NivelesEscolare->findAll();
			$ciclosEscolares = $this->AlumnosGrupo->Grupo->CiclosEscolare->findAll();
			$grupos = $this->AlumnosGrupo->Grupo->findAll();
			$alumnosGrupos = $this->AlumnosGrupo->findAll();
			$this->set('grupos', $this->Grupos->crearSelect($nivelesEscolares, $ciclosEscolares, $grupos, $alumnosGrupos));
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->AlumnosGrupo->save($this->data)) {
				$this->Session->setFlash('The Alumnos Grupo has been saved');
				$this->redirect('/alumnos_grupos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$alumnos = $this->AlumnosGrupo->Alumno->findAll();
				$this->set('alumnos', $this->Alumnos->crearSelect($alumnos));
				$nivelesEscolares = $this->AlumnosGrupo->Grupo->CiclosEscolare->NivelesEscolare->findAll();
				$ciclosEscolares = $this->AlumnosGrupo->Grupo->CiclosEscolare->findAll();
				$grupos = $this->AlumnosGrupo->Grupo->findAll();
				$alumnosGrupos = $this->AlumnosGrupo->findAll();
				$this->set('grupos', $this->Grupos->crearSelect($nivelesEscolares, $ciclosEscolares, $grupos, $alumnosGrupos));
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
			$alumnos = $this->AlumnosGrupo->Alumno->findAll();
			$this->set('alumnos', $this->Alumnos->crearSelect($alumnos));
			$nivelesEscolares = $this->AlumnosGrupo->Grupo->CiclosEscolare->NivelesEscolare->findAll();
			$ciclosEscolares = $this->AlumnosGrupo->Grupo->CiclosEscolare->findAll();
			$grupos = $this->AlumnosGrupo->Grupo->findAll();
			$alumnosGrupos = $this->AlumnosGrupo->findAll();
			$this->set('grupos', $this->Grupos->crearSelect($nivelesEscolares, $ciclosEscolares, $grupos, $alumnosGrupos));
		} else {
			$this->cleanUpFields();
			if ($this->AlumnosGrupo->save($this->data)) {
				$this->Session->setFlash('The AlumnosGrupo has been saved');
				$this->redirect('/alumnos_grupos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$alumnos = $this->AlumnosGrupo->Alumno->findAll();
				$this->set('alumnos', $this->Alumnos->crearSelect($alumnos));
				$nivelesEscolares = $this->AlumnosGrupo->Grupo->CiclosEscolare->NivelesEscolare->findAll();
				$ciclosEscolares = $this->AlumnosGrupo->Grupo->CiclosEscolare->findAll();
				$grupos = $this->AlumnosGrupo->Grupo->findAll();
				$alumnosGrupos = $this->AlumnosGrupo->findAll();
				$this->set('grupos', $this->Grupos->crearSelect($nivelesEscolares, $ciclosEscolares, $grupos, $alumnosGrupos));
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
