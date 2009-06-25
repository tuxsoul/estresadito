<?php
class CalificacionesController extends AppController {

	var $name = 'Calificaciones';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->Calificacione->recursive = 0;
		$this->set('calificaciones', $this->Calificacione->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Calificacione.');
			$this->redirect('/calificaciones/index');
		}
		$this->set('calificacione', $this->Calificacione->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->set('alumnosGrupos', $this->Calificacione->AlumnosGrupo->generateList());
			$this->set('maestrosMaterias', $this->Calificacione->MaestrosMaterium->generateList());
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Calificacione->save($this->data)) {
				$this->Session->setFlash('The Calificacione has been saved');
				$this->redirect('/calificaciones/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('alumnosGrupos', $this->Calificacione->AlumnosGrupo->generateList());
				$this->set('maestrosMaterias', $this->Calificacione->MaestrosMaterium->generateList());
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Calificacione');
				$this->redirect('/calificaciones/index');
			}
			$this->data = $this->Calificacione->read(null, $id);
			$this->set('alumnosGrupos', $this->Calificacione->AlumnosGrupo->generateList());
			$this->set('maestrosMaterias', $this->Calificacione->MaestrosMaterium->generateList());
		} else {
			$this->cleanUpFields();
			if ($this->Calificacione->save($this->data)) {
				$this->Session->setFlash('The Calificacione has been saved');
				$this->redirect('/calificaciones/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('alumnosGrupos', $this->Calificacione->AlumnosGrupo->generateList());
				$this->set('maestrosMaterias', $this->Calificacione->MaestrosMaterium->generateList());
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Calificacione');
			$this->redirect('/calificaciones/index');
		}
		if ($this->Calificacione->del($id)) {
			$this->Session->setFlash('The Calificacione deleted: id '.$id.'');
			$this->redirect('/calificaciones/index');
		}
	}

}
?>