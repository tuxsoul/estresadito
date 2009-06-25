<?php
class GenerosController extends AppController {

	var $name = 'Generos';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->Genero->recursive = 0;
		$this->set('generos', $this->Genero->findAll());
	}

	function add() {
		if (empty($this->data)) {
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Genero->save($this->data)) {
				$this->Session->setFlash('The Genero has been saved');
				$this->redirect('/generos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Genero');
				$this->redirect('/generos/index');
			}
			$this->data = $this->Genero->read(null, $id);
		} else {
			$this->cleanUpFields();
			if ($this->Genero->save($this->data)) {
				$this->Session->setFlash('The Genero has been saved');
				$this->redirect('/generos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Genero');
			$this->redirect('/generos/index');
		}
		if ($this->Genero->del($id)) {
			$this->Session->setFlash('The Genero deleted: id '.$id.'');
			$this->redirect('/generos/index');
		}
	}

}
?>
