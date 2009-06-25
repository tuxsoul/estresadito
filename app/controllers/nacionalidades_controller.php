<?php
class NacionalidadesController extends AppController {

	var $name = 'Nacionalidades';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->Nacionalidade->recursive = 0;
		$this->set('nacionalidades', $this->Nacionalidade->findAll());
	}

	function add() {
		if (empty($this->data)) {
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Nacionalidade->save($this->data)) {
				$this->Session->setFlash('The Nacionalidade has been saved');
				$this->redirect('/nacionalidades/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Nacionalidade');
				$this->redirect('/nacionalidades/index');
			}
			$this->data = $this->Nacionalidade->read(null, $id);
		} else {
			$this->cleanUpFields();
			if ($this->Nacionalidade->save($this->data)) {
				$this->Session->setFlash('The Nacionalidade has been saved');
				$this->redirect('/nacionalidades/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Nacionalidade');
			$this->redirect('/nacionalidades/index');
		}
		if ($this->Nacionalidade->del($id)) {
			$this->Session->setFlash('The Nacionalidade deleted: id '.$id.'');
			$this->redirect('/nacionalidades/index');
		}
	}

}
?>
