<?php
class CostosController extends AppController {

	var $name = 'Costos';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->Costo->recursive = 0;
		$this->set('costos', $this->Costo->findAll());
	}

	function add() {
		if (empty($this->data)) {
			$this->set('nivelesEscolares', $this->Costo->NivelesEscolare->generateList(null, null, null, '{n}.NivelesEscolare.id', '{n}.NivelesEscolare.valor'));
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Costo->save($this->data)) {
				$this->Session->setFlash('The Costo has been saved');
				$this->redirect('/costos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('nivelesEscolares', $this->Costo->NivelesEscolare->generateList(null, null, null, '{n}.NivelesEscolare.id', '{n}.NivelesEscolare.valor'));
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Costo');
				$this->redirect('/costos/index');
			}
			$this->data = $this->Costo->read(null, $id);
			$this->set('nivelesEscolares', $this->Costo->NivelesEscolare->generateList(null, null, null, '{n}.NivelesEscolare.id', '{n}.NivelesEscolare.valor'));
		} else {
			$this->cleanUpFields();
			if ($this->Costo->save($this->data)) {
				$this->Session->setFlash('The Costo has been saved');
				$this->redirect('/costos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('nivelesEscolares', $this->Costo->NivelesEscolare->generateList(null, null, null, '{n}.NivelesEscolare.id', '{n}.NivelesEscolare.valor'));
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Costo');
			$this->redirect('/costos/index');
		}
		if ($this->Costo->del($id)) {
			$this->Session->setFlash('The Costo deleted: id '.$id.'');
			$this->redirect('/costos/index');
		}
	}

}
?>
