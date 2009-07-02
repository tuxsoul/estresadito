<?php
class AlumnosController extends AppController {

	var $name = 'Alumnos';
	var $helpers = array('Html', 'Form' );
	var $components = array('Municipios');

	function index() {
		$this->Alumno->recursive = 2;
		$this->set('alumnos', $this->Alumno->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Alumno.');
			$this->redirect('/alumnos/index');
		}
		$this->Alumno->recursive = 2;

		$tmp = $this->Alumno->read(null, $id);
		$municipios = $this->Alumno->MunicipiosEstado->findAll();

		$this->set('alumno', $tmp);
		$this->set('nacimientoLugar', $this->Municipios->mostrar($tmp['Alumno']['municipios_estados_id'], $municipios));
		$this->set('residenciaLugar', $this->Municipios->mostrar($tmp['Alumno']['nacimiento_lugar'], $municipios));

		$this->Alumno->NivelesEscolare->recursive = -1;
		$this->set('nivelesEscolare', $this->Alumno->NivelesEscolare->findAll());
	}

	function add() {
		if (empty($this->data)) {
			$this->set('nivelesEscolares', $this->Alumno->NivelesEscolare->generateList(null, null, null, '{n}.NivelesEscolare.id', '{n}.NivelesEscolare.valor'));
			$this->set('generos', $this->Alumno->Genero->generateList(null, null, null, '{n}.Genero.id', '{n}.Genero.valor'));
			$this->set('estadosCiviles', $this->Alumno->EstadosCivile->generateList(null, null, null, '{n}.EstadosCivile.id', '{n}.EstadosCivile.valor'));
			$this->set('nacionalidades', $this->Alumno->Nacionalidade->generateList(null, null, null, '{n}.Nacionalidade.id', '{n}.Nacionalidade.valor'));

			$listaMunicipios = $this->Municipios->crearSelect($this->Alumno->MunicipiosEstado->findAll());
			$this->set('municipiosEstados', $listaMunicipios);

			$this->set('statuses', $this->Alumno->Status->generateList(null, null, null, '{n}.Status.id', '{n}.Status.valor'));
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Alumno->save($this->data)) {
				$this->Session->setFlash('The Alumno has been saved');
				$this->redirect('/alumnos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('nivelesEscolares', $this->Alumno->NivelesEscolare->generateList(null, null, null, '{n}.NivelesEscolare.id', '{n}.NivelesEscolare.valor'));
				$this->set('generos', $this->Alumno->Genero->generateList(null, null, null, '{n}.Genero.id', '{n}.Genero.valor'));
				$this->set('estadosCiviles', $this->Alumno->EstadosCivile->generateList(null, null, null, '{n}.EstadosCivile.id', '{n}.EstadosCivile.valor'));
				$this->set('nacionalidades', $this->Alumno->Nacionalidade->generateList(null, null, null, '{n}.Nacionalidade.id', '{n}.Nacionalidade.valor'));

				$listaMunicipios = $this->Municipios->crearSelect($this->Alumno->MunicipiosEstado->findAll());
				$this->set('municipiosEstados', $listaMunicipios);

				$this->set('statuses', $this->Alumno->Status->generateList(null, null, null, '{n}.Status.id', '{n}.Status.valor'));
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

			$this->set('nivelesEscolares', $this->Alumno->NivelesEscolare->generateList(null, null, null, '{n}.NivelesEscolare.id', '{n}.NivelesEscolare.valor'));
			$this->set('generos', $this->Alumno->Genero->generateList(null, null, null, '{n}.Genero.id', '{n}.Genero.valor'));
			$this->set('estadosCiviles', $this->Alumno->EstadosCivile->generateList(null, null, null, '{n}.EstadosCivile.id', '{n}.EstadosCivile.valor'));
			$this->set('nacionalidades', $this->Alumno->Nacionalidade->generateList(null, null, null, '{n}.Nacionalidade.id', '{n}.Nacionalidade.valor'));

			$listaMunicipios = $this->Municipios->crearSelect($this->Alumno->MunicipiosEstado->findAll());
			$this->set('municipiosEstados', $listaMunicipios);

			$this->set('statuses', $this->Alumno->Status->generateList(null, null, null, '{n}.Status.id', '{n}.Status.valor'));
		} else {
			$this->cleanUpFields();
			if ($this->Alumno->save($this->data)) {
				$this->Session->setFlash('The Alumno has been saved');
				$this->redirect('/alumnos/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');

				$this->set('nivelesEscolares', $this->Alumno->NivelesEscolare->generateList(null, null, null, '{n}.NivelesEscolare.id', '{n}.NivelesEscolare.valor'));
				$this->set('generos', $this->Alumno->Genero->generateList(null, null, null, '{n}.Genero.id', '{n}.Genero.valor'));
				$this->set('estadosCiviles', $this->Alumno->EstadosCivile->generateList(null, null, null, '{n}.EstadosCivile.id', '{n}.EstadosCivile.valor'));
				$this->set('nacionalidades', $this->Alumno->Nacionalidade->generateList(null, null, null, '{n}.Nacionalidade.id', '{n}.Nacionalidade.valor'));

				$listaMunicipios = $this->Municipios->crearSelect($this->Alumno->MunicipiosEstado->findAll());
				$this->set('municipiosEstados', $listaMunicipios);

				$this->set('statuses', $this->Alumno->Status->generateList(null, null, null, '{n}.Status.id', '{n}.Status.valor'));
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
