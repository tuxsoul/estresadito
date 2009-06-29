<?php
class GruposController extends AppController {

	var $name = 'Grupos';
	var $helpers = array('Html', 'Form' );
	var $components = 'CiclosEscolares';

	function index() {
		$this->Grupo->recursive = 2;
		$this->set('grupos', $this->Grupo->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Grupo.');
			$this->redirect('/grupos/index');
		}
		$this->set('grupo', $this->Grupo->read(null, $id));
		$this->Grupo->CiclosEscolare->recursive = -1;
		$grupos = $this->Grupo->CiclosEscolare->findAll();
		$this->Grupo->CiclosEscolare->NivelesEscolare->recursive = -1;
		$niveles = $this->Grupo->CiclosEscolare->NivelesEscolare->findAll();
		$this->set('cicloEscolar', $this->CiclosEscolares->mostrar($id, $grupos, $niveles));
	}

	function add() {
		if (empty($this->data)) {
			$this->Grupo->CiclosEscolare->recursive = -1;
			$grupos = $this->Grupo->CiclosEscolare->findAll();
			$this->Grupo->CiclosEscolare->NivelesEscolare->recursive = -1;
			$niveles = $this->Grupo->CiclosEscolare->NivelesEscolare->findAll();
			$this->set('ciclosEscolares', $this->CiclosEscolares->crearSelect($grupos, $niveles));
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Grupo->save($this->data)) {
				$this->Session->setFlash('The Grupo has been saved');
				$this->redirect('/grupos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->Grupo->CiclosEscolare->recursive = -1;
				$grupos = $this->Grupo->CiclosEscolare->findAll();
				$this->Grupo->CiclosEscolare->NivelesEscolare->recursive = -1;
				$niveles = $this->Grupo->CiclosEscolare->NivelesEscolare->findAll();
				$this->set('ciclosEscolares', $this->CiclosEscolares->crearSelect($grupos, $niveles));
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
			$this->Grupo->CiclosEscolare->recursive = -1;
			$grupos = $this->Grupo->CiclosEscolare->findAll();
			$this->Grupo->CiclosEscolare->NivelesEscolare->recursive = -1;
			$niveles = $this->Grupo->CiclosEscolare->NivelesEscolare->findAll();
			$this->set('ciclosEscolares', $this->CiclosEscolares->crearSelect($grupos, $niveles));
		} else {
			$this->cleanUpFields();
			if ($this->Grupo->save($this->data)) {
				$this->Session->setFlash('The Grupo has been saved');
				$this->redirect('/grupos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->Grupo->CiclosEscolare->recursive = -1;
				$grupos = $this->Grupo->CiclosEscolare->findAll();
				$this->Grupo->CiclosEscolare->NivelesEscolare->recursive = -1;
				$niveles = $this->Grupo->CiclosEscolare->NivelesEscolare->findAll();
				$this->set('ciclosEscolares', $this->CiclosEscolares->crearSelect($grupos, $niveles));
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
