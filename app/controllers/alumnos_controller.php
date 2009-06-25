<?php
class AlumnosController extends AppController {

	var $name = 'Alumnos';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->Alumno->recursive = 0;
		$this->set('alumnos', $this->Alumno->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Alumno.');
			$this->redirect('/alumnos/index');
		}
		$this->set('alumno', $this->Alumno->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->set('grupos', $this->Alumno->Grupo->generateList());
			$this->set('selectedGrupos', null);
			$this->set('nivelesEscolares', $this->Alumno->NivelesEscolare->generateList());
			$this->set('generos', $this->Alumno->Genero->generateList());
			$this->set('estadosCiviles', $this->Alumno->EstadosCivile->generateList());
			$this->set('nacionalidades', $this->Alumno->Nacionalidade->generateList());
			$this->set('municipiosEstados', $this->Alumno->MunicipiosEstado->generateList());
			$this->set('statuses', $this->Alumno->Status->generateList());
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Alumno->save($this->data)) {
				$this->Session->setFlash('The Alumno has been saved');
				$this->redirect('/alumnos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('grupos', $this->Alumno->Grupo->generateList());
				if (empty($this->data['Grupo']['Grupo'])) { $this->data['Grupo']['Grupo'] = null; }
				$this->set('selectedGrupos', $this->data['Grupo']['Grupo']);
				$this->set('nivelesEscolares', $this->Alumno->NivelesEscolare->generateList());
				$this->set('generos', $this->Alumno->Genero->generateList());
				$this->set('estadosCiviles', $this->Alumno->EstadosCivile->generateList());
				$this->set('nacionalidades', $this->Alumno->Nacionalidade->generateList());
				$this->set('municipiosEstados', $this->Alumno->MunicipiosEstado->generateList());
				$this->set('statuses', $this->Alumno->Status->generateList());
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Alumno');
				$this->redirect('/alumnos/index');
			}
			$this->data = $this->Alumno->read(null, $id);
			$this->set('grupos', $this->Alumno->Grupo->generateList());
			if (empty($this->data['Grupo'])) { $this->data['Grupo'] = null; }
			$this->set('selectedGrupos', $this->_selectedArray($this->data['Grupo']));
			$this->set('nivelesEscolares', $this->Alumno->NivelesEscolare->generateList());
			$this->set('generos', $this->Alumno->Genero->generateList());
			$this->set('estadosCiviles', $this->Alumno->EstadosCivile->generateList());
			$this->set('nacionalidades', $this->Alumno->Nacionalidade->generateList());
			$this->set('municipiosEstados', $this->Alumno->MunicipiosEstado->generateList());
			$this->set('statuses', $this->Alumno->Status->generateList());
		} else {
			$this->cleanUpFields();
			if ($this->Alumno->save($this->data)) {
				$this->Session->setFlash('The Alumno has been saved');
				$this->redirect('/alumnos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('grupos', $this->Alumno->Grupo->generateList());
				if (empty($this->data['Grupo']['Grupo'])) { $this->data['Grupo']['Grupo'] = null; }
				$this->set('selectedGrupos', $this->data['Grupo']['Grupo']);
				$this->set('nivelesEscolares', $this->Alumno->NivelesEscolare->generateList());
				$this->set('generos', $this->Alumno->Genero->generateList());
				$this->set('estadosCiviles', $this->Alumno->EstadosCivile->generateList());
				$this->set('nacionalidades', $this->Alumno->Nacionalidade->generateList());
				$this->set('municipiosEstados', $this->Alumno->MunicipiosEstado->generateList());
				$this->set('statuses', $this->Alumno->Status->generateList());
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Alumno');
			$this->redirect('/alumnos/index');
		}
		if ($this->Alumno->del($id)) {
			$this->Session->setFlash('The Alumno deleted: id '.$id.'');
			$this->redirect('/alumnos/index');
		}
	}

}
?>