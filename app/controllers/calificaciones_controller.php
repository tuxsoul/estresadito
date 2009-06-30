<?php
class CalificacionesController extends AppController {

	var $name = 'Calificaciones';
	var $helpers = array('Html', 'Form' );

	function index($formato = null, $id = null) {
		if(!empty($id) && !empty($formato)) {
			if($formato) {
				$tmp = $this->Calificacione->AlumnosGrupo->Grupo->findById($id);
				$grado = $tmp['Grupo']['grado'];
				$cicloEscolar = $tmp['Grupo']['ciclos_escolares_id'];

				$this->set('grado', $grado);
				$this->set('grupo', $tmp['Grupo']['grupo']);

				$condicionMaterias = array( 'MaestrosMateria.ciclos_escolares_id' => $cicloEscolar,
							    'MaestrosMateria.grado'		  => $grado 
							);
				$materias = $this->Calificacione->MaestrosMateria->findAll($condicionMaterias, null, null, null, null, 1);
				$this->set('materias', $materias);

				$alumnosGrupos = $this->Calificacione->AlumnosGrupo->findByGrupos_Id($id);
				$condicionCalificaciones = array('Calificacione.alumnos_grupos_id' => $alumnosGrupos['AlumnosGrupo']['id']);
				$calificaciones = $this->Calificacione->findAll($condicionCalificaciones, null, null, null, null, 1);
				$this->set('calificaciones', $calificaciones);
				$this->set('alumnosGrupos', $alumnosGrupos['AlumnosGrupo']['id']);

				$alumno = $this->Calificacione->AlumnosGrupo->Alumno->findById($alumnosGrupos['AlumnosGrupo']['alumnos_id']);
				$this->set('alumno', $alumno);

				$nivelEscolar = $this->Calificacione->AlumnosGrupo->Grupo->CiclosEscolare->findById($cicloEscolar);
				$this->set('nivelEscolar', $nivelEscolar['NivelesEscolare']['valor']);
				$this->set('cicloEscolar', $nivelEscolar['CiclosEscolare']['inicio'] . '-' . $nivelEscolar['CiclosEscolare']['fin']);
			}
			else {

			}

			$this->set('formato', $formato);
		}
		else {
			$this->redirect('/');
		}
	}

	function add($alumnos = null, $materias = null) {
		if (empty($this->data)) {
			$this->set('alumnos', $alumnos);
			$this->set('materias', $materias);
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Calificacione->save($this->data)) {
				$this->Session->setFlash('The Calificacione has been saved');
				$this->redirect('/calificaciones/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('alumnos', $alumnos);
				$this->set('materias', $materias);
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Calificacione');
				$this->redirect('/calificaciones/index');
			}
			$this->data = $this->Calificacione->read(null, $id);
		} else {
			$this->cleanUpFields();
			if ($this->Calificacione->save($this->data)) {
				$this->Session->setFlash('The Calificacione has been saved');
				$this->redirect('/calificaciones/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Calificacione');
			$this->redirect('/calificaciones/index');
		}
		if ($this->Calificacione->del($id)) {
			$this->Session->setFlash('The Calificacione deleted: id '.$id.'');
			$this->redirect('/calificaciones/index');
		}
	}

}
?>
