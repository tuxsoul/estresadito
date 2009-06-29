<?php
class CiclosEscolaresController extends AppController {

	var $name = 'CiclosEscolares';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->CiclosEscolare->recursive = 0;
		$this->set('ciclosEscolares', $this->CiclosEscolare->findAll());
	}

	function add() {
		if (empty($this->data)) {
			$this->set('nivelesEscolares', $this->CiclosEscolare->NivelesEscolare->generateList(null, null, null, '{n}.NivelesEscolare.id', '{n}.NivelesEscolare.valor'));
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->CiclosEscolare->save($this->data)) {
				$this->Session->setFlash('The Ciclos Escolare has been saved');
				$this->redirect('/ciclos_escolares/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('nivelesEscolares', $this->CiclosEscolare->NivelesEscolare->generateList(null, null, null, '{n}.NivelesEscolare.id', '{n}.NivelesEscolare.valor'));
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Ciclos Escolare');
				$this->redirect('/ciclos_escolares/index');
			}
			$this->data = $this->CiclosEscolare->read(null, $id);
			$this->set('nivelesEscolares', $this->CiclosEscolare->NivelesEscolare->generateList(null, null, null, '{n}.NivelesEscolare.id', '{n}.NivelesEscolare.valor'));
		} else {
			$this->cleanUpFields();
			if ($this->CiclosEscolare->save($this->data)) {
				$this->Session->setFlash('The CiclosEscolare has been saved');
				$this->redirect('/ciclos_escolares/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('nivelesEscolares', $this->CiclosEscolare->NivelesEscolare->generateList(null, null, null, '{n}.NivelesEscolare.id', '{n}.NivelesEscolare.valor'));
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Ciclos Escolare');
			$this->redirect('/ciclos_escolares/index');
		}
		if ($this->CiclosEscolare->del($id)) {
			$this->Session->setFlash('The Ciclos Escolare deleted: id '.$id.'');
			$this->redirect('/ciclos_escolares/index');
		}
	}

}
?>
