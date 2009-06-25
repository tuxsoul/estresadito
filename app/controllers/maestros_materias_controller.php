<?php
class MaestrosMateriasController extends AppController {

	var $name = 'MaestrosMaterias';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->MaestrosMateria->recursive = 0;
		$this->set('maestrosMaterias', $this->MaestrosMateria->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Maestros Materium.');
			$this->redirect('/maestros_materias/index');
		}
		$this->set('maestrosMaterium', $this->MaestrosMateria->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->set('maestros', $this->MaestrosMateria->Maestro->generateList());
			$this->set('materias', $this->MaestrosMateria->Materium->generateList());
			$this->set('ciclosEscolares', $this->MaestrosMateria->CiclosEscolare->generateList());
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->MaestrosMateria->save($this->data)) {
				$this->Session->setFlash('The Maestros Materium has been saved');
				$this->redirect('/maestros_materias/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('maestros', $this->MaestrosMateria->Maestro->generateList());
				$this->set('materias', $this->MaestrosMateria->Materium->generateList());
				$this->set('ciclosEscolares', $this->MaestrosMateria->CiclosEscolare->generateList());
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Maestros Materium');
				$this->redirect('/maestros_materias/index');
			}
			$this->data = $this->MaestrosMateria->read(null, $id);
			$this->set('maestros', $this->MaestrosMateria->Maestro->generateList());
			$this->set('materias', $this->MaestrosMateria->Materium->generateList());
			$this->set('ciclosEscolares', $this->MaestrosMateria->CiclosEscolare->generateList());
		} else {
			$this->cleanUpFields();
			if ($this->MaestrosMateria->save($this->data)) {
				$this->Session->setFlash('The MaestrosMateria has been saved');
				$this->redirect('/maestros_materias/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('maestros', $this->MaestrosMateria->Maestro->generateList());
				$this->set('materias', $this->MaestrosMateria->Materium->generateList());
				$this->set('ciclosEscolares', $this->MaestrosMateria->CiclosEscolare->generateList());
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Maestros Materium');
			$this->redirect('/maestros_materias/index');
		}
		if ($this->MaestrosMateria->del($id)) {
			$this->Session->setFlash('The Maestros Materium deleted: id '.$id.'');
			$this->redirect('/maestros_materias/index');
		}
	}

}
?>