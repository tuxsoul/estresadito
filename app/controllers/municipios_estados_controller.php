<?php
class MunicipiosEstadosController extends AppController {

	var $name = 'MunicipiosEstados';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->MunicipiosEstado->recursive = 0;
		$this->set('municipiosEstados', $this->MunicipiosEstado->findAll());
	}

	function add() {
		if (empty($this->data)) {
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->MunicipiosEstado->save($this->data)) {
				$this->Session->setFlash('The Municipios Estado has been saved');
				$this->redirect('/municipios_estados/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Municipios Estado');
				$this->redirect('/municipios_estados/index');
			}
			$this->data = $this->MunicipiosEstado->read(null, $id);
		} else {
			$this->cleanUpFields();
			if ($this->MunicipiosEstado->save($this->data)) {
				$this->Session->setFlash('The MunicipiosEstado has been saved');
				$this->redirect('/municipios_estados/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Municipios Estado');
			$this->redirect('/municipios_estados/index');
		}
		if ($this->MunicipiosEstado->del($id)) {
			$this->Session->setFlash('The Municipios Estado deleted: id '.$id.'');
			$this->redirect('/municipios_estados/index');
		}
	}

}
?>
