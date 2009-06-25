<?php
class NivelesEscolaresController extends AppController {

	var $name = 'NivelesEscolares';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->NivelesEscolare->recursive = 0;
		$this->set('nivelesEscolares', $this->NivelesEscolare->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Niveles Escolare.');
			$this->redirect('/niveles_escolares/index');
		}
		$this->set('nivelesEscolare', $this->NivelesEscolare->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->NivelesEscolare->save($this->data)) {
				$this->Session->setFlash('The Niveles Escolare has been saved');
				$this->redirect('/niveles_escolares/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Niveles Escolare');
				$this->redirect('/niveles_escolares/index');
			}
			$this->data = $this->NivelesEscolare->read(null, $id);
		} else {
			$this->cleanUpFields();
			if ($this->NivelesEscolare->save($this->data)) {
				$this->Session->setFlash('The NivelesEscolare has been saved');
				$this->redirect('/niveles_escolares/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Niveles Escolare');
			$this->redirect('/niveles_escolares/index');
		}
		if ($this->NivelesEscolare->del($id)) {
			$this->Session->setFlash('The Niveles Escolare deleted: id '.$id.'');
			$this->redirect('/niveles_escolares/index');
		}
	}

}
?>