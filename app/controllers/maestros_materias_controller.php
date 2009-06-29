<?php
class MaestrosMateriasController extends AppController {

	var $name = 'MaestrosMaterias';
	var $helpers = array('Html', 'Form' );
	var $components = array('Alumnos', 'Maestros', 'CiclosEscolares');

	function index() {
		$this->MaestrosMateria->recursive = 0;
		$this->set('nivelesEscolares', $this->MaestrosMateria->CiclosEscolare->NivelesEscolare->findAll());
		$this->set('maestrosMaterias', $this->MaestrosMateria->findAll());
	}

	function add() {
		if (empty($this->data)) {
			$maestro = $this->MaestrosMateria->Maestro->findAll();
			$this->set('maestros', $this->Maestros->crearSelect($maestro));
			$cicloEscolar = $this->MaestrosMateria->CiclosEscolare->findAll();
			$nivelEscolar = $this->MaestrosMateria->CiclosEscolare->NivelesEscolare->findAll();
			$this->set('ciclosEscolares', $this->CiclosEscolares->crearSelect($cicloEscolar, $nivelEscolar));
			$this->set('materias', $this->MaestrosMateria->Materia->generateList(null, null, null, '{n}.Materia.id', '{n}.Materia.nombre'));
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->MaestrosMateria->save($this->data)) {
				$this->Session->setFlash('The Maestros Materium has been saved');
				$this->redirect('/maestros_materias/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$maestro = $this->MaestrosMateria->Maestro->findAll();
				$this->set('maestros', $this->Maestros->crearSelect($maestro));
				$cicloEscolar = $this->MaestrosMateria->CiclosEscolare->findAll();
				$nivelEscolar = $this->MaestrosMateria->CiclosEscolare->NivelesEscolare->findAll();
				$this->set('ciclosEscolares', $this->CiclosEscolares->crearSelect($cicloEscolar, $nivelEscolar));
				$this->set('materias', $this->MaestrosMateria->Materia->generateList(null, null, null, '{n}.Materia.id', '{n}.Materia.nombre'));
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
			$maestro = $this->MaestrosMateria->Maestro->findAll();
			$this->set('maestros', $this->Maestros->crearSelect($maestro));
			$cicloEscolar = $this->MaestrosMateria->CiclosEscolare->findAll();
			$nivelEscolar = $this->MaestrosMateria->CiclosEscolare->NivelesEscolare->findAll();
			$this->set('ciclosEscolares', $this->CiclosEscolares->crearSelect($cicloEscolar, $nivelEscolar));
			$this->set('materias', $this->MaestrosMateria->Materia->generateList(null, null, null, '{n}.Materia.id', '{n}.Materia.nombre'));			
		} else {
			$this->cleanUpFields();
			if ($this->MaestrosMateria->save($this->data)) {
				$this->Session->setFlash('The MaestrosMateria has been saved');
				$this->redirect('/maestros_materias/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$maestro = $this->MaestrosMateria->Maestro->findAll();
				$this->set('maestros', $this->Maestros->crearSelect($maestro));
				$cicloEscolar = $this->MaestrosMateria->CiclosEscolare->findAll();
				$nivelEscolar = $this->MaestrosMateria->CiclosEscolare->NivelesEscolare->findAll();
				$this->set('ciclosEscolares', $this->CiclosEscolares->crearSelect($cicloEscolar, $nivelEscolar));
				$this->set('materias', $this->MaestrosMateria->Materia->generateList(null, null, null, '{n}.Materia.id', '{n}.Materia.nombre'));
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
