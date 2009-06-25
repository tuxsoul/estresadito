<?php
class StatusesController extends AppController {

	var $name = 'Statuses';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->Status->recursive = 0;
		$this->set('statuses', $this->Status->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Status.');
			$this->redirect('/statuses/index');
		}
		$this->set('status', $this->Status->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Status->save($this->data)) {
				$this->Session->setFlash('The Status has been saved');
				$this->redirect('/statuses/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Status');
				$this->redirect('/statuses/index');
			}
			$this->data = $this->Status->read(null, $id);
		} else {
			$this->cleanUpFields();
			if ($this->Status->save($this->data)) {
				$this->Session->setFlash('The Status has been saved');
				$this->redirect('/statuses/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Status');
			$this->redirect('/statuses/index');
		}
		if ($this->Status->del($id)) {
			$this->Session->setFlash('The Status deleted: id '.$id.'');
			$this->redirect('/statuses/index');
		}
	}

}
?>