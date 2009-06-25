<?php
class PagosController extends AppController {

	var $name = 'Pagos';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->Pago->recursive = 0;
		$this->set('pagos', $this->Pago->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Pago.');
			$this->redirect('/pagos/index');
		}
		$this->set('pago', $this->Pago->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->set('alumnos', $this->Pago->Alumno->generateList());
			$this->set('costos', $this->Pago->Costo->generateList());
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Pago->save($this->data)) {
				$this->Session->setFlash('The Pago has been saved');
				$this->redirect('/pagos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('alumnos', $this->Pago->Alumno->generateList());
				$this->set('costos', $this->Pago->Costo->generateList());
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Pago');
				$this->redirect('/pagos/index');
			}
			$this->data = $this->Pago->read(null, $id);
			$this->set('alumnos', $this->Pago->Alumno->generateList());
			$this->set('costos', $this->Pago->Costo->generateList());
		} else {
			$this->cleanUpFields();
			if ($this->Pago->save($this->data)) {
				$this->Session->setFlash('The Pago has been saved');
				$this->redirect('/pagos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('alumnos', $this->Pago->Alumno->generateList());
				$this->set('costos', $this->Pago->Costo->generateList());
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Pago');
			$this->redirect('/pagos/index');
		}
		if ($this->Pago->del($id)) {
			$this->Session->setFlash('The Pago deleted: id '.$id.'');
			$this->redirect('/pagos/index');
		}
	}

}
?>